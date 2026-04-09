# دليل Deploy مشروع NomuFood

## الخطوات المطلوبة للـ Deployment

### 1. تحضير المشروع محلياً

```bash
# تشغيل سكريبت التحضير
chmod +x deploy-script.sh
./deploy-script.sh
```

### 2. رفع الملفات إلى السيرفر

#### الطريقة الأولى: عبر CloudPanel File Manager
1. اذهب إلى CloudPanel → File Manager
2. انتقل إلى `/home/nomufood/htdocs/nomufood.com/`
3. احذف المحتوى الموجود (إن وجد)
4. ارفع الملف المضغوط
5. فك الضغط

#### الطريقة الثانية: عبر SSH/SFTP
```bash
# رفع الملف عبر SCP
scp nomufood-deploy-*.zip nomufood@109.199.110.224:/home/nomufood/htdocs/nomufood.com/

# الاتصال بالسيرفر
ssh nomufood@109.199.110.224

# فك الضغط
cd /home/nomufood/htdocs/nomufood.com/
unzip nomufood-deploy-*.zip
rm nomufood-deploy-*.zip
```

### 3. إعداد ملف البيئة

```bash
# نسخ ملف البيئة
cp .env.production .env

# تعديل المتغيرات المطلوبة
nano .env
```

**المتغيرات المهمة التي يجب تحديثها:**
- `APP_KEY` (سيتم توليده تلقائياً)
- `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`
- `APP_URL=https://nomufood.com`
- شهادات ZATCA إذا كانت متوفرة

### 4. تشغيل سكريبت التثبيت

```bash
# إعطاء صلاحية التشغيل
chmod +x server-install.sh

# تشغيل السكريبت
sudo ./server-install.sh
```

### 5. إعداد Nginx (إذا لم يكن معداً تلقائياً)

```bash
# نسخ ملف التكوين
sudo cp nginx-nomufood.conf /etc/nginx/sites-available/nomufood.com

# تفعيل الموقع
sudo ln -s /etc/nginx/sites-available/nomufood.com /etc/nginx/sites-enabled/

# اختبار التكوين
sudo nginx -t

# إعادة تشغيل Nginx
sudo systemctl reload nginx
```

### 6. إعداد SSL Certificate

إذا لم يكن CloudPanel يدير SSL تلقائياً:

```bash
# تثبيت Certbot
sudo apt install certbot python3-certbot-nginx

# الحصول على شهادة SSL
sudo certbot --nginx -d nomufood.com -d www.nomufood.com
```

### 7. اختبار المشروع

1. **اختبار الموقع الأساسي:**
   - زيارة https://nomufood.com
   - التأكد من عمل تسجيل الدخول

2. **اختبار قاعدة البيانات:**
   ```bash
   php artisan tinker
   # في Tinker:
   \App\Models\User::count()
   ```

3. **اختبار الـ Queue (إذا كان مفعلاً):**
   ```bash
   php artisan queue:work --once
   ```

### 8. إعداد المراقبة والصيانة

#### Cron Jobs للصيانة
```bash
# إضافة مهام الصيانة
crontab -e
```

```cron
# Laravel Scheduler
* * * * * cd /home/nomufood/htdocs/nomufood.com && php artisan schedule:run >> /dev/null 2>&1

# تنظيف السجلات القديمة (أسبوعياً)
0 2 * * 0 cd /home/nomufood/htdocs/nomufood.com && php artisan log:clear

# نسخ احتياطي لقاعدة البيانات (يومياً)
0 3 * * * mysqldump -u nomufood_user -p'PASSWORD' nomufood_db > /home/nomufood/backups/db_$(date +\%Y\%m\%d).sql
```

#### مراقبة الأداء
```bash
# مراقبة استخدام المساحة
df -h

# مراقبة استخدام الذاكرة
free -h

# مراقبة العمليات
top
```

### 9. إعداد ZATCA (إذا كان مطلوباً)

```bash
# إضافة شهادات ZATCA
mkdir -p storage/zatca
# رفع ملفات الشهادات إلى storage/zatca/

# تحديث متغيرات البيئة
nano .env
```

```env
ZATCA_ENVIRONMENT=production
ZATCA_CERTIFICATE_PATH=storage/zatca/certificate.pem
ZATCA_PRIVATE_KEY_PATH=storage/zatca/private_key.pem
```

### 10. اختبار نهائي شامل

```bash
# اختبار جميع المسارات المهمة
curl -I https://nomufood.com
curl -I https://nomufood.com/login
curl -I https://nomufood.com/api/health

# اختبار قاعدة البيانات
php artisan migrate:status

# اختبار الـ Cache
php artisan cache:clear
php artisan config:cache
```

## استكشاف الأخطاء الشائعة

### خطأ 500 Internal Server Error
```bash
# فحص سجلات الأخطاء
tail -f storage/logs/laravel.log
tail -f /var/log/nginx/nomufood.com.error.log
```

### مشاكل الصلاحيات
```bash
# إعادة تعيين الصلاحيات
sudo chown -R nomufood:nomufood /home/nomufood/htdocs/nomufood.com
sudo chmod -R 755 /home/nomufood/htdocs/nomufood.com
sudo chmod -R 775 /home/nomufood/htdocs/nomufood.com/storage
sudo chmod -R 775 /home/nomufood/htdocs/nomufood.com/bootstrap/cache
```

### مشاكل قاعدة البيانات
```bash
# اختبار الاتصال
php artisan tinker
# في Tinker:
DB::connection()->getPdo()
```

## معلومات مهمة

- **Domain:** nomufood.com
- **Server IP:** 109.199.110.224
- **Project Path:** /home/nomufood/htdocs/nomufood.com/
- **User:** nomufood
- **PHP Version:** 8.2 (تأكد من التوافق)

## جهات الاتصال للدعم

في حالة وجود مشاكل:
1. فحص سجلات الأخطاء أولاً
2. التأكد من إعدادات CloudPanel
3. مراجعة تكوين Nginx
4. فحص صلاحيات الملفات