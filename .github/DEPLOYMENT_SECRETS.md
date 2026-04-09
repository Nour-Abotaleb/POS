# GitHub Secrets Configuration

لتفعيل الـ deployment التلقائي عبر GitHub Actions، تحتاج لإضافة المتغيرات التالية في GitHub Secrets:

## كيفية إضافة Secrets في GitHub

1. اذهب إلى repository الخاص بك على GitHub
2. اضغط على **Settings**
3. من القائمة الجانبية، اختر **Secrets and variables** → **Actions**
4. اضغط على **New repository secret**
5. أضف كل secret من القائمة التالية

## المتغيرات المطلوبة

### معلومات السيرفر
```
HOST = 109.199.110.224
USERNAME = nomufood
PORT = 22
```

### SSH Key
```
SSH_KEY = [محتوى الـ private key للاتصال بالسيرفر]
```

**لإنشاء SSH Key:**
```bash
# على جهازك المحلي
ssh-keygen -t rsa -b 4096 -C "github-actions@nomufood.com"

# انسخ المحتوى من الملف الخاص
cat ~/.ssh/id_rsa

# أضف المحتوى كاملاً (بما في ذلك -----BEGIN و -----END) في SSH_KEY secret
```

**لإضافة Public Key للسيرفر:**
```bash
# انسخ المحتوى من الملف العام
cat ~/.ssh/id_rsa.pub

# على السيرفر، أضف المحتوى إلى
echo "ssh-rsa AAAAB3NzaC1yc2E... github-actions@nomufood.com" >> ~/.ssh/authorized_keys
```

### معلومات قاعدة البيانات
```
DB_DATABASE = nomufood_db
DB_USERNAME = nomufood_user
DB_PASSWORD = [كلمة مرور قاعدة البيانات]
```

## اختبار الـ Deployment

بعد إضافة جميع الـ secrets:

1. قم بعمل commit وpush لأي تغيير على branch main
2. اذهب إلى تبويب **Actions** في GitHub
3. ستجد workflow يعمل تلقائياً
4. راقب العملية للتأكد من نجاحها

## استكشاف الأخطاء

### إذا فشل الاتصال بالسيرفر:
- تأكد من صحة HOST و USERNAME و PORT
- تأكد من أن SSH_KEY صحيح ومضاف للسيرفر
- تأكد من أن firewall السيرفر يسمح بالاتصال على port 22

### إذا فشلت قاعدة البيانات:
- تأكد من صحة معلومات قاعدة البيانات
- تأكد من وجود قاعدة البيانات على السيرفر
- تأكد من صلاحيات المستخدم

### إذا فشل Laravel:
- تحقق من سجلات الأخطاء في storage/logs/
- تأكد من صلاحيات الملفات
- تأكد من وجود جميع extensions المطلوبة لـ PHP

## الأوامر المفيدة للسيرفر

```bash
# مراقبة سجلات الـ deployment
tail -f /home/nomufood/htdocs/nomufood.com/storage/logs/laravel.log

# فحص حالة الموقع
curl -I https://nomufood.com

# فحص العمليات الجارية
ps aux | grep php

# فحص استخدام المساحة
df -h

# فحص استخدام الذاكرة
free -h
```

## نصائح للأمان

1. **لا تشارك الـ secrets مع أحد**
2. **استخدم كلمات مرور قوية لقاعدة البيانات**
3. **قم بتغيير SSH keys بشكل دوري**
4. **راقب سجلات الوصول للسيرفر**
5. **فعل two-factor authentication على GitHub**

## الدعم

في حالة وجود مشاكل:
1. تحقق من سجلات GitHub Actions
2. تحقق من سجلات السيرفر
3. تأكد من جميع المتغيرات والصلاحيات