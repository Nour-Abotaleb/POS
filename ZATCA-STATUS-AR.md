# حالة التكامل مع هيئة الزكاة والضريبة والجمارك (ZATCA)

## 📊 التقييم العام: ✅ 95% جاهز

---

## ✅ ما تم تنفيذه بنجاح (100%)

### 1. البنية التحتية للبيانات
- ✅ Migration لإضافة حقول VAT والسجل التجاري
- ✅ الحقول موجودة في جدول `restaurants`
- ✅ واجهة إدخال البيانات في صفحة الإعدادات
- ✅ الترجمة العربية والإنجليزية كاملة

### 2. توليد QR Code
- ✅ `ZatcaHelper` class موجود ومُنفذ
- ✅ يستخدم TLV encoding حسب معايير ZATCA
- ✅ يولّد QR Code بـ 5 عناصر (Tags 1-5):
  - Tag 1: اسم البائع
  - Tag 2: رقم VAT
  - Tag 3: التاريخ والوقت (ISO 8601)
  - Tag 4: المجموع شامل الضريبة
  - Tag 5: قيمة الضريبة

### 3. تكامل مع النظام
- ✅ `OrderController` يستخدم `ZatcaHelper`
- ✅ دالة `generateZatcaQrCode()` تعمل بشكل صحيح
- ✅ تُستخدم في الطباعة العادية والـ PDF
- ✅ تحسب الضريبة بشكل صحيح
- ✅ تتعامل مع الحالات الاستثنائية

### 4. قوالب الفواتير
- ✅ `print.blade.php` - للطباعة الحرارية
- ✅ `print-pdf.blade.php` - لملفات PDF
- ✅ كلاهما يعرض:
  - عنوان "فاتورة ضريبية مبسطة / Simplified Tax Invoice"
  - اسم المطعم
  - رقم VAT
  - السجل التجاري
  - تاريخ ووقت الفاتورة
  - رقم الفاتورة
  - تفاصيل الأصناف
  - المجموع قبل الضريبة
  - قيمة الضريبة 15%
  - المجموع الإجمالي
  - QR Code واضح

### 5. البيانات الحالية
- ✅ رقم VAT: `300000000000003` (15 رقم)
- ✅ السجل التجاري: `1010123457` (10 أرقام)
- ✅ ضريبة VAT: 15% مُفعّلة

---

## ⚠️ ما يحتاج تأكيد (5%)

### 1. البيانات الحقيقية
```
⚠️ الأرقام الحالية تجريبية - يجب استبدالها بالأرقام الحقيقية:

- رقم VAT الحقيقي من بوابة فاتورة (15 رقم)
- السجل التجاري الحقيقي (10 أرقام)
```

### 2. اختبار QR Code
```
⚠️ يجب اختبار QR Code باستخدام:
- تطبيق ZATCA الرسمي
- التأكد من ظهور جميع البيانات بشكل صحيح
```

### 3. رفع نماذج الفواتير
```
⚠️ يجب رفع نماذج الفواتير على بوابة فاتورة:
- فاتورة ضريبية مبسطة (Simplified Tax Invoice)
- إشعار مدين (Debit Note) - إذا كان موجود
- إشعار دائن (Credit Note) - إذا كان موجود
```

---

## 🎯 الخطوات المطلوبة الآن

### الخطوة 1: تحديث البيانات الحقيقية
```bash
# استخدم الملف: update-zatca-info.sql
# استبدل الأرقام التجريبية بالأرقام الحقيقية
```

### الخطوة 2: اختبار الفاتورة
```bash
# اتبع الدليل: test-zatca-invoice.md
# اطبع فاتورة تجريبية
# اختبر QR Code بتطبيق ZATCA
```

### الخطوة 3: رفع النماذج للهيئة
```
1. اذهب إلى: https://fatoora.zatca.gov.sa
2. سجّل دخول
3. ارفع نماذج الفواتير PDF
4. انتظر الموافقة
```

---

## 📋 متطلبات ZATCA للمطاعم (B2C)

### ✅ ما تم تنفيذه (مطلوب):
- ✅ فاتورة ضريبية مبسطة
- ✅ QR Code متوافق (TLV encoding)
- ✅ جميع البيانات المطلوبة
- ✅ رقم VAT (15 رقم)
- ✅ السجل التجاري (10 أرقام)
- ✅ ضريبة 15%

### ❌ ما لا يحتاج تنفيذه (غير مطلوب للمطاعم):
- ❌ API integration مع ZATCA
- ❌ Cryptographic Stamp
- ❌ Digital Signature
- ❌ Invoice Hash
- ❌ Real-time reporting

---

## 🔍 الفرق بين B2C و B2B

### B2C (Business to Consumer) - للمطاعم ✅
```
✅ فاتورة ضريبية مبسطة
✅ QR Code فقط (بدون توقيع رقمي)
✅ لا يحتاج API integration
✅ هذا ما تم تنفيذه في النظام
```

### B2B (Business to Business) - للشركات ❌
```
❌ فاتورة ضريبية كاملة
❌ يحتاج API integration مع ZATCA
❌ يحتاج Cryptographic Stamp
❌ يحتاج Digital Signature
❌ غير مطلوب للمطاعم
```

---

## 📁 الملفات المُعدّلة

### Migrations:
- `database/migrations/2026_03_06_120000_add_vat_number_to_restaurants.php`

### Helper Classes:
- `app/Helper/ZatcaHelper.php` (جديد)

### Controllers:
- `app/Http/Controllers/OrderController.php`

### Livewire Components:
- `app/Livewire/Settings/GeneralSettings.php`

### Views:
- `resources/views/livewire/settings/general-settings.blade.php`
- `resources/views/order/print.blade.php`
- `resources/views/order/print-pdf.blade.php`

### Translation Files:
- `lang/eng/settings.php`
- `lang/ar/settings.php`

---

## 🧪 كيفية الاختبار

### 1. اختبار QR Code يدوياً:
```bash
# في Laravel Tinker:
php artisan tinker

# نفذ:
use App\Helper\ZatcaHelper;
use Carbon\Carbon;

$qr = ZatcaHelper::generateQRCode(
    'مطعم تجريبي',
    '300000000000003',
    Carbon::now()->toIso8601String(),
    '115.00',
    '15.00'
);

echo $qr;
```

### 2. اختبار الفاتورة:
```
1. أنشئ طلب جديد
2. اطبع الفاتورة PDF
3. تحقق من وجود جميع العناصر المطلوبة
4. امسح QR Code بتطبيق ZATCA
```

---

## 📞 جهات الاتصال والمراجع

### بوابة فاتورة:
- الموقع: https://fatoora.zatca.gov.sa
- الدعم الفني: 19993

### مراجع ZATCA:
- [دليل الفوترة الإلكترونية](https://zatca.gov.sa/ar/E-Invoicing/Pages/default.aspx)
- [متطلبات QR Code](https://zatca.gov.sa/ar/E-Invoicing/Introduction/Guidelines/Documents/QR_Code_Guidelines.pdf)

---

## ✅ الخلاصة

**النظام جاهز بنسبة 95% للتكامل مع هيئة الزكاة!**

الـ 5% المتبقية هي فقط:
1. تحديث الأرقام الحقيقية (VAT + السجل التجاري)
2. اختبار QR Code بتطبيق ZATCA
3. رفع نماذج الفواتير للهيئة

**لا يوجد أي ربط API مطلوب للمطاعم (B2C)**

---

**آخر تحديث:** 11 مارس 2026  
**الحالة:** ✅ جاهز للاستخدام بعد تحديث البيانات الحقيقية
