# دليل رفع التحديثات على السيرفر بدون فقد البيانات

## 📋 المشكلة الحالية
عند رفع الملفات والداتابيز كل مرة، بتفقد البيانات اللي اتضافت على السيرفر (طلبات، عملاء، إلخ).

## ✅ الحل الصحيح: استخدام Git + Migrations فقط

---

## الطريقة الأولى: Git Deployment (الأفضل والأسرع)

### الإعداد الأولي (مرة واحدة فقط)

#### 1. تثبيت Git على السيرفر
```bash
# إذا كان Linux
sudo apt-get update
sudo apt-get install git

# إذا كان Windows Server
# حمل Git من: https://git-scm.com/download/win
```

#### 2. Clone المشروع على السيرفر
```bash
cd /path/to/your/server/directory
git clone https://github.com/Nour-Abotaleb/POS.git
cd POS
```

#### 3. إعداد الـ .env على السيرفر
```bash
cp .env.example .env
nano .env  # أو استخدم محرر نصوص آخر
```

املأ بيانات السيرفر:
```env
APP_URL=https://yourdomain.com
DB_HOST=localhost
DB_DATABASE=your_production_db
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_password
```

#### 4. تثبيت Dependencies
```bash
composer install --optimize-autoloader --no-dev
npm install
npm run build
```

#### 5. إعداد Laravel
```bash
php artisan key:generate
php artisan storage:link
php artisan migrate --force
php artisan optimize
```

---

### رفع التحديثات (كل مرة)

#### الخطوات على السيرفر:

```bash
# 1. الدخول لمجلد المشروع
cd /path/to/your/POS

# 2. عمل backup سريع (احتياطي)
php artisan backup:run  # إذا كان عندك backup module

# 3. تفعيل Maintenance Mode
php artisan down

# 4. سحب آخر تحديثات من GitHub
git pull origin main

# 5. تحديث Dependencies (إذا تغيرت)
composer install --optimize-autoloader --no-dev

# 6. تشغيل Migrations الجديدة فقط
php artisan migrate --force

# 7. مسح الـ Cache
php artisan optimize:clear
php artisan view:clear
php artisan config:cache
php artisan route:cache

# 8. إعادة build الـ assets (إذا تغيرت)
npm run build

# 9. إلغاء Maintenance Mode
php artisan up
```

---

## الطريقة الثانية: FTP/SFTP (إذا ما كانش Git متاح)

### ⚠️ قواعد مهمة جداً:

#### ✅ الملفات اللي ترفعها:
- `app/` - كل ملفات الكود
- `resources/` - ملفات Views و Assets
- `routes/` - ملفات الـ Routes
- `config/` - ملفات الإعدادات
- `database/migrations/` - ملفات الـ Migrations الجديدة فقط
- `public/` - ملفات CSS/JS المبنية (بعد npm run build)

#### ❌ الملفات اللي ما ترفعهاش أبداً:
- `.env` - ده خاص بكل سيرفر
- `storage/` - فيه ملفات المستخدمين والـ cache
- `vendor/` - ده بيتعمل install على السيرفر
- `node_modules/` - ده بيتعمل install على السيرفر
- `database/` - ما عدا الـ migrations الجديدة

#### 🔄 الخطوات:

```bash
# 1. على جهازك المحلي
npm run build  # بناء الـ assets

# 2. رفع الملفات المتغيرة فقط عبر FTP
# استخدم برنامج مثل FileZilla أو WinSCP

# 3. على السيرفر (عبر SSH أو Terminal)
cd /path/to/your/project

# 4. تشغيل Migrations الجديدة
php artisan migrate --force

# 5. مسح الـ Cache
php artisan optimize:clear
php artisan view:clear
php artisan config:cache
```

---

## الطريقة الثالثة: Deployment Script (الأكثر احترافية)

### إنشاء سكريبت للـ Deployment

#### على السيرفر: `deploy.sh`

```bash
#!/bin/bash

echo "🚀 Starting deployment..."

# Colors
GREEN='\033[0;32m'
RED='\033[0;31m'
NC='\033[0m' # No Color

# Project path
PROJECT_PATH="/path/to/your/POS"

cd $PROJECT_PATH

# 1. Maintenance Mode
echo "📦 Enabling maintenance mode..."
php artisan down

# 2. Pull latest changes
echo "⬇️  Pulling latest changes from GitHub..."
git pull origin main

if [ $? -ne 0 ]; then
    echo "${RED}❌ Git pull failed!${NC}"
    php artisan up
    exit 1
fi

# 3. Install/Update Composer dependencies
echo "📚 Installing Composer dependencies..."
composer install --optimize-autoloader --no-dev

# 4. Run migrations
echo "🗄️  Running database migrations..."
php artisan migrate --force

if [ $? -ne 0 ]; then
    echo "${RED}❌ Migration failed!${NC}"
    php artisan up
    exit 1
fi

# 5. Clear caches
echo "🧹 Clearing caches..."
php artisan optimize:clear
php artisan view:clear
php artisan config:cache
php artisan route:cache

# 6. Build assets (if needed)
if [ -f "package.json" ]; then
    echo "🎨 Building assets..."
    npm install
    npm run build
fi

# 7. Set permissions
echo "🔐 Setting permissions..."
chmod -R 755 storage bootstrap/cache

# 8. Disable maintenance mode
echo "✅ Disabling maintenance mode..."
php artisan up

echo "${GREEN}✅ Deployment completed successfully!${NC}"
```

#### جعل السكريبت قابل للتنفيذ:
```bash
chmod +x deploy.sh
```

#### تشغيل السكريبت:
```bash
./deploy.sh
```

---

## 🔒 حماية البيانات: Backup Strategy

### 1. Backup تلقائي قبل كل Deployment

#### إنشاء سكريبت Backup: `backup.sh`

```bash
#!/bin/bash

# Backup directory
BACKUP_DIR="/path/to/backups"
DATE=$(date +%Y%m%d_%H%M%S)
PROJECT_PATH="/path/to/your/POS"

# Database credentials
DB_NAME="your_database"
DB_USER="your_user"
DB_PASS="your_password"

# Create backup directory
mkdir -p $BACKUP_DIR

# Backup database
echo "📦 Backing up database..."
mysqldump -u $DB_USER -p$DB_PASS $DB_NAME > $BACKUP_DIR/db_backup_$DATE.sql

# Backup storage folder (user uploads)
echo "📦 Backing up storage..."
tar -czf $BACKUP_DIR/storage_backup_$DATE.tar.gz $PROJECT_PATH/storage/app/public

# Keep only last 7 backups
echo "🧹 Cleaning old backups..."
cd $BACKUP_DIR
ls -t db_backup_*.sql | tail -n +8 | xargs rm -f
ls -t storage_backup_*.tar.gz | tail -n +8 | xargs rm -f

echo "✅ Backup completed!"
```

### 2. استخدام Laravel Backup Package

```bash
composer require spatie/laravel-backup
php artisan vendor:publish --provider="Spatie\Backup\BackupServiceProvider"
```

#### في `config/backup.php`:
```php
'backup' => [
    'name' => env('APP_NAME', 'laravel-backup'),
    'source' => [
        'files' => [
            'include' => [
                base_path(),
            ],
            'exclude' => [
                base_path('vendor'),
                base_path('node_modules'),
            ],
        ],
        'databases' => [
            'mysql',
        ],
    ],
],
```

#### تشغيل Backup:
```bash
php artisan backup:run
```

---

## 📊 مقارنة الطرق

| الطريقة | السرعة | الأمان | سهولة الاستخدام | فقد البيانات |
|---------|--------|--------|-----------------|--------------|
| Git Deployment | ⭐⭐⭐⭐⭐ | ⭐⭐⭐⭐⭐ | ⭐⭐⭐⭐ | ❌ لا |
| FTP (صح) | ⭐⭐⭐ | ⭐⭐⭐ | ⭐⭐⭐⭐⭐ | ❌ لا |
| FTP (غلط) | ⭐⭐ | ⭐ | ⭐⭐⭐⭐⭐ | ✅ نعم |
| Deployment Script | ⭐⭐⭐⭐⭐ | ⭐⭐⭐⭐⭐ | ⭐⭐⭐ | ❌ لا |

---

## 🎯 التوصية النهائية

### للمشاريع الصغيرة والمتوسطة:
استخدم **Git Deployment** مع **Deployment Script**

### الخطوات المختصرة:

```bash
# على جهازك المحلي
git add .
git commit -m "Your changes"
git push origin main

# على السيرفر
cd /path/to/your/POS
./deploy.sh
```

---

## ⚠️ أخطاء شائعة يجب تجنبها

### ❌ لا تفعل:
1. رفع قاعدة البيانات كاملة كل مرة
2. حذف مجلد `storage/` على السيرفر
3. نسخ ملف `.env` من جهازك للسيرفر
4. رفع مجلد `vendor/` عبر FTP
5. تشغيل `php artisan migrate:fresh` على السيرفر

### ✅ افعل:
1. استخدم `git pull` لسحب التحديثات
2. استخدم `php artisan migrate` فقط (بدون fresh أو refresh)
3. احتفظ بـ backup دوري
4. استخدم `.env` منفصل لكل بيئة
5. اعمل `composer install` على السيرفر

---

## 🔧 إعداد GitHub Actions (اختياري - متقدم)

### ملف `.github/workflows/deploy.yml`:

```yaml
name: Deploy to Production

on:
  push:
    branches: [ main ]

jobs:
  deploy:
    runs-on: ubuntu-latest
    
    steps:
    - name: Deploy to server
      uses: appleboy/ssh-action@master
      with:
        host: ${{ secrets.SERVER_HOST }}
        username: ${{ secrets.SERVER_USER }}
        key: ${{ secrets.SERVER_SSH_KEY }}
        script: |
          cd /path/to/your/POS
          ./deploy.sh
```

هذا يجعل الـ deployment تلقائي عند كل push على GitHub!

---

## 📝 Checklist قبل كل Deployment

- [ ] عملت commit لكل التغييرات
- [ ] عملت push على GitHub
- [ ] عملت backup للداتابيز على السيرفر
- [ ] تأكدت إن الـ migrations شغالة على Local
- [ ] فعلت Maintenance Mode
- [ ] سحبت آخر تحديثات من Git
- [ ] شغلت Migrations
- [ ] مسحت الـ Cache
- [ ] ألغيت Maintenance Mode
- [ ] اختبرت الموقع

---

## 🆘 استرجاع البيانات في حالة الطوارئ

### إذا حصل خطأ:

```bash
# 1. استرجاع قاعدة البيانات
mysql -u username -p database_name < /path/to/backup/db_backup_YYYYMMDD.sql

# 2. استرجاع الملفات
tar -xzf /path/to/backup/storage_backup_YYYYMMDD.tar.gz -C /path/to/your/POS/

# 3. الرجوع لـ commit سابق
git reset --hard COMMIT_HASH
git push -f origin main  # احذر! هذا يحذف التاريخ

# أو
git revert COMMIT_HASH  # أفضل - يحتفظ بالتاريخ
```

---

## 🔧 حل المشاكل الشائعة

### مشكلة: Class "Modules\MultiPOS\Providers\MultiPOSServiceProvider" not found

**السبب:** اختلاف حالة الأحرف بين Windows و Linux (Case Sensitivity)

**الحل السريع:**

```bash
cd /path/to/your/project

# تنظيف جميع الـ caches
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan optimize:clear

# حذف ملفات الـ cache في bootstrap
rm -f bootstrap/cache/modules.php
rm -f bootstrap/cache/packages.php
rm -f bootstrap/cache/services.php
rm -f bootstrap/cache/config.php

# إعادة بناء autoload
composer dump-autoload

# إعادة اكتشاف الـ modules
php artisan module:discover

# تحسين التطبيق
php artisan optimize
```

**أو استخدم السكريبت الجاهز:**

```bash
chmod +x fix-multipos-issue.sh
./fix-multipos-issue.sh
```

**للمزيد من التفاصيل:** راجع ملف `حل-مشكلة-MultiPOS.md`

### مشكلة: Target class [translator] does not exist

**السبب:** نفس المشكلة السابقة - الـ cache فاسد

**الحل:** نفس الخطوات السابقة لتنظيف الـ cache

### مشكلة: الصلاحيات (Permission Denied)

```bash
# إعطاء الصلاحيات الصحيحة
chown -R www-data:www-data /path/to/your/project
chmod -R 755 /path/to/your/project
chmod -R 775 storage bootstrap/cache
```

### مشكلة: الموقع يظهر صفحة بيضاء

```bash
# تفعيل عرض الأخطاء مؤقتاً
# في ملف .env
APP_DEBUG=true

# تحقق من سجلات الأخطاء
tail -f storage/logs/laravel.log
```

---

## 📞 الخلاصة

**الطريقة الصحيحة:**
1. استخدم Git للكود
2. استخدم Migrations لقاعدة البيانات
3. لا ترفع قاعدة البيانات كاملة
4. احتفظ بـ backup دوري
5. استخدم Deployment Script

**النتيجة:**
- ✅ لا فقد للبيانات
- ✅ سرعة في الـ Deployment
- ✅ إمكانية الرجوع للإصدارات السابقة
- ✅ أمان أعلى

---

**تاريخ الإنشاء:** مارس 2026  
**الإصدار:** 1.0
