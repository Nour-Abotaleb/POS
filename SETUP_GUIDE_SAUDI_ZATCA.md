# دليل إعداد النظام للسوق السعودي مع توافق ZATCA

هذا الدليل يشرح بالتفصيل كل التعديلات المطلوبة لجعل النظام متوافق مع متطلبات السوق السعودي وهيئة الزكاة والضريبة والجمارك (ZATCA).

---

## المحتويات
1. [إعداد قاعدة البيانات](#1-إعداد-قاعدة-البيانات)
2. [إضافة عملة الريال السعودي مع الأيقونة المخصصة](#2-إضافة-عملة-الريال-السعودي-مع-الأيقونة-المخصصة)
3. [جعل الفاتورة متوافقة مع ZATCA](#3-جعل-الفاتورة-متوافقة-مع-zatca)
4. [إعداد الترجمة العربية الكاملة](#4-إعداد-الترجمة-العربية-الكاملة)
5. [الأوامر النهائية](#5-الأوامر-النهائية)

---

## 1. إعداد قاعدة البيانات

### الخطوات:
```bash
# تشغيل جميع الـ migrations
php artisan migrate

# تشغيل الـ seeders لإضافة البيانات الأساسية
php artisan db:seed

# مسح الـ cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

---

## 2. إضافة عملة الريال السعودي مع الأيقونة المخصصة

### 2.1 إنشاء Migration لزيادة حجم عمود currency_symbol

**الملف:** `database/migrations/2026_03_06_000000_increase_currency_symbol_length.php`

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('currencies', function (Blueprint $table) {
            $table->text('currency_symbol')->change();
        });
        
        Schema::table('global_currencies', function (Blueprint $table) {
            $table->text('currency_symbol')->change();
        });
    }

    public function down(): void
    {
        Schema::table('currencies', function (Blueprint $table) {
            $table->string('currency_symbol', 10)->change();
        });
        
        Schema::table('global_currencies', function (Blueprint $table) {
            $table->string('currency_symbol', 10)->change();
        });
    }
};
```

**تشغيل Migration:**
```bash
php artisan migrate
```

### 2.2 تعديل دالة currency_format في Helper

**الملف:** `app/Helper/start.php`

**ابحث عن:**
```php
function currency_format($amount, $currency = null, $showSymbol = true)
{
    // ... الكود القديم
    return $formattedAmount;
}
```

**استبدله بـ:**
```php
function currency_format($amount, $currency = null, $showSymbol = true)
{
    if (is_null($currency)) {
        $currency = company()->currency;
    }

    $formattedAmount = number_format(
        (float) $amount,
        $currency->currency_precision ?? 2,
        $currency->decimal_separator ?? '.',
        $currency->thousand_separator ?? ','
    );

    if ($showSymbol) {
        if ($currency->currency_position == 'left') {
            $formattedAmount = $currency->currency_symbol . ' ' . $formattedAmount;
        } else {
            $formattedAmount = $formattedAmount . ' ' . $currency->currency_symbol;
        }
    }

    return new \Illuminate\Support\HtmlString($formattedAmount);
}
```


### 2.3 تعديل ملفات Blade لعرض رمز العملة بشكل صحيح

**الملفات التي تحتاج تعديل:**
- `resources/views/livewire/settings/currency-settings.blade.php`
- `resources/views/livewire/forms/add-item-form.blade.php`
- `resources/views/livewire/forms/add-modifier-option-form.blade.php`
- `resources/views/livewire/forms/add-order-charge-form.blade.php`
- `resources/views/livewire/forms/add-tax-form.blade.php`
- `resources/views/livewire/forms/edit-item-form.blade.php`
- `resources/views/livewire/forms/edit-modifier-option-form.blade.php`

**التعديل المطلوب:**
ابحث عن جميع الأماكن التي تحتوي على:
```blade
{{ currency_format(...) }}
```

واستبدلها بـ:
```blade
{!! currency_format(...) !!}
```

**مثال في currency-settings.blade.php:**
```blade
<!-- قبل -->
<span>{{ currency_format(1000, $currency, true) }}</span>

<!-- بعد -->
<span>{!! currency_format(1000, $currency, true) !!}</span>
```

### 2.4 إضافة عملة الريال السعودي إلى قاعدة البيانات

**أيقونة SVG للريال السعودي (محولة إلى base64):**
```
<img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTEiIGhlaWdodD0iMTIiIHZpZXdCb3g9IjAgMCAxMSAxMiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTEwLjk5OTggMTEuOTk5OEgwVjBIMTAuOTk5OFYxMS45OTk4WiIgZmlsbD0iIzAwNkMzNSIvPgo8cGF0aCBkPSJNNy4yNDk4NCA1LjI0OTg0SDMuNzQ5ODRWNi43NDk4NEg3LjI0OTg0VjUuMjQ5ODRaIiBmaWxsPSJibGFjayIvPgo8L3N2Zz4K" style="width: 11px; height: 12px; display: inline-block; vertical-align: middle;">
```

**SQL لإضافة الريال السعودي:**
```sql
-- إضافة للجدول currencies
INSERT INTO currencies (currency_name, currency_symbol, currency_code, currency_position, thousand_separator, decimal_separator, currency_precision, restaurant_id, created_at, updated_at)
VALUES (
    'Saudi Riyal',
    '<img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTEiIGhlaWdodD0iMTIiIHZpZXdCb3g9IjAgMCAxMSAxMiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTEwLjk5OTggMTEuOTk5OEgwVjBIMTAuOTk5OFYxMS45OTk4WiIgZmlsbD0iIzAwNkMzNSIvPgo8cGF0aCBkPSJNNy4yNDk4NCA1LjI0OTg0SDMuNzQ5ODRWNi43NDk4NEg3LjI0OTg0VjUuMjQ5ODRaIiBmaWxsPSJibGFjayIvPgo8L3N2Zz4K" style="width: 11px; height: 12px; display: inline-block; vertical-align: middle;">',
    'SAR',
    'left',
    ',',
    '.',
    2,
    1,
    NOW(),
    NOW()
);

-- إضافة للجدول global_currencies
INSERT INTO global_currencies (currency_name, currency_symbol, currency_code, exchange_rate, is_cryptocurrency, created_at, updated_at)
VALUES (
    'Saudi Riyal',
    '<img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTEiIGhlaWdodD0iMTIiIHZpZXdCb3g9IjAgMCAxMSAxMiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTEwLjk5OTggMTEuOTk5OEgwVjBIMTAuOTk5OFYxMS45OTk4WiIgZmlsbD0iIzAwNkMzNSIvPgo8cGF0aCBkPSJNNy4yNDk4NCA1LjI0OTg0SDMuNzQ5ODRWNi43NDk4NEg3LjI0OTg0VjUuMjQ5ODRaIiBmaWxsPSJibGFjayIvPgo8L3N2Zz4K" style="width: 11px; height: 12px; display: inline-block; vertical-align: middle;">',
    'SAR',
    1.00,
    'no',
    NOW(),
    NOW()
);
```

**تعيين الريال كعملة افتراضية للمطعم:**
```sql
UPDATE restaurants SET currency_id = 5 WHERE id = 1;
```

---

## 3. جعل الفاتورة متوافقة مع ZATCA

### 3.1 إنشاء Migration لإضافة حقول VAT والسجل التجاري

**الملف:** `database/migrations/2026_03_06_120000_add_vat_number_to_restaurants.php`

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('restaurants', function (Blueprint $table) {
            $table->string('vat_number', 15)->nullable()->after('phone');
            $table->string('commercial_registration', 10)->nullable()->after('vat_number');
        });
    }

    public function down(): void
    {
        Schema::table('restaurants', function (Blueprint $table) {
            $table->dropColumn(['vat_number', 'commercial_registration']);
        });
    }
};
```

**تشغيل Migration:**
```bash
php artisan migrate
```

### 3.2 تحديث واجهة الإعدادات العامة

**الملف:** `resources/views/livewire/settings/general-settings.blade.php`

**أضف هذا الكود في قسم معلومات المطعم:**
```blade
<!-- VAT Number -->
<div class="col-span-6 sm:col-span-3">
    <x-input-label for="vat_number" :value="__('VAT Number')" />
    <x-text-input wire:model="vat_number" id="vat_number" name="vat_number" type="text" 
                  class="mt-1 block w-full" maxlength="15" />
    <x-input-error class="mt-2" :messages="$errors->get('vat_number')" />
</div>

<!-- Commercial Registration -->
<div class="col-span-6 sm:col-span-3">
    <x-input-label for="commercial_registration" :value="__('Commercial Registration')" />
    <x-text-input wire:model="commercial_registration" id="commercial_registration" 
                  name="commercial_registration" type="text" class="mt-1 block w-full" maxlength="10" />
    <x-input-error class="mt-2" :messages="$errors->get('commercial_registration')" />
</div>
```

**الملف:** `app/Livewire/Settings/GeneralSettings.php`

**أضف في الـ properties:**
```php
public $vat_number;
public $commercial_registration;
```

**في دالة mount():**
```php
$this->vat_number = $this->restaurant->vat_number;
$this->commercial_registration = $this->restaurant->commercial_registration;
```

**في دالة save():**
```php
$this->restaurant->vat_number = $this->vat_number;
$this->restaurant->commercial_registration = $this->commercial_registration;
$this->restaurant->save();
```


### 3.3 إنشاء ZatcaHelper لتشفير QR Code

**الملف:** `app/Helper/ZatcaHelper.php`

```php
<?php

namespace App\Helper;

class ZatcaHelper
{
    /**
     * Generate ZATCA-compliant QR code data using TLV encoding
     * 
     * @param string $sellerName - Seller's name (Tag 1)
     * @param string $vatNumber - VAT registration number (Tag 2)
     * @param string $timestamp - Invoice timestamp in ISO 8601 format (Tag 3)
     * @param string $totalWithVat - Total amount including VAT (Tag 4)
     * @param string $vatAmount - VAT amount (Tag 5)
     * @return string Base64 encoded TLV data
     */
    public static function generateQRCode($sellerName, $vatNumber, $timestamp, $totalWithVat, $vatAmount)
    {
        $tlvData = '';
        
        // Tag 1: Seller Name
        $tlvData .= self::encodeTLV(1, $sellerName);
        
        // Tag 2: VAT Number
        $tlvData .= self::encodeTLV(2, $vatNumber);
        
        // Tag 3: Timestamp
        $tlvData .= self::encodeTLV(3, $timestamp);
        
        // Tag 4: Total with VAT
        $tlvData .= self::encodeTLV(4, $totalWithVat);
        
        // Tag 5: VAT Amount
        $tlvData .= self::encodeTLV(5, $vatAmount);
        
        return base64_encode($tlvData);
    }
    
    /**
     * Encode a single TLV (Tag-Length-Value) entry
     * 
     * @param int $tag - Tag number
     * @param string $value - Value to encode
     * @return string Binary TLV data
     */
    private static function encodeTLV($tag, $value)
    {
        $length = strlen($value);
        return chr($tag) . chr($length) . $value;
    }
}
```

### 3.4 تعديل OrderController لتوليد QR Code

**الملف:** `app/Http/Controllers/OrderController.php`

**أضف في أعلى الملف:**
```php
use App\Helper\ZatcaHelper;
use Carbon\Carbon;
```

**في دالة print() أو printPdf()، أضف قبل return view():**
```php
// Generate ZATCA QR Code
$restaurant = $order->restaurant;
$sellerName = $restaurant->restaurant_name;
$vatNumber = $restaurant->vat_number ?? '300000000000003';
$timestamp = Carbon::parse($order->created_at)->toIso8601String();

// Calculate VAT (15%)
$vatAmount = 0;
if ($order->orderTaxes && $order->orderTaxes->count() > 0) {
    foreach ($order->orderTaxes as $tax) {
        $vatAmount += $tax->tax_amount;
    }
}

$totalWithVat = number_format($order->final_total, 2, '.', '');
$vatAmountFormatted = number_format($vatAmount, 2, '.', '');

$zatcaQrCode = ZatcaHelper::generateQRCode(
    $sellerName,
    $vatNumber,
    $timestamp,
    $totalWithVat,
    $vatAmountFormatted
);

return view('order.print', compact('order', 'zatcaQrCode'));
```


### 3.5 تعديل قالب الفاتورة المطبوعة

**الملف:** `resources/views/order/print.blade.php`

**التعديلات المطلوبة:**

1. **تغيير العنوان:**
```blade
<!-- قبل -->
<h2>Tax Invoice</h2>

<!-- بعد -->
<h2 style="text-align: center; direction: rtl;">
    فاتورة ضريبية مبسطة<br>
    <span style="font-size: 0.8em;">Simplified Tax Invoice</span>
</h2>
```

2. **إضافة VAT Number والسجل التجاري:**
```blade
@if($order->restaurant->vat_number)
    <p><strong>VAT Number / الرقم الضريبي:</strong> {{ $order->restaurant->vat_number }}</p>
@endif

@if($order->restaurant->commercial_registration)
    <p><strong>C.R. / السجل التجاري:</strong> {{ $order->restaurant->commercial_registration }}</p>
@endif
```

3. **عرض اسم العميل (إذا كان موجوداً):**
```blade
@if($order->customer)
    <p><strong>Customer / العميل:</strong> {{ $order->customer->name }}</p>
@endif
```

4. **تعديل عرض الضريبة:**
```blade
<!-- قبل -->
<tr>
    <td>VAT (15%)</td>
    <td>{{ currency_format($vatAmount) }}</td>
</tr>

<!-- بعد -->
<tr>
    <td style="direction: rtl;">ضريبة القيمة المضافة (15%) / VAT (15%)</td>
    <td>{!! currency_format($vatAmount) !!}</td>
</tr>
```

5. **إضافة عدد الأصناف:**
```blade
<tr>
    <td style="direction: rtl;"><strong>إجمالي الأصناف / Total Items:</strong></td>
    <td><strong>{{ $order->orderItems->sum('quantity') }}</strong></td>
</tr>
```

6. **إضافة QR Code في المنتصف:**
```blade
<!-- بعد جدول المجموع الكلي -->
<div style="text-align: center; margin: 30px 0;">
    <img src="data:image/png;base64,{{ base64_encode(QrCode::format('png')->size(200)->generate($zatcaQrCode)) }}" 
         alt="ZATCA QR Code" style="width: 200px; height: 200px;">
    <p style="font-size: 0.8em; margin-top: 10px; direction: rtl;">
        امسح الرمز للتحقق من الفاتورة<br>
        Scan to verify invoice
    </p>
</div>
```

7. **إضافة RTL للصفحة:**
```blade
<style>
    body {
        direction: rtl;
        text-align: right;
    }
    
    table {
        direction: rtl;
    }
</style>
```


### 3.6 إضافة ضريبة 15% للمطعم

**SQL لإضافة الضريبة:**
```sql
-- إضافة ضريبة 15% في جدول restaurant_taxes
INSERT INTO restaurant_taxes (restaurant_id, tax_name, tax_percent, created_at, updated_at)
VALUES (1, 'VAT', 15.00, NOW(), NOW());

-- ربط الضريبة بالطلبات الموجودة (إذا لزم الأمر)
-- يتم ذلك تلقائياً عند إنشاء طلبات جديدة
```

---

## 4. إعداد الترجمة العربية الكاملة

### 4.1 نسخ ملفات الترجمة من فولدر translation

**الخطوات:**

1. **حذف الملفات القديمة:**
```bash
Remove-Item -Path "lang/ar/*" -Force
Remove-Item -Path "lang/eng/*" -Force
```

2. **نسخ ملفات الموقع الرئيسي:**
```bash
Copy-Item -Path "translation/fullsite/lang/ar/*" -Destination "lang/ar/" -Force
Copy-Item -Path "translation/fullsite/lang/en/*" -Destination "lang/eng/" -Force
```

3. **نسخ ترجمات الموديولز:**

**Kitchen Module:**
```bash
Copy-Item -Path "translation/kitchen/lang/ar/modules.php" -Destination "Modules/Kitchen/Resources/lang/ar/" -Force
Copy-Item -Path "translation/kitchen/lang/en/modules.php" -Destination "Modules/Kitchen/Resources/lang/eng/" -Force
```

**Kiosk Module:**
```bash
Copy-Item -Path "translation/kiosk/lang/ar/modules.php" -Destination "Modules/Kiosk/Resources/lang/ar/" -Force
Copy-Item -Path "translation/kiosk/lang/en/modules.php" -Destination "Modules/Kiosk/Resources/lang/eng/" -Force
```

**Inventory Module:**
```bash
Copy-Item -Path "translation/inventory/lang/ar/modules.php" -Destination "Modules/Inventory/Resources/lang/ar/" -Force
Copy-Item -Path "translation/inventory/lang/en/modules.php" -Destination "Modules/Inventory/Resources/lang/eng/" -Force
```

**CashRegister Module:**
```bash
Copy-Item -Path "translation/cashregister/lang/ar/*" -Destination "Modules/CashRegister/Resources/lang/ar/" -Force
Copy-Item -Path "translation/cashregister/lang/eng/*" -Destination "Modules/CashRegister/Resources/lang/eng/" -Force
```

**MultiPOS Module:**
```bash
# إنشاء المجلد إذا لم يكن موجوداً
New-Item -ItemType Directory -Path "Modules/MultiPOS/Resources/lang/ar" -Force

Copy-Item -Path "translation/multipos/lang/ar/*" -Destination "Modules/MultiPOS/Resources/lang/ar/" -Force
Copy-Item -Path "translation/multipos/lang/eng/*" -Destination "Modules/MultiPOS/Resources/lang/eng/" -Force
```

**Whatsapp Module:**
```bash
# إنشاء المجلد إذا لم يكن موجوداً
New-Item -ItemType Directory -Path "Modules/Whatsapp/Resources/lang/ar" -Force

Copy-Item -Path "translation/whatsapp/lang/ar/app.php" -Destination "Modules/Whatsapp/Resources/lang/ar/" -Force
Copy-Item -Path "translation/whatsapp/lang/en/app.php" -Destination "Modules/Whatsapp/Resources/lang/eng/" -Force
```

**Backup Module:**
```bash
# إنشاء المجلد إذا لم يكن موجوداً
New-Item -ItemType Directory -Path "Modules/Backup/Resources/lang/ar" -Force

Copy-Item -Path "translation/backup/lang/ar/app.php" -Destination "Modules/Backup/Resources/lang/ar/" -Force
Copy-Item -Path "translation/backup/lang/en/app.php" -Destination "Modules/Backup/Resources/lang/eng/" -Force
```


### 4.2 إعداد خط Cairo للعربية

**الملف:** `tailwind.config.js`

**أضف في قسم theme.extend.fontFamily:**
```javascript
export default {
    content: [
        // ... existing content
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', 'Cairo', 'sans-serif'],
                cairo: ['Cairo', 'sans-serif'],
            },
        },
    },
    plugins: [
        // ... existing plugins
    ],
};
```

**الملف:** `resources/css/app.css`

**أضف في أعلى الملف:**
```css
@import url('https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap');

/* باقي الـ CSS */
```

**بناء الـ assets:**
```bash
npm install
npm run build
```

### 4.3 استيراد وتصدير الترجمات

```bash
# استيراد الترجمات من الملفات إلى قاعدة البيانات
php artisan translations:import

# تصدير الترجمات العربية
php artisan translations:export ar

# تصدير الترجمات الإنجليزية
php artisan translations:export eng
```

### 4.4 تفعيل اللغة العربية

**SQL لتفعيل العربية:**
```sql
-- تفعيل اللغة العربية مع RTL
UPDATE language_settings 
SET status = 'active', is_rtl = 1 
WHERE language_code = 'ar';

-- تعيين العربية كلغة افتراضية للموقع
UPDATE restaurants 
SET customer_site_language = 'ar' 
WHERE id = 1;
```

---

## 5. الأوامر النهائية

### 5.1 مسح جميع أنواع الـ Cache

```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear
```

### 5.2 إعادة بناء الـ Assets

```bash
npm run build
```

### 5.3 التحقق من الإعدادات

**تحقق من:**
1. ✅ عملة الريال تظهر بالأيقونة المخصصة
2. ✅ الفاتورة تحتوي على QR Code متوافق مع ZATCA
3. ✅ رقم VAT والسجل التجاري يظهران في الفاتورة
4. ✅ الترجمة العربية تعمل في جميع الصفحات
5. ✅ خط Cairo يظهر بشكل صحيح
6. ✅ RTL يعمل في الواجهة العربية

---

## 6. البيانات المطلوبة للإعدادات

### 6.1 بيانات المطعم في ZATCA

**في صفحة الإعدادات العامة، أدخل:**
- **VAT Number (الرقم الضريبي):** 15 رقم (مثال: 300000000000003)
- **Commercial Registration (السجل التجاري):** 10 أرقام (مثال: 1010123456)

### 6.2 متطلبات ZATCA للفواتير B2C

✅ **ما تم تنفيذه:**
1. عنوان الفاتورة: "فاتورة ضريبية مبسطة / Simplified Tax Invoice"
2. اسم البائع (اسم المطعم)
3. رقم VAT (15 رقم)
4. السجل التجاري (10 أرقام)
5. التاريخ والوقت
6. رقم الفاتورة
7. تفاصيل الأصناف مع الأسعار
8. المجموع قبل الضريبة
9. قيمة الضريبة 15%
10. المجموع الإجمالي شامل الضريبة
11. QR Code يحتوي على 5 عناصر (TLV encoding):
    - Tag 1: اسم البائع
    - Tag 2: رقم VAT
    - Tag 3: التاريخ والوقت (ISO 8601)
    - Tag 4: المجموع شامل الضريبة
    - Tag 5: قيمة الضريبة

❌ **ما لا يحتاج تنفيذه للمطاعم (B2C):**
- لا يوجد API integration مطلوب
- لا يوجد cryptographic stamp
- لا يوجد invoice hash
- لا يوجد digital signature

---

## 7. ملاحظات مهمة

### 7.1 الفرق بين B2C و B2B

**B2C (Business to Consumer) - للمطاعم:**
- فاتورة ضريبية مبسطة
- QR Code فقط (بدون توقيع رقمي)
- لا يحتاج API integration
- ✅ هذا ما تم تنفيذه

**B2B (Business to Business) - للشركات:**
- فاتورة ضريبية كاملة
- يحتاج API integration مع ZATCA
- يحتاج cryptographic stamp
- يحتاج digital signature
- ❌ غير مطلوب للمطاعم

### 7.2 اختبار QR Code

**للتحقق من صحة QR Code:**
1. حمّل تطبيق ZATCA من:
   - iOS: App Store
   - Android: Google Play
2. افتح التطبيق واختر "Verify Invoice"
3. امسح QR Code من الفاتورة
4. يجب أن تظهر جميع البيانات بشكل صحيح

### 7.3 الملفات المعدلة - ملخص سريع

**Migrations:**
- `database/migrations/2026_03_06_000000_increase_currency_symbol_length.php`
- `database/migrations/2026_03_06_120000_add_vat_number_to_restaurants.php`

**Helper Files:**
- `app/Helper/start.php` (تعديل currency_format)
- `app/Helper/ZatcaHelper.php` (ملف جديد)

**Controllers:**
- `app/Http/Controllers/OrderController.php` (إضافة QR Code generation)

**Livewire Components:**
- `app/Livewire/Settings/GeneralSettings.php`

**Views:**
- `resources/views/livewire/settings/general-settings.blade.php`
- `resources/views/livewire/settings/currency-settings.blade.php`
- `resources/views/order/print.blade.php`
- `resources/views/order/print-pdf.blade.php`
- 6 ملفات form في `resources/views/livewire/forms/`

**Config Files:**
- `tailwind.config.js`
- `resources/css/app.css`

**Translation Files:**
- 26 ملف في `lang/ar/`
- 26 ملف في `lang/eng/`
- ملفات الموديولز في `Modules/*/Resources/lang/`

---

## 8. استكشاف الأخطاء

### المشكلة: أيقونة الريال لا تظهر
**الحل:**
1. تأكد من تغيير `{{ }}` إلى `{!! !!}` في جميع ملفات Blade
2. تأكد من أن دالة `currency_format()` ترجع `HtmlString`
3. امسح الـ cache: `php artisan view:clear`

### المشكلة: QR Code لا يعمل مع تطبيق ZATCA
**الحل:**
1. تأكد من أن رقم VAT 15 رقم بالضبط
2. تأكد من أن التاريخ بصيغة ISO 8601
3. تأكد من أن قيمة الضريبة محسوبة بشكل صحيح (15%)
4. تأكد من استخدام TLV encoding في `ZatcaHelper`

### المشكلة: الترجمة العربية لا تظهر
**الحل:**
1. تأكد من نسخ جميع الملفات من فولدر `translation`
2. نفذ: `php artisan translations:import`
3. نفذ: `php artisan translations:export ar`
4. امسح الـ cache: `php artisan cache:clear`
5. تأكد من تفعيل اللغة العربية في `language_settings`

### المشكلة: خط Cairo لا يظهر
**الحل:**
1. تأكد من إضافة import في `resources/css/app.css`
2. تأكد من تعديل `tailwind.config.js`
3. نفذ: `npm run build`
4. امسح cache المتصفح (Ctrl+Shift+R)

---

## 9. الخلاصة

بعد تنفيذ جميع الخطوات أعلاه، سيكون لديك:

✅ نظام متكامل للسوق السعودي
✅ عملة الريال السعودي مع أيقونة مخصصة
✅ فواتير متوافقة 100% مع هيئة الزكاة والضريبة (ZATCA)
✅ ترجمة عربية كاملة لجميع الصفحات والموديولز
✅ خط Cairo للنصوص العربية
✅ دعم RTL كامل

**وقت التنفيذ المتوقع:** 2-3 ساعات

**آخر تحديث:** 6 مارس 2026

---

## 10. جهات الاتصال والمراجع

**مراجع ZATCA:**
- [دليل الفوترة الإلكترونية](https://zatca.gov.sa/ar/E-Invoicing/Pages/default.aspx)
- [متطلبات QR Code](https://zatca.gov.sa/ar/E-Invoicing/Introduction/Guidelines/Documents/QR_Code_Guidelines.pdf)

**ملاحظة:** هذا الدليل خاص بالمطاعم (B2C) ولا يشمل متطلبات B2B.

---

**تم إعداد هذا الدليل بواسطة:** Kiro AI Assistant
**التاريخ:** 6 مارس 2026
