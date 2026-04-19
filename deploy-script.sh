#!/bin/bash

# Deploy Script for nomufood.com
# تشغيل هذا السكريبت على السيرفر المحلي قبل الرفع

echo "=== تحضير المشروع للـ Deploy ==="

# 1. تنظيف الملفات غير المطلوبة
echo "تنظيف الملفات..."
rm -rf node_modules
rm -rf vendor
rm -rf storage/logs/*.log
rm -rf storage/framework/cache/data/*
rm -rf storage/framework/sessions/*
rm -rf storage/framework/views/*

# 2. تحديث composer.json للإنتاج
echo "تحديث Composer..."
composer install --no-dev --optimize-autoloader

# 3. بناء الـ assets
echo "بناء الـ Assets..."
npm install
npm run build

# 4. إنشاء ملف zip للرفع
echo "إنشاء ملف الضغط..."
zip -r nomufood-deploy-$(date +%Y%m%d-%H%M%S).zip . \
  -x "node_modules/*" \
  -x ".git/*" \
  -x "*.log" \
  -x "storage/logs/*" \
  -x "tests/*" \
  -x ".env" \
  -x "deploy-script.sh"

echo "=== تم تحضير المشروع بنجاح ==="
echo "ارفع الملف المضغوط إلى السيرفر"