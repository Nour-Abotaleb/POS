<?php

return [
    // Denomination messages
    'denominationCreated' => 'تم إنشاء الفئة بنجاح!',
    'denominationUpdated' => 'تم تحديث الفئة بنجاح!',
    'denominationDeleted' => 'تم حذف الفئة بنجاح!',
    'denominationsDeleted' => 'تم حذف :count فئة بنجاح!',
    'denominationStatusUpdated' => 'تم تحديث حالة الفئة إلى :status!',
    'errorOccurred' => 'حدث خطأ. يرجى المحاولة مرة أخرى.',

    // Dashboard
    'dashboard' => [
        'title' => 'سجل النقدية',
        'register_dashboard' => 'لوحة معلومات السجل النقدي',
        'cash_register' => 'سجل النقدية',
        'settings' => 'الإعدادات',
        'reports' => 'التقارير',
        'denominations' => 'الفئات النقدية',
        'approvals' => 'الموافقات',
    ],

    // Settings
    'settings' => [
        'title' => 'إعدادات سجل النقدية',
        'general_settings' => 'الإعدادات العامة',
        'require_approval' => 'يتطلب الموافقة على الإغلاق',
        'require_approval_help' => 'عند التفعيل، يجب الموافقة على جلسات السجل النقدي قبل الإغلاق النهائي',
        'allow_force_open' => 'السماح بالفتح القسري',
        'allow_force_open_help' => 'السماح للمستخدمين بفتح السجل النقدي بدون بيع',
        'settings_updated' => 'تم تحديث الإعدادات بنجاح',
    ],

    // Register
    'register' => [
        'open_register' => 'فتح السجل النقدي',
        'close_register' => 'إغلاق السجل النقدي',
        'register_closed' => 'السجل النقدي مغلق',
        'open_new_session' => 'فتح جلسة جديدة',
        'opening_balance' => 'الرصيد الافتتاحي',
        'closing_balance' => 'الرصيد الختامي',
        'expected_cash' => 'النقد المتوقع',
        'actual_cash' => 'النقد الفعلي',
        'difference' => 'الفرق',
        'notes' => 'ملاحظات',
        'session_opened' => 'تم فتح الجلسة النقدية بنجاح',
        'session_closed' => 'تم إغلاق الجلسة النقدية بنجاح',
        'pending_approval' => 'في انتظار الموافقة',
        'approved' => 'تمت الموافقة',
        'rejected' => 'مرفوض',
    ],

    // Approvals
    'approvals' => [
        'title' => 'موافقات السجل النقدي',
        'pending_approvals' => 'الموافقات المعلقة',
        'no_pending' => 'لا توجد موافقات معلقة',
        'approve' => 'موافقة',
        'reject' => 'رفض',
        'approved_successfully' => 'تمت الموافقة بنجاح',
        'rejected_successfully' => 'تم الرفض بنجاح',
        'session_details' => 'تفاصيل الجلسة',
        'cashier' => 'أمين الصندوق',
        'opened_at' => 'وقت الفتح',
        'closed_at' => 'وقت الإغلاق',
    ],

    // Reports
    'reports' => [
        'title' => 'تقارير السجل النقدي',
        'cash_summary' => 'ملخص النقدية',
        'session_history' => 'سجل الجلسات',
        'discrepancy_report' => 'تقرير الفروقات',
        'export' => 'تصدير',
        'filter' => 'تصفية',
        'date_range' => 'نطاق التاريخ',
        'total_sales' => 'إجمالي المبيعات',
        'cash_in' => 'النقد الوارد',
        'cash_out' => 'النقد الصادر',
        'net_cash' => 'صافي النقد',
    ],

    // Denominations
    'denominations' => [
        'title' => 'الفئات النقدية',
        'add_denomination' => 'إضافة فئة',
        'edit_denomination' => 'تعديل الفئة',
        'name' => 'الاسم',
        'value' => 'القيمة',
        'type' => 'النوع',
        'is_active' => 'نشط',
        'coin' => 'عملة معدنية',
        'note' => 'ورقة نقدية',
        'actions' => 'الإجراءات',
        'delete_confirm' => 'هل أنت متأكد من حذف هذه الفئة؟',
    ],

    // Transactions
    'transactions' => [
        'title' => 'المعاملات',
        'type' => 'النوع',
        'amount' => 'المبلغ',
        'date' => 'التاريخ',
        'reference' => 'المرجع',
        'sale' => 'بيع',
        'refund' => 'استرداد',
        'cash_in' => 'إيداع نقدي',
        'cash_out' => 'سحب نقدي',
    ],

    // Counts
    'counts' => [
        'title' => 'عد النقدية',
        'denomination' => 'الفئة',
        'quantity' => 'الكمية',
        'total' => 'الإجمالي',
        'grand_total' => 'المجموع الكلي',
    ],
];
