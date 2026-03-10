<?php

return [
    'app' => [
        'configureWhatsappNotifications' => 'تكوين إشعارات واتساب',
        'staffNotifications' => 'إشعارات الموظفين',
        'configureStaffNotifications' => 'تكوين إشعارات الموظفين',
        'lowStockAlert' => 'تنبيه المخزون المنخفض',
        'lowStockAlertDescription' => 'تلقي إشعارات عندما تنخفض عناصر المخزون',
        'automaticReportDelivery' => 'توصيل التقارير التلقائي',
        'saveSettings' => 'حفظ الإعدادات',
        'whatsappNotificationSettings' => 'إعدادات إشعارات واتساب',
        'automatedMessageSchedules' => 'جداول الرسائل التلقائية',
        'configureAutomatedMessages' => 'تكوين الرسائل التلقائية التي سيتم إرسالها وفقاً لجدول زمني (cron، يومي، أسبوعي، أو شهري)',
        'reportSchedules' => 'جداول التقارير',
        'configureReportSchedules' => 'تكوين التقارير المجدولة ليتم إرسالها عبر واتساب',
        'dailySalesReport' => 'تقرير المبيعات اليومي',
        'weeklySalesReport' => 'تقرير المبيعات الأسبوعي',
        'monthlySalesReport' => 'تقرير المبيعات الشهري',
    ],
    
    // Main Settings Title
    'whatsappNotificationSettings' => 'إعدادات إشعارات واتساب',
    
    // Notification Templates
    'templates' => [
        'orderNotification' => 'إشعار الطلب',
        'orderNotificationDescription' => 'قالب موحد لجميع الإشعارات المتعلقة بالطلبات (التأكيد، تحديث الحالة)',
        'paymentNotification' => 'إشعار الدفع', 
        'paymentNotificationDescription' => 'قالب موحد لتأكيد الدفع وتذكيرات الدفع',
        'reservationNotification' => 'إشعار الحجز',
        'reservationNotificationDescription' => 'قالب موحد لجميع الإشعارات المتعلقة بالحجز (التأكيد، التذكير، تحديث الحالة، المتابعة)',
        'kitchenNotification' => 'إشعار المطبخ',
        'kitchenNotificationDescription' => 'قالب موحد للإشعارات المتعلقة بالمطبخ (KOT جديد، تعديل الطلب)',
        'staffNotification' => 'إشعار الموظفين',
        'staffNotificationDescription' => 'قالب موحد للإشعارات المتعلقة بالموظفين (طلب الدفع، تعيين الطاولة، حالة الطاولة، طلب النادل)',
        'salesReport' => 'تقرير المبيعات',
        'salesReportDescription' => 'قالب موحد لجميع تقارير المبيعات (يومي، أسبوعي، شهري)',
    ],
    
    // Automated Messages
    'automatedMessages' => [
        'title' => 'جداول الرسائل التلقائية',
        'description' => 'تكوين الرسائل التلقائية التي سيتم إرسالها وفقاً لجدول زمني (cron، يومي، أسبوعي، أو شهري).',
        'dailyOperationsSummary' => 'ملخص العمليات اليومية',
        'dailyOperationsSummaryDescription' => 'ملخص العمليات في نهاية اليوم للمديرين',
        'lowStockAlert' => 'تنبيه المخزون المنخفض',
        'lowStockAlertDescription' => 'مراقبة مستويات المخزون تلقائياً وإرسال تنبيهات عند انخفاض المخزون',
    ],
    
    // Report Schedules
    'reportSchedules' => [
        'title' => 'جداول التقارير',
        'description' => 'تكوين التقارير المجدولة ليتم إرسالها عبر واتساب.',
        'dailySalesReport' => 'تقرير المبيعات اليومي',
        'weeklySalesReport' => 'تقرير المبيعات الأسبوعي', 
        'monthlySalesReport' => 'تقرير المبيعات الشهري',
    ],
    
    // Notification Types
    'notificationTypes' => [
        'orderConfirmed' => 'تأكيد الطلب',
        'orderStatusUpdate' => 'تحديث حالة الطلب',
        'paymentConfirmation' => 'تأكيد الدفع',
        'paymentReminder' => 'تذكير الدفع',
        'reservationConfirmation' => 'تأكيد الحجز',
        'reservationReminder' => 'تذكير الحجز',
        'reservationStatusUpdate' => 'تحديث حالة الحجز',
        'reservationFollowup' => 'متابعة الحجز',
        'newKot' => 'KOT جديد',
        'orderModification' => 'تعديل الطلب',
        'paymentRequest' => 'طلب الدفع',
        'tableAssignment' => 'تعيين الطاولة',
        'tableStatus' => 'حالة الطاولة',
        'waiterRequest' => 'طلب النادل',
        'dailySalesReport' => 'تقرير المبيعات اليومي',
        'weeklySalesReport' => 'تقرير المبيعات الأسبوعي',
        'monthlySalesReport' => 'تقرير المبيعات الشهري',
    ],
    
    // Settings
    'settings' => [
        'enableWhatsappNotifications' => 'تفعيل إشعارات واتساب',
        'whatsappApiKey' => 'مفتاح واتساب API',
        'whatsappPhoneNumber' => 'رقم هاتف واتساب',
        'testConnection' => 'اختبار الاتصال',
        'connectionStatus' => 'حالة الاتصال',
        'connected' => 'متصل',
        'disconnected' => 'غير متصل',
        'testMessage' => 'رسالة اختبار',
        'sendTestMessage' => 'إرسال رسالة اختبار',
    ],
    
    // Additional UI Translations
    'configureWhatsappNotifications' => 'تكوين إشعارات واتساب وجداول الرسائل التلقائية',
    'staffNotifications' => 'إشعارات الموظفين',
    'configureStaffNotifications' => 'تكوين الإشعارات التي سيتم إرسالها إلى أعضاء الفريق عند حدوث أحداث معينة',
    'automaticReportDelivery' => 'توصيل التقارير التلقائي',
    'saveSettings' => 'حفظ الإعدادات',
    'settingsSaved' => 'تم حفظ الإعدادات بنجاح!',
    
    // Notification Template Descriptions
    'orderNotificationDescription' => 'قالب موحد لجميع الإشعارات المتعلقة بالطلبات (التأكيد، تحديث الحالة)',
    'paymentNotificationDescription' => 'قالب موحد لتأكيد الدفع وتذكيرات الدفع',
    'reservationNotificationDescription' => 'قالب موحد لجميع الإشعارات المتعلقة بالحجز (التأكيد، التذكير، تحديث الحالة، المتابعة)',
    'kitchenNotificationDescription' => 'قالب موحد للإشعارات المتعلقة بالمطبخ (KOT جديد، تعديل الطلب)',
    'staffNotificationDescription' => 'قالب موحد للإشعارات المتعلقة بالموظفين (طلب الدفع، تعيين الطاولة، حالة الطاولة، طلب النادل)',
    'salesReportDescription' => 'قالب موحد لجميع تقارير المبيعات (يومي، أسبوعي، شهري)',
];