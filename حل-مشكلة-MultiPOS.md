# حل مشكلة MultiPOS عند الرفع على السيرفر

## المشكلة
```
Class "Modules\MultiPOS\Providers\MultiPOSServiceProvider" not found
```

## السبب
المشكلة تحدث بسبب اختلاف حالة الأحرف (Case Sensitivity) بين Windows و Linux:
- المجلد الفعلي: `Modules/Multipos`
- المجلد المطلوب في الـ cache: `Modules/MultiPOS`

## الحل السريع

### الطريقة 1: تنظيف الـ Cache (الأسرع)

قم بتنفيذ هذه الأوامر على السيرفر:

```bash
cd /home/nomufood-test/htdocs/test.nomufood.com

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

### الطريقة 2: استخدام السكريبت الجاهز

```bash
cd /home/nomufood-test/htdocs/test.nomufood.com
chmod +x fix-multipos-issue.sh
./fix-multipos-issue.sh
```

### الطريقة 3: إعادة تسمية المجلد (الحل الدائم)

إذا استمرت المشكلة، قم بإعادة تسمية المجلد:

```bash
cd /home/nomufood-test/htdocs/test.nomufood.com/Modules
mv Multipos MultiPOS
```

ثم نفذ أوامر التنظيف مرة أخرى.

## التحقق من الحل

بعد تنفيذ الحل، تحقق من أن الموقع يعمل:

```bash
# تحقق من عدم وجود أخطاء
php artisan about

# تحقق من الـ modules
php artisan module:list
```

## ملاحظات مهمة

1. **تأكد من الصلاحيات**: تأكد أن المستخدم لديه صلاحيات الكتابة على المجلدات
   ```bash
   chown -R nomufood-test:nomufood-test /home/nomufood-test/htdocs/test.nomufood.com
   chmod -R 755 /home/nomufood-test/htdocs/test.nomufood.com
   chmod -R 775 storage bootstrap/cache
   ```

2. **إعادة تشغيل الخدمات**: بعد التنظيف، أعد تشغيل:
   ```bash
   # إذا كنت تستخدم PHP-FPM
   sudo systemctl restart php-fpm
   
   # إذا كنت تستخدم Apache
   sudo systemctl restart apache2
   
   # إذا كنت تستخدم Nginx
   sudo systemctl restart nginx
   ```

3. **تحديث .env**: تأكد من إعدادات البيئة صحيحة:
   ```
   APP_ENV=production
   APP_DEBUG=false
   ```

## الوقاية من المشكلة مستقبلاً

عند الرفع على السيرفر في المستقبل:

1. احذف مجلد `bootstrap/cache` قبل الرفع
2. لا ترفع مجلد `vendor` - استخدم `composer install` على السيرفر
3. نفذ `php artisan optimize:clear` بعد كل رفع

## إذا استمرت المشكلة

إذا استمرت المشكلة بعد كل الحلول السابقة:

```bash
# تحقق من وجود المجلد
ls -la Modules/ | grep -i multipos

# تحقق من محتوى ملف الـ cache
cat bootstrap/cache/modules.php

# تحقق من الـ composer autoload
composer dump-autoload -o
```

## الدعم

إذا واجهت أي مشاكل، تحقق من:
- سجلات الأخطاء: `storage/logs/laravel.log`
- سجلات السيرفر: `/var/log/apache2/error.log` أو `/var/log/nginx/error.log`
