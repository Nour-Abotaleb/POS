#!/bin/bash

# Manual Deployment Script for nomufood.com
# استخدم هذا السكريبت للـ deployment اليدوي إذا لم تستخدم GitHub Actions

set -e

echo "=== Manual Deployment Script for NomuFood ==="

# متغيرات التكوين
SERVER_HOST="109.199.110.224"
SERVER_USER="nomufood"
PROJECT_PATH="/home/nomufood/htdocs/nomufood.com"
LOCAL_PROJECT_PATH="."

# ألوان للنصوص
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# دالة للطباعة الملونة
print_status() {
    echo -e "${GREEN}[INFO]${NC} $1"
}

print_warning() {
    echo -e "${YELLOW}[WARNING]${NC} $1"
}

print_error() {
    echo -e "${RED}[ERROR]${NC} $1"
}

# فحص المتطلبات
check_requirements() {
    print_status "فحص المتطلبات..."
    
    if ! command -v ssh &> /dev/null; then
        print_error "SSH غير مثبت"
        exit 1
    fi
    
    if ! command -v scp &> /dev/null; then
        print_error "SCP غير مثبت"
        exit 1
    fi
    
    if ! command -v composer &> /dev/null; then
        print_error "Composer غير مثبت"
        exit 1
    fi
    
    if ! command -v npm &> /dev/null; then
        print_error "NPM غير مثبت"
        exit 1
    fi
    
    print_status "جميع المتطلبات متوفرة ✓"
}

# تحضير المشروع محلياً
prepare_project() {
    print_status "تحضير المشروع محلياً..."
    
    # تثبيت dependencies
    print_status "تثبيت Composer dependencies..."
    composer install --no-dev --optimize-autoloader --no-interaction
    
    # تثبيت NPM dependencies وبناء assets
    print_status "تثبيت NPM dependencies وبناء Assets..."
    npm ci
    npm run build
    
    # إنشاء ملف مضغوط
    print_status "إنشاء ملف مضغوط..."
    TIMESTAMP=$(date +%Y%m%d_%H%M%S)
    ARCHIVE_NAME="nomufood-deploy-${TIMESTAMP}.tar.gz"
    
    tar -czf ${ARCHIVE_NAME} \
        --exclude=node_modules \
        --exclude=.git \
        --exclude=tests \
        --exclude=.env \
        --exclude=.env.example \
        --exclude=storage/logs/*.log \
        --exclude=storage/framework/cache/data/* \
        --exclude=storage/framework/sessions/* \
        --exclude=storage/framework/views/* \
        --exclude=deploy-manual.sh \
        --exclude=*.tar.gz \
        .
    
    print_status "تم إنشاء الملف المضغوط: ${ARCHIVE_NAME}"
    echo ${ARCHIVE_NAME}
}

# رفع الملفات للسيرفر
upload_files() {
    local archive_name=$1
    print_status "رفع الملفات للسيرفر..."
    
    # رفع الملف المضغوط
    scp ${archive_name} ${SERVER_USER}@${SERVER_HOST}:/tmp/
    
    print_status "تم رفع الملفات بنجاح ✓"
}

# تنفيذ الـ deployment على السيرفر
deploy_on_server() {
    local archive_name=$1
    print_status "تنفيذ الـ deployment على السيرفر..."
    
    ssh ${SERVER_USER}@${SERVER_HOST} << EOF
        set -e
        
        # متغيرات
        PROJECT_PATH="${PROJECT_PATH}"
        BACKUP_PATH="/home/nomufood/backups"
        TIMESTAMP=\$(date +%Y%m%d_%H%M%S)
        ARCHIVE_NAME="${archive_name}"
        
        echo "=== بدء الـ Deployment على السيرفر ==="
        
        # إنشاء مجلد النسخ الاحتياطية
        mkdir -p \${BACKUP_PATH}
        
        # نسخة احتياطية من قاعدة البيانات
        echo "إنشاء نسخة احتياطية من قاعدة البيانات..."
        if command -v mysqldump &> /dev/null; then
            mysqldump -u nomufood_user -p nomufood_db > \${BACKUP_PATH}/db_backup_\${TIMESTAMP}.sql 2>/dev/null || echo "تحذير: فشل في إنشاء نسخة احتياطية من قاعدة البيانات"
        fi
        
        # نسخة احتياطية من الملفات الحالية
        if [ -d "\${PROJECT_PATH}" ]; then
            echo "إنشاء نسخة احتياطية من الملفات..."
            tar -czf \${BACKUP_PATH}/files_backup_\${TIMESTAMP}.tar.gz -C \${PROJECT_PATH} . 2>/dev/null || echo "تحذير: فشل في إنشاء نسخة احتياطية من الملفات"
        fi
        
        # وضع الموقع في وضع الصيانة
        if [ -f "\${PROJECT_PATH}/artisan" ]; then
            echo "تفعيل وضع الصيانة..."
            cd \${PROJECT_PATH}
            php artisan down --message="جاري التحديث، سنعود قريباً" --retry=60 || true
        fi
        
        # إنشاء مجلد المشروع إذا لم يكن موجوداً
        mkdir -p \${PROJECT_PATH}
        
        # استخراج الملفات الجديدة
        echo "استخراج الملفات الجديدة..."
        cd \${PROJECT_PATH}
        tar -xzf /tmp/\${ARCHIVE_NAME}
        rm /tmp/\${ARCHIVE_NAME}
        
        # إعداد ملف البيئة
        echo "إعداد ملف البيئة..."
        if [ ! -f ".env" ]; then
            if [ -f ".env.production" ]; then
                cp .env.production .env
            else
                echo "تحذير: ملف .env غير موجود"
            fi
        fi
        
        # إعداد الصلاحيات
        echo "إعداد الصلاحيات..."
        chown -R nomufood:nomufood .
        chmod -R 755 .
        chmod -R 775 storage bootstrap/cache
        chmod 600 .env 2>/dev/null || true
        
        # توليد مفتاح التطبيق إذا لم يكن موجوداً
        if ! grep -q "APP_KEY=base64:" .env 2>/dev/null; then
            echo "توليد مفتاح التطبيق..."
            php artisan key:generate --force
        fi
        
        # تشغيل migrations
        echo "تشغيل Database Migrations..."
        php artisan migrate --force
        
        # إنشاء storage link
        echo "إنشاء Storage Link..."
        php artisan storage:link
        
        # مسح وإعادة بناء cache
        echo "تحديث Cache..."
        php artisan config:clear
        php artisan cache:clear
        php artisan route:clear
        php artisan view:clear
        
        php artisan config:cache
        php artisan route:cache
        php artisan view:cache
        php artisan optimize
        
        # إعادة تشغيل queue workers إذا كان متاحاً
        if command -v supervisorctl &> /dev/null; then
            echo "إعادة تشغيل Queue Workers..."
            supervisorctl restart nomufood-worker:* || true
        fi
        
        # إلغاء وضع الصيانة
        echo "إلغاء وضع الصيانة..."
        php artisan up
        
        echo "=== تم الـ Deployment بنجاح ==="
        echo "وقت الـ Deployment: \$(date)"
        
        # اختبار سريع
        echo "=== اختبار سريع ==="
        if php artisan --version > /dev/null 2>&1; then
            echo "✅ Laravel يعمل بشكل صحيح"
            echo "إصدار Laravel: \$(php artisan --version)"
        else
            echo "❌ Laravel به مشاكل"
        fi
        
        if php artisan migrate:status > /dev/null 2>&1; then
            echo "✅ قاعدة البيانات تعمل بشكل صحيح"
        else
            echo "❌ قاعدة البيانات بها مشاكل"
        fi
        
        echo "=== انتهاء الاختبار ==="
EOF
    
    print_status "تم الـ deployment بنجاح ✓"
}

# تنظيف الملفات المحلية
cleanup() {
    local archive_name=$1
    print_status "تنظيف الملفات المحلية..."
    
    if [ -f "${archive_name}" ]; then
        rm ${archive_name}
        print_status "تم حذف الملف المضغوط المحلي ✓"
    fi
}

# اختبار الاتصال بالسيرفر
test_connection() {
    print_status "اختبار الاتصال بالسيرفر..."
    
    if ssh -o ConnectTimeout=10 ${SERVER_USER}@${SERVER_HOST} "echo 'Connection successful'" > /dev/null 2>&1; then
        print_status "الاتصال بالسيرفر ناجح ✓"
        return 0
    else
        print_error "فشل في الاتصال بالسيرفر"
        print_error "تأكد من:"
        print_error "1. صحة عنوان IP: ${SERVER_HOST}"
        print_error "2. صحة اسم المستخدم: ${SERVER_USER}"
        print_error "3. إعداد SSH keys بشكل صحيح"
        return 1
    fi
}

# الدالة الرئيسية
main() {
    echo "=== بدء عملية الـ Deployment اليدوي ==="
    echo "السيرفر: ${SERVER_HOST}"
    echo "المستخدم: ${SERVER_USER}"
    echo "مسار المشروع: ${PROJECT_PATH}"
    echo ""
    
    # فحص المتطلبات
    check_requirements
    
    # اختبار الاتصال
    if ! test_connection; then
        exit 1
    fi
    
    # تأكيد من المستخدم
    read -p "هل تريد المتابعة مع الـ deployment؟ (y/N): " -n 1 -r
    echo
    if [[ ! $REPLY =~ ^[Yy]$ ]]; then
        print_warning "تم إلغاء العملية"
        exit 0
    fi
    
    # تحضير المشروع
    archive_name=$(prepare_project)
    
    # رفع الملفات
    upload_files ${archive_name}
    
    # تنفيذ الـ deployment
    deploy_on_server ${archive_name}
    
    # تنظيف
    cleanup ${archive_name}
    
    print_status "=== تم الـ Deployment بنجاح ==="
    print_status "يمكنك الآن زيارة الموقع: https://nomufood.com"
}

# تشغيل الدالة الرئيسية
main "$@"