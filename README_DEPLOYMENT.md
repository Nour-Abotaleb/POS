# دليل الـ Deployment لمشروع NomuFood

## طرق الـ Deployment المتاحة

### 1. الـ Deployment التلقائي عبر GitHub Actions (الطريقة المفضلة)

#### الإعداد الأولي:
1. **رفع الكود إلى GitHub Repository**
2. **إعداد GitHub Secrets** (راجع `.github/DEPLOYMENT_SECRETS.md`)
3. **Push إلى branch main** - سيتم الـ deployment تلقائياً

#### المميزات:
- ✅ تلقائي بالكامل
- ✅ اختبارات قبل الـ deployment
- ✅ نسخ احتياطية تلقائية
- ✅ rollback سريع في حالة الأخطاء
- ✅ إشعارات عن حالة الـ deployment

### 2. الـ Deployment اليدوي

#### استخدام السكريبت التلقائي:
```bash
# إعطاء صلاحية التشغيل
chmod +x deploy-manual.sh

# تشغيل السكريبت
./deploy-manual.sh
```

#### الـ Deployment اليدوي خطوة بخطوة:
```bash
# 1. تحضير المشروع محلياً
composer install --no-dev --optimize-autoloader
npm ci && npm run build

# 2. إنشاء ملف مضغوط
tar -czf nomufood-deploy.tar.gz \
  --exclude=node_modules \
  --exclude=.git \
  --exclude=tests \
  --exclude=.env \
  .

# 3. رفع للسيرفر
scp nomufood-deploy.tar.gz nomufood@109.199.110.224:/tmp/

# 4. تنفيذ على السيرفر
ssh nomufood@109.199.110.224
cd /home/nomufood/htdocs/nomufood.com
php artisan down
tar -xzf /tmp/nomufood-deploy.tar.gz
php artisan migrate --force
php artisan optimize
php artisan up
```

## معلومات السيرفر

- **Domain:** nomufood.com
- **Server IP:** 109.199.110.224
- **Username:** nomufood
- **Project Path:** /home/nomufood/htdocs/nomufood.com/
- **Control Panel:** CloudPanel

## متطلبات السيرفر

### PHP Extensions المطلوبة:
- PHP 8.2+
- mbstring
- xml
- ctype
- iconv
- intl
- pdo_mysql
- gd
- zip
- bcmath
- redis

### خدمات إضافية:
- MySQL 8.0+
- Redis (للـ cache والـ sessions)
- Nginx
- Supervisor (للـ queue workers)

## إعداد البيئة

### ملف .env الأساسي:
```env
APP_NAME="NomuFood"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://nomufood.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_DATABASE=nomufood_db
DB_USERNAME=nomufood_user
DB_PASSWORD=your_secure_password

CACHE_DRIVER=redis
SESSION_DRIVER=redis
QUEUE_CONNECTION=redis

REDIS_HOST=127.0.0.1
REDIS_PORT=6379
```

## الأوامر المفيدة

### على السيرفر:
```bash
# فحص حالة التطبيق
cd /home/nomufood/htdocs/nomufood.com
php artisan --version

# فحص قاعدة البيانات
php artisan migrate:status

# مسح الـ cache
php artisan optimize:clear

# إعادة بناء الـ cache
php artisan optimize

# فحص الـ queue workers
supervisorctl status nomufood-worker:*

# مراقبة السجلات
tail -f storage/logs/laravel.log
```

### محلياً:
```bash
# اختبار الاتصال بالسيرفر
ssh nomufood@109.199.110.224

# اختبار الموقع
curl -I https://nomufood.com

# فحص SSL
openssl s_client -connect nomufood.com:443 -servername nomufood.com
```

## استكشاف الأخطاء

### خطأ 500 Internal Server Error:
```bash
# فحص سجلات Laravel
tail -f /home/nomufood/htdocs/nomufood.com/storage/logs/laravel.log

# فحص سجلات Nginx
tail -f /var/log/nginx/error.log

# فحص صلاحيات الملفات
ls -la /home/nomufood/htdocs/nomufood.com/storage/
```

### مشاكل قاعدة البيانات:
```bash
# اختبار الاتصال
mysql -u nomufood_user -p nomufood_db

# فحص الـ migrations
php artisan migrate:status

# إعادة تشغيل الـ migrations (احذر!)
php artisan migrate:fresh --force
```

### مشاكل الـ Cache:
```bash
# مسح جميع أنواع الـ cache
php artisan optimize:clear

# إعادة بناء الـ cache
php artisan optimize

# فحص Redis
redis-cli ping
```

## الأمان والنسخ الاحتياطية

### النسخ الاحتياطية التلقائية:
```bash
# إعداد cron job للنسخ الاحتياطية
crontab -e

# إضافة هذا السطر:
0 3 * * * mysqldump -u nomufood_user -p'password' nomufood_db > /home/nomufood/backups/db_$(date +\%Y\%m\%d).sql
```

### مراقبة الأمان:
```bash
# مراقبة محاولات تسجيل الدخول
tail -f /var/log/auth.log

# فحص العمليات الجارية
ps aux | grep php

# مراقبة استخدام الموارد
htop
```

## الدعم والمساعدة

### في حالة وجود مشاكل:
1. **فحص السجلات أولاً**
2. **التأكد من إعدادات CloudPanel**
3. **مراجعة صلاحيات الملفات**
4. **اختبار الاتصال بقاعدة البيانات**

### معلومات الاتصال:
- **GitHub Repository:** [رابط المشروع]
- **Server Provider:** [معلومات مقدم الخدمة]
- **Domain Registrar:** [معلومات مسجل النطاق]

---

**ملاحظة:** تأكد دائماً من إنشاء نسخة احتياطية قبل أي عملية deployment أو تحديث.