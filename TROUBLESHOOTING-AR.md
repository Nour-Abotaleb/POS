# 🔧 دليل استكشاف الأخطاء وحلها

## المشاكل الشائعة وحلولها

---

## 1️⃣ مشكلة: Class "Modules\MultiPOS\Providers\MultiPOSServiceProvider" not found

### السبب
اختلاف حالة الأحرف (Case Sensitivity) بين Windows و Linux

### الحل السريع
```bash
./quick-fix.sh
```

### الحل اليدوي
```bash
php artisan cache:clear
php artisan config:clear
rm -f bootstrap/cache/*.php
composer dump-autoload
php artisan module:discover
php artisan optimize
```

### إذا استمرت المشكلة
```bash
# تحقق من اسم المجلد
ls -la Modules/ | grep -i multipos

# إذا كان Multipos (صغير)، أعد تسميته
mv Modules/Multipos Modules/MultiPOS
./quick-fix.sh
```

---

## 2️⃣ مشكلة: Target class [translator] does not exist

### السبب
الـ cache فاسد أو الـ service providers لم يتم تحميلها

### الحل
```bash
php artisan cache:clear
php artisan config:clear
rm -f bootstrap/cache/services.php
composer dump-autoload
php artisan optimize
```

---

## 3️⃣ مشكلة: صفحة بيضاء (White Screen)

### الحل
```bash
# 1. فعل عرض الأخطاء مؤقتاً
# في ملف .env
APP_DEBUG=true

# 2. تحقق من السجلات
tail -f storage/logs/laravel.log

# 3. تحقق من الصلاحيات
chmod -R 755 storage bootstrap/cache

# 4. أعد بناء الـ cache
php artisan optimize:clear
php artisan optimize
```

---

## 4️⃣ مشكلة: Permission Denied

### الحل
```bash
# إعطاء الصلاحيات الصحيحة
sudo chown -R www-data:www-data /path/to/project
sudo chmod -R 755 /path/to/project
sudo chmod -R 775 storage bootstrap/cache

# إذا كنت تستخدم مستخدم مختلف
sudo chown -R your-user:your-group /path/to/project
```

---

## 5️⃣ مشكلة: 500 Internal Server Error

### الخطوات
```bash
# 1. تحقق من سجل الأخطاء
tail -f storage/logs/laravel.log
tail -f /var/log/nginx/error.log
tail -f /var/log/apache2/error.log

# 2. تحقق من ملف .env
cat .env | grep -E "APP_KEY|DB_"

# 3. إذا كان APP_KEY فارغ
php artisan key:generate

# 4. تحقق من الاتصال بقاعدة البيانات
php artisan tinker
>>> DB::connection()->getPdo();

# 5. امسح الـ cache
./quick-fix.sh
```

---

## 6️⃣ مشكلة: Class not found بعد composer install

### الحل
```bash
# 1. امسح الـ cache
composer clear-cache

# 2. أعد التثبيت
rm -rf vendor
composer install --optimize-autoloader

# 3. أعد بناء autoload
composer dump-autoload -o

# 4. امسح Laravel cache
php artisan optimize:clear
```

---

## 7️⃣ مشكلة: SQLSTATE[HY000] [2002] Connection refused

### السبب
لا يمكن الاتصال بقاعدة البيانات

### الحل
```bash
# 1. تحقق من إعدادات .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password

# 2. تحقق من تشغيل MySQL
sudo systemctl status mysql
sudo systemctl start mysql

# 3. تحقق من الاتصال
mysql -u your_username -p
```

---

## 8️⃣ مشكلة: The stream or file could not be opened

### السبب
مشكلة في صلاحيات مجلد storage

### الحل
```bash
# 1. إنشاء المجلدات المطلوبة
mkdir -p storage/framework/{sessions,views,cache}
mkdir -p storage/logs

# 2. إعطاء الصلاحيات
chmod -R 775 storage
chown -R www-data:www-data storage

# 3. إذا استمرت المشكلة
sudo chmod -R 777 storage  # مؤقتاً للاختبار فقط
```

---

## 9️⃣ مشكلة: Composer memory limit

### الحل
```bash
# زيادة الذاكرة مؤقتاً
php -d memory_limit=-1 /usr/local/bin/composer install

# أو بشكل دائم في php.ini
memory_limit = 512M
```

---

## 🔟 مشكلة: npm run build fails

### الحل
```bash
# 1. امسح الـ cache
rm -rf node_modules
rm package-lock.json

# 2. أعد التثبيت
npm install

# 3. إذا استمرت المشكلة
npm cache clean --force
npm install
npm run build
```

---

## 1️⃣1️⃣ مشكلة: Route not found بعد الرفع

### الحل
```bash
# 1. امسح route cache
php artisan route:clear

# 2. أعد بناء route cache
php artisan route:cache

# 3. تحقق من الـ routes
php artisan route:list
```

---

## 1️⃣2️⃣ مشكلة: View not found

### الحل
```bash
# 1. امسح view cache
php artisan view:clear

# 2. تحقق من وجود الملف
ls -la resources/views/

# 3. أعد بناء view cache
php artisan view:cache
```

---

## 1️⃣3️⃣ مشكلة: Config cached, cannot change .env

### الحل
```bash
# 1. امسح config cache
php artisan config:clear

# 2. عدل .env
nano .env

# 3. أعد بناء config cache
php artisan config:cache
```

---

## 1️⃣4️⃣ مشكلة: Mixed Content (HTTP/HTTPS)

### الحل
```bash
# في ملف .env
APP_URL=https://yourdomain.com

# في AppServiceProvider.php
use Illuminate\Support\Facades\URL;

public function boot()
{
    if (config('app.env') === 'production') {
        URL::forceScheme('https');
    }
}
```

---

## 1️⃣5️⃣ مشكلة: Session not working

### الحل
```bash
# 1. تحقق من إعدادات session في .env
SESSION_DRIVER=file
SESSION_LIFETIME=120

# 2. امسح session cache
php artisan session:clear

# 3. تحقق من الصلاحيات
chmod -R 775 storage/framework/sessions

# 4. أعد تشغيل الخدمات
sudo systemctl restart php-fpm
```

---

## 🛠️ أدوات التشخيص

### فحص شامل للنظام
```bash
# معلومات Laravel
php artisan about

# قائمة الـ routes
php artisan route:list

# قائمة الـ modules
php artisan module:list

# فحص قاعدة البيانات
php artisan migrate:status

# فحص الـ cache
php artisan cache:table
```

### فحص السجلات
```bash
# آخر 50 سطر من سجل Laravel
tail -50 storage/logs/laravel.log

# متابعة السجل مباشرة
tail -f storage/logs/laravel.log

# سجل Nginx
tail -f /var/log/nginx/error.log

# سجل Apache
tail -f /var/log/apache2/error.log

# سجل PHP-FPM
tail -f /var/log/php-fpm/error.log
```

### فحص الخدمات
```bash
# حالة Nginx
sudo systemctl status nginx

# حالة PHP-FPM
sudo systemctl status php-fpm

# حالة MySQL
sudo systemctl status mysql

# إعادة تشغيل الكل
sudo systemctl restart nginx php-fpm mysql
```

---

## 📋 Checklist استكشاف الأخطاء

عند مواجهة أي مشكلة، اتبع هذا الترتيب:

- [ ] تحقق من السجلات (logs)
- [ ] تحقق من ملف .env
- [ ] تحقق من الصلاحيات
- [ ] امسح جميع الـ caches
- [ ] أعد بناء autoload
- [ ] أعد تشغيل الخدمات
- [ ] اختبر الموقع

---

## 🚨 حالات الطوارئ

### إذا تعطل الموقع تماماً:

```bash
# 1. فعل maintenance mode
php artisan down

# 2. استرجع من backup
mysql -u user -p database < backup.sql

# 3. ارجع لـ commit سابق
git log --oneline
git reset --hard COMMIT_HASH

# 4. نفذ quick fix
./quick-fix.sh

# 5. ألغ maintenance mode
php artisan up
```

### إذا فقدت البيانات:

```bash
# استرجع من آخر backup
mysql -u user -p database < /path/to/backup/db_backup_YYYYMMDD.sql

# استرجع الملفات
tar -xzf /path/to/backup/storage_backup_YYYYMMDD.tar.gz -C /path/to/project/
```

---

## 📞 الحصول على المساعدة

### معلومات مفيدة عند طلب المساعدة:

```bash
# 1. إصدار PHP
php -v

# 2. إصدار Composer
composer --version

# 3. إصدار Laravel
php artisan --version

# 4. معلومات النظام
uname -a

# 5. آخر 20 سطر من السجل
tail -20 storage/logs/laravel.log

# 6. قائمة الـ modules
php artisan module:list
```

---

## 🎯 الوقاية خير من العلاج

### قبل كل deployment:

```bash
# 1. اختبر محلياً
php artisan test

# 2. اعمل backup
./backup.sh

# 3. استخدم deployment script
./deploy.sh

# 4. راقب السجلات
tail -f storage/logs/laravel.log
```

### بعد كل deployment:

```bash
# 1. نفذ quick fix
./quick-fix.sh

# 2. اختبر الموقع
curl -I https://yourdomain.com

# 3. تحقق من السجلات
tail -20 storage/logs/laravel.log
```

---

**تم التحديث:** مارس 2026  
**الإصدار:** 1.0
