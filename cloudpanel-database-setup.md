# إعداد قاعدة البيانات في CloudPanel

## الخطوات المطلوبة في CloudPanel

### 1. إنشاء قاعدة البيانات

1. **اذهب إلى CloudPanel Dashboard**
   - URL: https://109.199.110.224:8443/nomufood.com/settings
   - أو من الصفحة الرئيسية → Sites → nomufood.com

2. **اضغط على تبويب "Databases"**

3. **اضغط على "Add Database"**

4. **املأ البيانات التالية:**
   ```
   Database Name: nomufood_db
   Database User: nomufood_user
   Database Password: [كلمة مرور قوية]
   ```

5. **اضغط على "Add Database"**

### 2. تأكيد إعدادات PHP

1. **اذهب إلى تبويب "Vhost"**

2. **تأكد من إعدادات PHP:**
   - PHP Version: 8.2
   - PHP Extensions: تأكد من تفعيل:
     - mysql/mysqli
     - pdo_mysql
     - mbstring
     - xml
     - curl
     - zip
     - gd
     - bcmath
     - redis
     - intl

### 3. إعداد SSL Certificate

1. **اذهب إلى تبويب "SSL/TLS"**

2. **اختر إحدى الطرق:**
   - **Let's Encrypt** (مجاني ومُوصى به)
   - **Custom Certificate** (إذا كان لديك شهادة خاصة)

3. **للـ Let's Encrypt:**
   - اضغط على "Actions" → "New Let's Encrypt Certificate"
   - أدخل البريد الإلكتروني
   - اختر Domains: nomufood.com, www.nomufood.com
   - اضغط على "Create and Install"

### 4. إعداد File Manager (اختياري)

1. **اذهب إلى تبويب "File Manager"**

2. **تأكد من أن المسار صحيح:**
   ```
   /home/nomufood/htdocs/nomufood.com/
   ```

### 5. إعداد Cron Jobs

1. **اذهب إلى تبويب "Cron Jobs"**

2. **أضف Cron Job جديد:**
   ```
   Command: cd /home/nomufood/htdocs/nomufood.com && php artisan schedule:run
   Schedule: * * * * * (كل دقيقة)
   ```

### 6. مراقبة السجلات

1. **اذهب إلى تبويب "Logs"**

2. **يمكنك مراقبة:**
   - Access Logs
   - Error Logs
   - PHP Error Logs

## بعد إعداد قاعدة البيانات

### تشغيل الأوامر على السيرفر:

```bash
# الاتصال بالسيرفر
ssh nomufood@109.199.110.224

# الانتقال لمجلد المشروع
cd /home/nomufood/htdocs/nomufood.com

# تشغيل migrations
php artisan migrate --force

# إنشاء storage link
php artisan storage:link

# تحسين الأداء
php artisan optimize

# اختبار الموقع
php artisan --version
```

## اختبار النهائي

1. **زيارة الموقع:**
   - https://nomufood.com

2. **فحص SSL:**
   - تأكد من ظهور القفل الأخضر

3. **اختبار تسجيل الدخول:**
   - إذا كان هناك نظام مستخدمين

## استكشاف الأخطاء

### إذا ظهر خطأ 500:
```bash
# فحص سجلات الأخطاء
tail -f /home/nomufood/htdocs/nomufood.com/storage/logs/laravel.log
```

### إذا لم يعمل الموقع:
1. تأكد من صلاحيات الملفات
2. تأكد من إعدادات .env
3. تأكد من اتصال قاعدة البيانات

### أوامر مفيدة:
```bash
# فحص حالة قاعدة البيانات
php artisan migrate:status

# اختبار اتصال قاعدة البيانات
php artisan tinker
# ثم في tinker:
DB::connection()->getPdo();

# مسح الـ cache
php artisan optimize:clear
```

## معلومات مهمة للحفظ

- **Server IP:** 109.199.110.224
- **Username:** nomufood
- **Domain:** nomufood.com
- **Project Path:** /home/nomufood/htdocs/nomufood.com/
- **Database Name:** nomufood_db
- **Database User:** nomufood_user
- **CloudPanel URL:** https://109.199.110.224:8443/