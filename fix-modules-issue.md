# حل مشكلة عدم ظهور الموديولز

## المشكلة
الموديولز مش ظاهرة للمطور اللي شغال معاك رغم إنك أديته الداتابيز ورفعت الكود على GitHub.

## السبب
المشكلة إن الموديولز محتاجة تتعمل seed في الداتابيز عشان تظهر في النظام. الموديولز مش بتتنسخ مع الداتابيز العادية لأنها محتاجة تتربط بالـ packages.

## الحل

### الخطوة الأولى: تشغيل الـ Seeders
```bash
# تشغيل seeder الموديولز
php artisan db:seed --class=ModuleSeeder

# تشغيل seeder الـ packages
php artisan db:seed --class=PackageSeeder

# مسح الـ cache
php artisan cache:clear
```

### الخطوة الثانية: التأكد من تفعيل الموديولز
```bash
# عرض حالة الموديولز
php artisan module:list

# تفعيل موديول معين (لو كان معطل)
php artisan module:enable ModuleName
```

### الخطوة الثالثة: التأكد من ربط المطعم بالـ Package
تأكد إن المطعم مربوط بـ package صحيح في جدول `restaurants`:
```sql
SELECT id, name, package_id FROM restaurants;
```

### الخطوة الرابعة: مسح الـ Cache
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

## ملاحظات مهمة

1. **الموديولز الأساسية**: النظام يحتوي على موديولز أساسية مثل:
   - Menu
   - Menu Item
   - Item Category
   - Area
   - Table
   - Reservation
   - KOT
   - Order
   - Customer
   - Staff
   - Payment
   - Report
   - Settings
   - Delivery Executive
   - Waiter Request
   - Expense

2. **الموديولز الإضافية**: الموديولز الموجودة في مجلد `Modules/` مثل:
   - Backup
   - CashRegister
   - Inventory
   - Kiosk
   - Kitchen
   - LanguagePack
   - MultiPOS
   - RestApi
   - Whatsapp

3. **التحقق من الصلاحيات**: تأكد إن المستخدم عنده الصلاحيات المطلوبة لرؤية الموديولز.

## إذا المشكلة لسه موجودة

1. تأكد إن الداتابيز فيها البيانات الصحيحة:
```sql
SELECT * FROM modules;
SELECT * FROM packages;
SELECT * FROM package_modules;
```

2. تأكد إن المطعم مربوط بـ package:
```sql
SELECT r.name, p.package_name 
FROM restaurants r 
JOIN packages p ON r.package_id = p.id;
```

3. تشغيل الـ seeders كاملة:
```bash
php artisan db:seed
```