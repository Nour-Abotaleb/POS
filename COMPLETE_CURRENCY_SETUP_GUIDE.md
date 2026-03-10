# دليل شامل: إضافة وإصلاح عرض رمز الريال السعودي (﷼)

## 📋 جدول المحتويات
1. [إضافة عملة الريال السعودي](#الجزء-الأول-إضافة-عملة-الريال-السعودي)
2. [إصلاح عرض الرمز في صفحات Super Admin](#الجزء-الثاني-إصلاح-عرض-الرمز)
3. [التحقق من نجاح العملية](#الجزء-الثالث-التحقق-من-نجاح-العملية)
4. [استكشاف الأخطاء](#الجزء-الرابع-استكشاف-الأخطاء)

---

# الجزء الأول: إضافة عملة الريال السعودي

## الخطوة 1: تسجيل الدخول كـ Super Admin

1. افتح المتصفح واذهب إلى رابط النظام
2. سجل دخول بحساب Super Admin
3. ستجد نفسك في لوحة التحكم الرئيسية

---

## الخطوة 2: الذهاب إلى إعدادات العملات

### الطريقة الأولى (من القائمة):
1. اضغط على **Settings** (الإعدادات) في القائمة الجانبية
2. اختر تبويب **Currency Settings** (إعدادات العملة)

### الطريقة الثانية (من الرابط المباشر):
اذهب إلى:
```
http://your-domain.com/superadmin/settings?tab=currency
```

---

## الخطوة 3: إضافة عملة جديدة

1. **اضغط على زر "Add Currency"** (إضافة عملة)
   - ستظهر نافذة منبثقة على الجانب الأيمن

2. **املأ البيانات التالية:**

### أ) البيانات الأساسية:

| الحقل | القيمة | ملاحظات |
|-------|--------|---------|
| **Currency Name** | `Saudi Riyal` | اسم العملة بالإنجليزية |
| **Currency Symbol** | `﷼` | رمز الريال (انظر الطرق أدناه) |
| **Currency Code** | `SAR` | كود العملة الدولي |

### ب) إعدادات التنسيق:

| الحقل | القيمة | ملاحظات |
|-------|--------|---------|
| **Currency Position** | `Left` | موضع الرمز (قبل الرقم) |
| **Thousand Separator** | `,` | فاصل الآلاف (فاصلة) |
| **Decimal Separator** | `.` | فاصل العشري (نقطة) |
| **Number of Decimals** | `2` | عدد الخانات العشرية |

---

## الخطوة 4: كيفية إدخال رمز الريال (﷼)

### ⭐ الطريقة المستخدمة في مشروعك: SVG Icon (الأفضل)

**في مشروعك الحالي، رمز الريال محفوظ كـ SVG** - وهذا هو السبب في أننا احتجنا لتعديل الملفات!

**الرمز المحفوظ عندك:**
```html
<img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTFweCIgaGVpZ2h0PSIxMXB4IiB2aWV3Qm94PSIwIDAgMjQgMjQiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZD0iTTEyIDJDNi40OCAyIDIgNi40OCAyIDEyczQuNDggMTAgMTAgMTAgMTAtNC40OCAxMC0xMFMxNy41MiAyIDEyIDJ6bTEuNDEgMTYuMDlWMjBoLTIuNjd2LTEuOTNjLTEuNzEtLjM2LTMuMTYtMS40Ni0zLjI3LTMuNGgxLjk4Yy4xMi45Ljg5IDEuNTggMS45NSAxLjU4IDEuMjQgMCAyLjEtLjgzIDIuMS0xLjk3IDAtMS4xMS0uODYtMS43OC0yLjEtMi4xNWwtMS4xMy0uMzRjLTEuODEtLjU1LTIuODMtMS41NC0yLjgzLTMuMjUgMC0xLjYxIDEuMTgtMi43OSAyLjg5LTMuMjFWNGgyLjY3djEuOTVjMS40Ni4zNCAyLjU2IDEuMzkgMi42NyAzLjA3aC0xLjk4Yy0uMDktLjg3LS43NS0xLjUzLTEuNzEtMS41My0xLjA2IDAtMS44NS43NC0xLjg1IDEuNzQgMCAxLjA1Ljc5IDEuNjUgMi4wMSAyLjAzbDEuMDIuMzJjMi4wMS42MSAzLjA3IDEuNjUgMy4wNyAzLjQgMCAxLjczLTEuMTQgMi45Ni0zLjAzIDMuMzd6IiBmaWxsPSJjdXJyZW50Q29sb3IiLz48L3N2Zz4=" style="width:11px;height:11px;vertical-align:middle;" alt="﷼">
```

**لماذا SVG؟**
- ✅ يظهر بشكل احترافي ومتناسق
- ✅ يعمل في كل المتصفحات
- ✅ يمكن تخصيص الحجم واللون
- ✅ لا يعتمد على الخطوط المثبتة

**لكن المشكلة:**
- ❌ يحتاج `{!! !!}` في Blade Templates (وهذا ما صلحناه!)
- ❌ إذا استخدمنا `{{ }}` سيظهر كـ HTML text

---

### الطرق البديلة (إذا أردت تغيير الرمز):

#### الطريقة 1: النص العادي (الأبسط)
```
﷼
```
**الخطوات:**
1. انسخ الرمز من هنا: `﷼`
2. الصقه في حقل "Currency Symbol"
3. احفظ

**المميزات:**
- سهل الإدخال
- حجم صغير في قاعدة البيانات

**العيوب:**
- قد لا يظهر في بعض الخطوط القديمة

---

#### الطريقة 2: النص البديل
```
SAR
```
أو
```
ر.س
```

**المميزات:**
- يعمل في كل الخطوط
- واضح ومفهوم

**العيوب:**
- ليس رمز رسمي

---

#### الطريقة 3: HTML Entity
```html
&#xFDFC;
```

**المميزات:**
- يعمل في HTML
- متوافق مع معظم المتصفحات

**العيوب:**
- يحتاج `{!! !!}` في Blade

---

### 💡 ملاحظة مهمة:

**في مشروعك الحالي:**
- الرمز محفوظ كـ SVG في قاعدة البيانات
- التعديلات التي عملناها (تغيير `{{ }}` إلى `{!! !!}`) تسمح بعرض هذا الـ SVG بشكل صحيح
- **لا تحتاج لتغيير الرمز** - فقط التعديلات على الملفات كافية!

---

## الخطوة 5: معاينة التنسيق

بعد ملء البيانات، ستجد في أسفل النافذة:

**إذا كنت تستخدم SVG (كما في مشروعك):**
```
Example: [أيقونة الريال]12,345.68
```

**إذا كنت تستخدم النص العادي:**
```
Example: ﷼12,345.68
```

تأكد من أن التنسيق يظهر بشكل صحيح.

---

## 📝 ملاحظة مهمة عن SVG:

في مشروعك الحالي، رمز الريال محفوظ كـ **SVG Icon** في قاعدة البيانات. هذا يعني:

1. **في حقل Currency Symbol** في قاعدة البيانات، ستجد كود HTML طويل يبدأ بـ:
   ```html
   <img src="data:image/svg+xml;base64,...
   ```

2. **هذا الكود يحتوي على:**
   - صورة SVG مشفرة بـ Base64
   - أبعاد الأيقونة (11px × 11px)
   - محاذاة عمودية (vertical-align: middle)

3. **لهذا السبب احتجنا لتعديل الملفات:**
   - `{{ }}` كان يعرض الكود كـ text عادي
   - `{!! !!}` يعرض الكود كـ HTML فعلي (أيقونة)

4. **لا تحتاج لتغيير أي شيء في قاعدة البيانات** - فقط التعديلات على الملفات كافية!

---

## الخطوة 6: حفظ العملة

1. **اضغط على زر "Save"** (حفظ)
2. ستظهر رسالة نجاح
3. ستغلق النافذة المنبثقة
4. ستجد العملة الجديدة في الجدول

---

## الخطوة 7: تعيين العملة كافتراضية (اختياري)

إذا كنت تريد جعل الريال السعودي العملة الافتراضية:

1. اذهب إلى **App Settings** (إعدادات التطبيق)
2. ابحث عن **Default Currency** (العملة الافتراضية)
3. اختر **Saudi Riyal (SAR)**
4. احفظ التغييرات

---

# الجزء الثاني: إصلاح عرض الرمز

**⚠️ هذا الجزء ضروري جداً إذا كان رمز العملة محفوظ كـ SVG/HTML!**

في مشروعك، رمز الريال محفوظ كـ **SVG Icon** في قاعدة البيانات. بدون التعديلات التالية، سيظهر الرمز كـ HTML text بدلاً من أيقونة.

**مثال المشكلة:**
```html
<!-- بدون التعديل - يظهر هكذا: -->
<img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTFweCIg...

<!-- بعد التعديل - يظهر هكذا: -->
[أيقونة الريال]
```

---

## الملف الأول: إعدادات العملات

### المسار:
```
resources/views/livewire/settings/superadmin-currency-settings.blade.php
```

### التعديل #1 - السطر 64 تقريباً

**ابحث عن:**
```php
<td class="py-2.5 px-4 text-base text-gray-900 whitespace-nowrap dark:text-white">
    {{ $item->currency_code }} ({{ $item->currency_symbol }})
</td>
```

**استبدله بـ:**
```php
<td class="py-2.5 px-4 text-base text-gray-900 whitespace-nowrap dark:text-white">
    {{ $item->currency_code }} ({!! $item->currency_symbol !!})
</td>
```

**الشرح:**
- غيرنا `{{ $item->currency_symbol }}` إلى `{!! $item->currency_symbol !!}`
- هذا يسمح بعرض HTML/SVG في رمز العملة

---

### التعديل #2 - السطر 68 تقريباً

**ابحث عن:**
```php
<td class="py-2.5 px-4 text-base text-gray-900 whitespace-nowrap dark:text-white">
    {{ global_currency_format(12345.6789, $item->id) }}
</td>
```

**استبدله بـ:**
```php
<td class="py-2.5 px-4 text-base text-gray-900 whitespace-nowrap dark:text-white">
    {!! global_currency_format(12345.6789, $item->id) !!}
</td>
```

**الشرح:**
- غيرنا `{{ }}` إلى `{!! !!}` لعرض التنسيق الكامل مع الرمز

---

## الملف الثاني: صفحة الفواتير (قائمة)

### المسار:
```
resources/views/livewire/billing/invoice-list.blade.php
```

### التعديل #3 - السطر 37 تقريباً (Total Revenue)

**ابحث عن:**
```php
<div class="ml-4">
    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">@lang('modules.dashboard.totalRevenue')</p>
    <p class="text-2xl font-semibold text-gray-900 dark:text-white">
        {{ global_currency_format($earningsStats['total_amount'], global_setting()->default_currency_id) }}
    </p>
</div>
```

**استبدله بـ:**
```php
<div class="ml-4">
    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">@lang('modules.dashboard.totalRevenue')</p>
    <p class="text-2xl font-semibold text-gray-900 dark:text-white">
        {!! global_currency_format($earningsStats['total_amount'], global_setting()->default_currency_id) !!}
    </p>
</div>
```

---

### التعديل #4 - السطر 54 تقريباً (Sales This Month)

**ابحث عن:**
```php
<div class="ml-4">
    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">@lang('modules.dashboard.salesThisMonth')</p>
    <p class="text-2xl font-semibold text-gray-900 dark:text-white">
        {{ global_currency_format($earningsStats['current_month_earnings'], global_setting()->default_currency_id) }}
    </p>
```

**استبدله بـ:**
```php
<div class="ml-4">
    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">@lang('modules.dashboard.salesThisMonth')</p>
    <p class="text-2xl font-semibold text-gray-900 dark:text-white">
        {!! global_currency_format($earningsStats['current_month_earnings'], global_setting()->default_currency_id) !!}
    </p>
```

---

## الملف الثالث: صفحة الفواتير (جدول)

### المسار:
```
resources/views/livewire/billing/invoice-table.blade.php
```

### التعديل #5 - السطر 137 تقريباً (Amount Column)

**ابحث عن:**
```php
<td class="py-2.5 px-4 text-sm text-gray-900 whitespace-nowrap dark:text-white">
    {{ $invoice->total ? global_currency_format($invoice->total, global_setting()->default_currency_id) : '-' }}
</td>
```

**استبدله بـ:**
```php
<td class="py-2.5 px-4 text-sm text-gray-900 whitespace-nowrap dark:text-white">
    {!! $invoice->total ? global_currency_format($invoice->total, global_setting()->default_currency_id) : '-' !!}
</td>
```

---

## خطوات التطبيق على السيرفر

### 1. الاتصال بالسيرفر
```bash
ssh user@your-server.com
cd /path/to/your/project
```

### 2. عمل نسخة احتياطية
```bash
# نسخ الملفات الأصلية
cp resources/views/livewire/settings/superadmin-currency-settings.blade.php resources/views/livewire/settings/superadmin-currency-settings.blade.php.backup
cp resources/views/livewire/billing/invoice-list.blade.php resources/views/livewire/billing/invoice-list.blade.php.backup
cp resources/views/livewire/billing/invoice-table.blade.php resources/views/livewire/billing/invoice-table.blade.php.backup
```

### 3. تعديل الملفات

#### الطريقة الأولى: باستخدام nano
```bash
# تعديل الملف الأول
nano resources/views/livewire/settings/superadmin-currency-settings.blade.php
# اضغط Ctrl+W للبحث عن النص
# عدل السطور المطلوبة
# اضغط Ctrl+X ثم Y ثم Enter للحفظ

# كرر نفس الخطوات للملفات الأخرى
nano resources/views/livewire/billing/invoice-list.blade.php
nano resources/views/livewire/billing/invoice-table.blade.php
```

#### الطريقة الثانية: باستخدام vi
```bash
vi resources/views/livewire/settings/superadmin-currency-settings.blade.php
# اضغط / للبحث
# اكتب النص المطلوب
# اضغط i للتعديل
# عدل السطور
# اضغط Esc ثم :wq للحفظ
```

#### الطريقة الثالثة: باستخدام sed (أوتوماتيكي)
```bash
# الملف الأول
sed -i 's/{{ \$item->currency_symbol }}/{!! $item->currency_symbol !!}/g' resources/views/livewire/settings/superadmin-currency-settings.blade.php
sed -i 's/{{ global_currency_format(12345.6789, \$item->id) }}/{!! global_currency_format(12345.6789, $item->id) !!}/g' resources/views/livewire/settings/superadmin-currency-settings.blade.php

# الملف الثاني
sed -i "s/{{ global_currency_format(\$earningsStats\['total_amount'\], global_setting()->default_currency_id) }}/{!! global_currency_format(\$earningsStats['total_amount'], global_setting()->default_currency_id) !!}/g" resources/views/livewire/billing/invoice-list.blade.php
sed -i "s/{{ global_currency_format(\$earningsStats\['current_month_earnings'\], global_setting()->default_currency_id) }}/{!! global_currency_format(\$earningsStats['current_month_earnings'], global_setting()->default_currency_id) !!}/g" resources/views/livewire/billing/invoice-list.blade.php

# الملف الثالث
sed -i "s/{{ \$invoice->total ? global_currency_format(\$invoice->total, global_setting()->default_currency_id) : '-' }}/{!! \$invoice->total ? global_currency_format(\$invoice->total, global_setting()->default_currency_id) : '-' !!}/g" resources/views/livewire/billing/invoice-table.blade.php
```

### 4. مسح الـ Cache
```bash
php artisan view:clear
php artisan cache:clear
php artisan config:clear
```

### 5. التحقق من التعديلات
```bash
# عرض الملف للتأكد من التعديل
cat resources/views/livewire/settings/superadmin-currency-settings.blade.php | grep "currency_symbol"
```

---

# الجزء الثالث: التحقق من نجاح العملية

## 1. التحقق من إضافة العملة

### من الواجهة:
1. اذهب إلى **Settings > Currency Settings**
2. تأكد من وجود **Saudi Riyal** في القائمة
3. تحقق من ظهور الرمز `﷼` بشكل صحيح

### من قاعدة البيانات:
```sql
SELECT id, currency_name, currency_symbol, currency_code 
FROM global_currencies 
WHERE currency_code = 'SAR';
```

**النتيجة المتوقعة:**
```
id | currency_name | currency_symbol | currency_code
---|---------------|-----------------|---------------
5  | Saudi Riyal   | ﷼              | SAR
```

---

## 2. التحقق من عرض الرمز في Currency Settings

1. اذهب إلى: `/superadmin/settings?tab=currency`
2. تحقق من:
   - ✅ عمود "Currency Symbol" يظهر: `SAR (﷼)`
   - ✅ عمود "Currency Format" يظهر: `﷼12,345.68`

**إذا ظهر الرمز بشكل صحيح:** ✅ التعديل نجح!  
**إذا ظهر كـ HTML/SVG text:** ❌ راجع التعديلات

---

## 3. التحقق من عرض الرمز في Billing

1. اذهب إلى: `/invoices`
2. تحقق من:
   - ✅ "Total Revenue" يظهر برمز الريال
   - ✅ "Sales This Month" يظهر برمز الريال
   - ✅ عمود "Amount" في الجدول يظهر برمز الريال

---

## 4. اختبار شامل

### أ) إنشاء فاتورة تجريبية:
1. أضف مطعم جديد
2. اختر عملة الريال السعودي
3. أنشئ اشتراك
4. تحقق من ظهور الرمز في الفاتورة

### ب) التحقق من التنسيق:
```
المتوقع: ﷼1,234.56
غير صحيح: 1,234.56﷼ (إذا كان Position خاطئ)
غير صحيح: <img src="..."> (إذا لم يتم التعديل)
```

---

# الجزء الرابع: استكشاف الأخطاء

## المشكلة 1: الرمز لا يظهر (مربع فارغ □)

### السبب:
الخط المستخدم لا يدعم رمز الريال

### الحل:
**الخيار 1:** استخدم بديل نصي
```
Currency Symbol: SAR
```
أو
```
Currency Symbol: ر.س
```

**الخيار 2:** غير الخط في CSS
```css
body {
    font-family: 'Arial', 'Tahoma', sans-serif;
}
```

---

## المشكلة 2: الرمز يظهر كـ HTML/SVG text

### مثال:
```html
<img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTFweCIgaGVpZ2h0PSIxMXB4Ig..." style="width:11px;height:11px;vertical-align:middle;" alt="﷼">
```

### السبب:
**هذه هي المشكلة الأساسية في مشروعك!**

رمز الريال محفوظ كـ SVG في قاعدة البيانات، لكن الملفات كانت تستخدم `{{ }}` بدلاً من `{!! !!}`.

### الحل:
1. تأكد من تعديل الملفات الثلاثة بشكل صحيح
2. تأكد من استخدام `{!! !!}` وليس `{{ }}`
3. امسح الـ cache:
```bash
php artisan view:clear
php artisan cache:clear
```

### التحقق:
بعد التعديل، يجب أن يظهر الرمز كأيقونة صغيرة بدلاً من كود HTML.

---

## المشكلة 3: الرمز في مكان خاطئ

### مثال:
```
1,234.56﷼  (بدلاً من ﷼1,234.56)
```

### السبب:
إعداد Currency Position خاطئ

### الحل:
1. اذهب إلى Currency Settings
2. اضغط Edit على عملة الريال
3. غير Currency Position إلى **Left**
4. احفظ

---

## المشكلة 4: الرمز لا يحفظ في قاعدة البيانات

### السبب:
مشكلة في encoding قاعدة البيانات

### الحل:
```sql
-- تحقق من encoding الحالي
SHOW CREATE TABLE global_currencies;

-- غير encoding إلى utf8mb4
ALTER TABLE global_currencies 
CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- أعد إدخال العملة
```

---

## المشكلة 5: التعديلات لا تظهر

### السبب:
الـ cache لم يتم مسحه

### الحل:
```bash
# امسح كل أنواع الـ cache
php artisan cache:clear
php artisan view:clear
php artisan config:clear
php artisan route:clear

# أعد تشغيل السيرفر (إذا لزم الأمر)
php artisan serve
```

---

## المشكلة 6: خطأ في الصفحة بعد التعديل

### مثال:
```
syntax error, unexpected '}', expecting end of file
```

### السبب:
خطأ في التعديل (نسيان إغلاق `!!}` أو حذف `}` بالخطأ)

### الحل:
1. راجع الملف المعدل
2. تأكد من أن كل `{!!` له `!!}` مقابل
3. استخدم النسخة الاحتياطية إذا لزم الأمر:
```bash
cp resources/views/livewire/settings/superadmin-currency-settings.blade.php.backup resources/views/livewire/settings/superadmin-currency-settings.blade.php
```

---

# ملخص سريع

## ✅ قائمة التحقق النهائية

- [ ] تم إضافة عملة الريال السعودي من Currency Settings
- [ ] تم إدخال الرمز `﷼` في حقل Currency Symbol
- [ ] تم تعديل ملف `superadmin-currency-settings.blade.php` (تعديلين)
- [ ] تم تعديل ملف `invoice-list.blade.php` (تعديلين)
- [ ] تم تعديل ملف `invoice-table.blade.php` (تعديل واحد)
- [ ] تم مسح الـ cache
- [ ] الرمز يظهر بشكل صحيح في Currency Settings
- [ ] الرمز يظهر بشكل صحيح في Billing
- [ ] التنسيق صحيح (﷼1,234.56)

---

## 📊 جدول التعديلات

| الملف | عدد التعديلات | الأسطر |
|-------|---------------|--------|
| `superadmin-currency-settings.blade.php` | 2 | 64, 68 |
| `invoice-list.blade.php` | 2 | 37, 54 |
| `invoice-table.blade.php` | 1 | 137 |
| **المجموع** | **5 تعديلات** | **5 أسطر** |

---

## 🎯 النتيجة النهائية

بعد اتباع كل الخطوات، ستحصل على:

✅ عملة الريال السعودي مضافة في النظام  
✅ الرمز `﷼` يظهر بشكل صحيح في كل الصفحات  
✅ التنسيق صحيح: `﷼12,345.68`  
✅ يعمل في صفحات Super Admin والمطاعم  

---

**تاريخ الإنشاء:** مارس 2026  
**الإصدار:** 1.0 - دليل شامل  
**الحالة:** جاهز للتطبيق ✅
