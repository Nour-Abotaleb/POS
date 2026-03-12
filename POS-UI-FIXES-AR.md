# إصلاحات واجهة POS

## التعديلات المطلوبة:

### ✅ 1. تغيير "Point of Sale" إلى "POS"
**الملف:** `lang/eng/menu.php`
```php
// تم التعديل من:
'pos' => 'Point of Sale',
// إلى:
'pos' => 'POS',
```

### ✅ 2. ترجمة "Customer" للعربية
**الملفات المُعدّلة:**
- `lang/eng/modules.php`
- `translation/fullsite/lang/en/modules.php`

```php
// تم التعديل من:
'selectCustomer' => 'Select Customer',
// إلى:
'selectCustomer' => 'اختر عميل',
```

### 3. بخصوص عملة الريال المكررة في checkout:

**الوضع الحالي:** 
- تم فحص الكود في `resources/views/pos/order_items.blade.php` و `resources/views/pos/kot_items.blade.php`
- لا يوجد تكرار فعلي في الكود
- العملة تظهر في أماكن مختلفة (سعر الوحدة، الإجمالي، الضريبة، المجموع الكلي)

**إذا كنت تريد إخفاء بعض عروض العملة:**

#### خيار 1: إخفاء سعر الوحدة (Unit Price)
```php
// في resources/views/pos/kot_items.blade.php
// السطر حوالي 258
<div class="text-gray-500 dark:text-gray-400 text-xs">
    {{-- {!! currency_format($displayPrice, restaurant()->currency_id) !!} --}}
</div>
```

#### خيار 2: إخفاء تفاصيل الضرائب وعرض المجموع فقط
```php
// إخفاء تفاصيل كل ضريبة وعرض إجمالي الضريبة فقط
@if($restaurant->tax_mode === 'order')
    {{-- عرض إجمالي الضريبة فقط --}}
@else
    {{-- إخفاء تفاصيل كل ضريبة --}}
@endif
```

#### خيار 3: تبسيط العرض لإظهار المجموع النهائي فقط
```php
// إخفاء:
// - Sub Total
// - Discount
// - Charges  
// - Tax Details
// وعرض Total فقط
```

## التعديلات الإضافية المقترحة:

### 4. تحسين عرض العملة في POS:
```php
// يمكن تخصيص دالة currency_format لـ POS
function pos_currency_format($amount, $showSymbol = true) {
    if (!$showSymbol) {
        return number_format($amount, 2);
    }
    return currency_format($amount, restaurant()->currency_id);
}
```

### 5. إعدادات عرض العملة:
```php
// إضافة إعداد في restaurant_settings
'show_unit_price_in_pos' => true/false,
'show_tax_details_in_pos' => true/false,
'show_subtotal_in_pos' => true/false,
```

## الملفات المُعدّلة:

1. ✅ `lang/eng/menu.php` - تغيير POS
2. ✅ `lang/eng/modules.php` - ترجمة Customer  
3. ✅ `translation/fullsite/lang/en/modules.php` - ترجمة Customer

## الملفات التي قد تحتاج تعديل (حسب المطلوب):

4. `resources/views/pos/kot_items.blade.php` - تبسيط عرض العملة
5. `resources/views/pos/order_items.blade.php` - تبسيط عرض العملة

---

**ملاحظة:** العملة لا تظهر مكررة في نفس المكان، لكن تظهر في أماكن مختلفة:
- سعر الوحدة
- إجمالي الصنف  
- المجموع الفرعي
- الضريبة
- المجموع النهائي

إذا كنت تريد تبسيط العرض، حدد أي من هذه العناصر تريد إخفاءها.