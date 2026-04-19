#!/bin/bash

# Server Installation Script for nomufood.com
# تشغيل هذا السكريبت على السيرفر بعد رفع الملفات

echo "=== بدء تثبيت NomuFood على السيرفر ==="

# متغيرات السيرفر
DOMAIN="nomufood.com"
PROJECT_PATH="/home/nomufood/htdocs/nomufood.com"
DB_NAME="nomufood_db"
DB_USER="nomufood_user"
DB_PASS="$(openssl rand -base64 32)"

# 1. إنشاء قاعدة البيانات
echo "إنشاء قاعدة البيانات..."
mysql -u root -p << EOF
CREATE DATABASE IF NOT EXISTS ${DB_NAME} CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER IF NOT EXISTS '${DB_USER}'@'localhost' IDENTIFIED BY '${DB_PASS}';
GRANT ALL PRIVILEGES ON ${DB_NAME}.* TO '${DB_USER}'@'localhost';
FLUSH PRIVILEGES;
EOF

echo "Database created: ${DB_NAME}"
echo "Database user: ${DB_USER}"
echo "Database password: ${DB_PASS}"

# 2. إعداد الصلاحيات
echo "إعداد الصلاحيات..."
cd ${PROJECT_PATH}
chown -R nomufood:nomufood .
chmod -R 755 .
chmod -R 775 storage
chmod -R 775 bootstrap/cache
chmod 600 .env

# 3. تثبيت Dependencies
echo "تثبيت Composer Dependencies..."
composer install --no-dev --optimize-autoloader

# 4. إعداد Laravel
echo "إعداد Laravel..."
php artisan key:generate
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 5. تشغيل Migrations
echo "تشغيل Database Migrations..."
php artisan migrate --force

# 6. إنشاء Storage Link
echo "إنشاء Storage Link..."
php artisan storage:link

# 7. إعداد Cron Jobs
echo "إعداد Cron Jobs..."
(crontab -l 2>/dev/null; echo "* * * * * cd ${PROJECT_PATH} && php artisan schedule:run >> /dev/null 2>&1") | crontab -

# 8. إعداد Queue Worker (إذا كان متاح Supervisor)
if command -v supervisorctl &> /dev/null; then
    echo "إعداد Queue Worker..."
    cat > /etc/supervisor/conf.d/nomufood-worker.conf << EOF
[program:nomufood-worker]
process_name=%(program_name)s_%(process_num)02d
command=php ${PROJECT_PATH}/artisan queue:work redis --sleep=3 --tries=3 --max-time=3600
autostart=true
autorestart=true
stopasgroup=true
killasgroup=true
user=nomufood
numprocs=2
redirect_stderr=true
stdout_logfile=${PROJECT_PATH}/storage/logs/worker.log
stopwaitsecs=3600
EOF

    supervisorctl reread
    supervisorctl update
    supervisorctl start nomufood-worker:*
fi

# 9. تحسين الأداء
echo "تحسين الأداء..."
php artisan optimize

echo "=== تم تثبيت NomuFood بنجاح ==="
echo ""
echo "معلومات قاعدة البيانات:"
echo "Database: ${DB_NAME}"
echo "Username: ${DB_USER}"
echo "Password: ${DB_PASS}"
echo ""
echo "تأكد من تحديث ملف .env بهذه المعلومات"