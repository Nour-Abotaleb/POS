<?php

return [
    'app' => [
        'configureWhatsappNotifications' => 'Configure WhatsApp Notifications',
        'staffNotifications' => 'Staff Notifications',
        'configureStaffNotifications' => 'Configure Staff Notifications',
        'lowStockAlert' => 'Low Stock Alert',
        'lowStockAlertDescription' => 'Receive notifications when inventory items are running low',
        'automaticReportDelivery' => 'Automatic Report Delivery',
        'saveSettings' => 'Save Settings',
        'whatsappNotificationSettings' => 'WhatsApp Notification Settings',
        'automatedMessageSchedules' => 'Automated Message Schedules',
        'configureAutomatedMessages' => 'Configure automated messages to be sent according to a schedule (cron, daily, weekly, or monthly)',
        'reportSchedules' => 'Report Schedules',
        'configureReportSchedules' => 'Configure scheduled reports to be sent via WhatsApp',
        'dailySalesReport' => 'Daily Sales Report',
        'weeklySalesReport' => 'Weekly Sales Report',
        'monthlySalesReport' => 'Monthly Sales Report',
    ],
    
    // Main Settings Title
    'whatsappNotificationSettings' => 'WhatsApp Notification Settings',
    
    // Notification Templates
    'templates' => [
        'orderNotification' => 'Order Notification',
        'orderNotificationDescription' => 'Unified template for all order-related notifications (confirmed, status update)',
        'paymentNotification' => 'Payment Notification', 
        'paymentNotificationDescription' => 'Unified template for payment confirmation and payment reminders',
        'reservationNotification' => 'Reservation Notification',
        'reservationNotificationDescription' => 'Unified template for all reservation-related notifications (confirmation, reminder, status update, followup)',
        'kitchenNotification' => 'Kitchen Notification',
        'kitchenNotificationDescription' => 'Unified template for kitchen-related notifications (new KOT, order modification)',
        'staffNotification' => 'Staff Notification',
        'staffNotificationDescription' => 'Unified template for staff-related notifications (payment request, table assignment, table status, waiter request)',
        'salesReport' => 'Sales Report',
        'salesReportDescription' => 'Unified template for all sales reports (daily, weekly, monthly)',
    ],
    
    // Automated Messages
    'automatedMessages' => [
        'title' => 'Automated Message Schedules',
        'description' => 'Configure automated messages to be sent according to a schedule (cron, daily, weekly, or monthly).',
        'dailyOperationsSummary' => 'Daily Operations Summary',
        'dailyOperationsSummaryDescription' => 'End-of-day operations summary for managers',
    ],
    
    // Report Schedules
    'reportSchedules' => [
        'title' => 'Report Schedules',
        'description' => 'Configure scheduled reports to be sent via WhatsApp.',
        'dailySalesReport' => 'Daily Sales Report',
        'weeklySalesReport' => 'Weekly Sales Report', 
        'monthlySalesReport' => 'Monthly Sales Report',
    ],
    
    // Notification Types
    'notificationTypes' => [
        'orderConfirmed' => 'Order Confirmed',
        'orderStatusUpdate' => 'Order Status Update',
        'paymentConfirmation' => 'Payment Confirmation',
        'paymentReminder' => 'Payment Reminder',
        'reservationConfirmation' => 'Reservation Confirmation',
        'reservationReminder' => 'Reservation Reminder',
        'reservationStatusUpdate' => 'Reservation Status Update',
        'reservationFollowup' => 'Reservation Followup',
        'newKot' => 'New KOT',
        'orderModification' => 'Order Modification',
        'paymentRequest' => 'Payment Request',
        'tableAssignment' => 'Table Assignment',
        'tableStatus' => 'Table Status',
        'waiterRequest' => 'Waiter Request',
        'dailySalesReport' => 'Daily Sales Report',
        'weeklySalesReport' => 'Weekly Sales Report',
        'monthlySalesReport' => 'Monthly Sales Report',
    ],
    
    // Additional UI Translations
    'configureWhatsappNotifications' => 'Configure WhatsApp notifications and automated message schedules',
    'staffNotifications' => 'Staff Notifications',
    'configureStaffNotifications' => 'Configure notifications that will be sent to staff members when specific events occur',
    'automaticReportDelivery' => 'Automatic Report Delivery',
    'saveSettings' => 'Save Settings',
    'settingsSaved' => 'Settings saved successfully!',
    
    // Notification Template Descriptions
    'orderNotificationDescription' => 'Unified template for all order-related notifications (confirmed, status update)',
    'paymentNotificationDescription' => 'Unified template for payment confirmation and payment reminders',
    'reservationNotificationDescription' => 'Unified template for all reservation-related notifications (confirmation, reminder, status update, followup)',
    'kitchenNotificationDescription' => 'Unified template for kitchen-related notifications (new KOT, order modification)',
    'staffNotificationDescription' => 'Unified template for staff-related notifications (payment request, table assignment, table status, waiter request)',
    'salesReportDescription' => 'Unified template for all sales reports (daily, weekly, monthly)',
];