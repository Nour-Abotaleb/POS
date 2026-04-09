#!/bin/bash

# Quick Update Script for nomufood.com
# للتحديثات السريعة بدون إعادة تثبيت كامل

echo "=== تحديث سريع لـ NomuFood ==="

PROJECT_PATH="/home/nomufood/htdocs/nomufood.com"
BACKUP_PATH="/home/nomufood/backups"

# إنشاء مجلد النسخ الاحتياطية إذا لم يكن موجوداً
mkdir -p ${BACKUP_PATH}

# 1. نسخة احتياطية من قاعدة البيانات
echo "إنشاء نسخة احتياطية من قاعدة البيانات..."
mysqldump -u nomufood_user -p nomufood_db > ${BACKUP_PATH}/db_backup_$(date +%Y%m%d_%H%M%S).sql

# 2. نسخة احتياطية من ملف .env
echo "نسخ احتياطي من ملف البيئة..."
cp ${PROJECT_PATH}/.env ${BACKUP_PATH}/env_backup_$(date +%Y%m%d_%H%M%S)

# 3. وضع الموقع في وضع الصيانة
echo "تفعيل وضع الصيانة..."
cd ${PROJECT_PATH}
php artisan down --message="جاري التحديث، سنعود قريباً" --retry=60

# 4. تحديث الكود
echo "تحديث الكود..."
# هنا يمكنك إضافة git pull إذا كنت تستخدم Git
# git pull origin main

# 5. تحديث Dependencies
echo "تحديث Composer..."
composer install --no-dev --optimize-autoloader

# 6. تشغيل Migrations الجديدة
echo "تشغيل Database Migrations..."
php artisan migrate --force

# 7. مسح وإعادة بناء Cache
echo "تحديث Cache..."
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

php artisan config:cache
php artisan route:cache
php artisan view:cache

# 8. تحديث Storage Link
echo "تحديث Storage Link..."
php artisan storage:link

# 9. إعادة تشغيل Queue Workers
if command -v supervisorctl &> /dev/null; then
    echo "إعادة تشغيل Queue Workers..."
    supervisorctl restart nomufood-worker:*
fi

# 10. إلغاء وضع الصيانة
echo "إلغاء وضع الصيانة..."
php artisan up

# 11. اختبار سريع
echo "اختبار سريع..."
php artisan route:list | head -5
echo "عدد المستخدمين: $(php artisan tinker --execute='echo \App\Models\User::count();')"

echo "=== تم التحديث بنجاح ==="
echo "تاريخ التحديث: $(date)"
echo "النسخ الاحتياطية محفوظة في: ${BACKUP_PATH}"