# دليل سريع للـ Deployment

## 🚀 الطريقة السريعة (Git)

### على جهازك المحلي:
```bash
git add .
git commit -m "وصف التحديثات"
git push origin main
```

### على السيرفر:
```bash
cd /path/to/your/POS
chmod +x deploy.sh  # مرة واحدة فقط
./deploy.sh
```

---

## 📦 عمل Backup قبل التحديث

```bash
cd /path/to/your/POS
chmod +x backup.sh  # مرة واحدة فقط
./backup.sh
```

---

## 🔧 الطريقة اليدوية (بدون Scripts)

### على السيرفر:

```bash
# 1. الدخول للمشروع
cd /path/to/your/POS

# 2. تفعيل Maintenance Mode
php artisan down

# 3. سحب التحديثات
git pull origin main

# 4. تحديث Dependencies (إذا لزم)
composer install --optimize-autoloader --no-dev

# 5. تشغيل Migrations الجديدة
php artisan migrate --force

# 6. مسح Cache
php artisan optimize:clear
php artisan view:clear
php artisan config:cache

# 7. إلغاء Maintenance Mode
php artisan up
```

---

## ⚠️ في حالة الطوارئ

### استرجاع قاعدة البيانات:
```bash
cd /path/to/your/POS/backups
gunzip db_backup_YYYYMMDD_HHMMSS.sql.gz
mysql -u username -p database_name < db_backup_YYYYMMDD_HHMMSS.sql
```

### استرجاع الملفات:
```bash
cd /path/to/your/POS
tar -xzf backups/storage_backup_YYYYMMDD_HHMMSS.tar.gz
```

### الرجوع لإصدار سابق:
```bash
git log  # شوف الـ commits
git reset --hard COMMIT_HASH
php artisan migrate:rollback  # إذا لزم
```

---

## 📋 Checklist

- [ ] عملت backup
- [ ] عملت push على GitHub
- [ ] شغلت deploy.sh على السيرفر
- [ ] اختبرت الموقع

---

## 🆘 مشاكل شائعة

### المشكلة: Permission denied
```bash
chmod +x deploy.sh
chmod +x backup.sh
```

### المشكلة: Git pull failed
```bash
git stash  # احفظ التغييرات المحلية
git pull origin main
git stash pop  # استرجع التغييرات
```

### المشكلة: Migration failed
```bash
php artisan migrate:status  # شوف حالة الـ migrations
php artisan migrate:rollback  # ارجع خطوة
php artisan migrate  # حاول تاني
```

---

## 📞 للدعم

راجع الملف الكامل: `DEPLOYMENT_GUIDE.md`
