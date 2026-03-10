<?php

return [
    // Reservation Management
    'title' => 'Reservation Management',
    'description' => 'Manage table reservations and guests',
    
    // Reservation Details
    'reservation_details' => 'Reservation Details',
    'reservation_number' => 'Reservation Number',
    'customer_name' => 'Customer Name',
    'customer_phone' => 'Customer Phone',
    'customer_email' => 'Customer Email',
    'number_of_guests' => 'Number of Guests',
    'reservation_date' => 'Reservation Date',
    'reservation_time' => 'Reservation Time',
    'table_number' => 'Table Number',
    'table_section' => 'Table Section',
    'special_requests' => 'Special Requests',
    'occasion' => 'Occasion',
    'notes' => 'Notes',
    
    // Reservation Status
    'status' => 'Status',
    'pending' => 'Pending',
    'confirmed' => 'Confirmed',
    'arrived' => 'Arrived',
    'seated' => 'Seated',
    'in_progress' => 'In Progress',
    'completed' => 'Completed',
    'cancelled' => 'Cancelled',
    'no_show' => 'No Show',
    'delayed' => 'Delayed',
    
    // Reservation Types
    'reservation_type' => 'Reservation Type',
    'dine_in' => 'Dine In',
    'takeaway' => 'Takeaway',
    'delivery' => 'Delivery',
    'catering' => 'Catering',
    'event' => 'Event',
    'private_dining' => 'Private Dining',
    
    // Time Management
    'arrival_time' => 'Arrival Time',
    'seating_time' => 'Seating Time',
    'duration' => 'Duration',
    'estimated_duration' => 'Estimated Duration',
    'buffer_time' => 'Buffer Time',
    'turnover_time' => 'Turnover Time',
    
    // Table Management
    'table_assignment' => 'Table Assignment',
    'table_preferences' => 'Table Preferences',
    'table_combination' => 'Table Combination',
    'table_split' => 'Table Split',
    'table_capacity' => 'Table Capacity',
    'table_location' => 'Table Location',
    'table_features' => 'Table Features',
    
    // Customer Information
    'customer_history' => 'Customer History',
    'previous_visits' => 'Previous Visits',
    'loyalty_status' => 'Loyalty Status',
    'special_occasions' => 'Special Occasions',
    'dietary_restrictions' => 'Dietary Restrictions',
    'allergies' => 'Allergies',
    'preferences' => 'Preferences',
    
    // Occasions
    'birthday' => 'Birthday',
    'anniversary' => 'Anniversary',
    'business_meeting' => 'Business Meeting',
    'date_night' => 'Date Night',
    'family_gathering' => 'Family Gathering',
    'celebration' => 'Celebration',
    'corporate_event' => 'Corporate Event',
    'holiday' => 'Holiday',
    
    // Actions
    'create_reservation' => 'Create Reservation',
    'edit_reservation' => 'Edit Reservation',
    'cancel_reservation' => 'Cancel Reservation',
    'confirm_reservation' => 'Confirm Reservation',
    'check_in' => 'Check In',
    'check_out' => 'Check Out',
    'seat_guests' => 'Seat Guests',
    'send_confirmation' => 'Send Confirmation',
    'send_reminder' => 'Send Reminder',
    'add_waitlist' => 'Add to Waitlist',
    
    // Reservation Lists
    'today_reservations' => 'Today Reservations',
    'upcoming_reservations' => 'Upcoming Reservations',
    'past_reservations' => 'Past Reservations',
    'cancelled_reservations' => 'Cancelled Reservations',
    'walk_ins' => 'Walk Ins',
    'waitlist' => 'Waitlist',
    'overbooking' => 'Overbooking',
    
    // Waitlist Management
    'waitlist_title' => 'Waitlist',
    'waitlist_position' => 'Waitlist Position',
    'estimated_wait_time' => 'Estimated Wait Time',
    'notify_when_available' => 'Notify When Available',
    'auto_notify' => 'Auto Notify',
    'sms_notification' => 'SMS Notification',
    'email_notification' => 'Email Notification',
    
    // Calendar View
    'calendar_view' => 'Calendar View',
    'day_view' => 'Day View',
    'week_view' => 'Week View',
    'month_view' => 'Month View',
    'timeline_view' => 'Timeline View',
    'availability_status' => 'Availability Status',
    'occupied_slots' => 'Occupied Slots',
    'available_slots' => 'Available Slots',
    'blocked_slots' => 'Blocked Slots',
    
    // Settings
    'reservation_settings' => 'Reservation Settings',
    'advance_booking_days' => 'Advance Booking Days',
    'minimum_guests' => 'Minimum Guests',
    'maximum_guests' => 'Maximum Guests',
    'booking_time_slots' => 'Booking Time Slots',
    'slot_duration' => 'Slot Duration',
    'auto_confirmation' => 'Auto Confirmation',
    'deposit_required' => 'Deposit Required',
    'deposit_amount' => 'Deposit Amount',
    'cancellation_policy' => 'Cancellation Policy',
    'no_show_policy' => 'No Show Policy',
    'late_arrival_policy' => 'Late Arrival Policy',
    
    // Notifications
    'notification_settings' => 'Notification Settings',
    'confirmation_message' => 'Confirmation Message',
    'reminder_message' => 'Reminder Message',
    'cancellation_message' => 'Cancellation Message',
    'waitlist_message' => 'Waitlist Message',
    'notification_timing' => 'Notification Timing',
    'immediate' => 'Immediate',
    '1_hour_before' => '1 Hour Before',
    '24_hours_before' => '24 Hours Before',
    '48_hours_before' => '48 Hours Before',
    
    // Reports
    'reservation_reports' => 'Reservation Reports',
    'daily_reservations' => 'Daily Reservations',
    'weekly_reservations' => 'Weekly Reservations',
    'monthly_reservations' => 'Monthly Reservations',
    'occupancy_rate' => 'Occupancy Rate',
    'turnover_rate' => 'Turnover Rate',
    'no_show_rate' => 'No Show Rate',
    'cancellation_rate' => 'Cancellation Rate',
    'peak_hours' => 'Peak Hours',
    'popular_times' => 'Popular Times',
    'customer_analytics' => 'Customer Analytics',
    
    // Messages
    'reservation_created_successfully' => 'Reservation created successfully',
    'reservation_updated_successfully' => 'Reservation updated successfully',
    'reservation_cancelled_successfully' => 'Reservation cancelled successfully',
    'reservation_confirmed_successfully' => 'Reservation confirmed successfully',
    'guests_seated_successfully' => 'Guests seated successfully',
    'confirmation_sent_successfully' => 'Confirmation sent successfully',
    'reminder_sent_successfully' => 'Reminder sent successfully',
    'table_not_available' => 'Table not available',
    'time_slot_not_available' => 'Time slot not available',
    'maximum_guests_exceeded' => 'Maximum guests exceeded',
    'minimum_guests_required' => 'Minimum guests required',
    'deposit_required' => 'Deposit required',
    'reservation_not_found' => 'Reservation not found',
    'confirm_cancel_reservation' => 'Are you sure you want to cancel this reservation?',
    'confirm_delete_reservation' => 'Are you sure you want to delete this reservation?',
    
    // Validation
    'customer_name_required' => 'Customer name is required',
    'customer_phone_required' => 'Customer phone is required',
    'number_of_guests_required' => 'Number of guests is required',
    'reservation_date_required' => 'Reservation date is required',
    'reservation_time_required' => 'Reservation time is required',
    'invalid_date' => 'Invalid date',
    'invalid_time' => 'Invalid time',
    'past_date_not_allowed' => 'Past dates not allowed',
    'insufficient_notice' => 'Insufficient notice',
    
    // Status Labels
    'status_labels' => [
        'pending' => 'Pending',
        'confirmed' => 'Confirmed',
        'arrived' => 'Arrived',
        'seated' => 'Seated',
        'in_progress' => 'In Progress',
        'completed' => 'Completed',
        'cancelled' => 'Cancelled',
        'no_show' => 'No Show',
        'delayed' => 'Delayed',
    ],
    
    // Table Status
    'table_status_labels' => [
        'available' => 'Available',
        'occupied' => 'Occupied',
        'reserved' => 'Reserved',
        'cleaning' => 'Cleaning',
        'maintenance' => 'Maintenance',
        'out_of_service' => 'Out of Service',
    ],
    
    // Advanced Features
    'recurring_reservations' => 'Recurring Reservations',
    'group_reservations' => 'Group Reservations',
    'event_reservations' => 'Event Reservations',
    'vip_reservations' => 'VIP Reservations',
    'online_booking' => 'Online Booking',
    'phone_booking' => 'Phone Booking',
    'walk_in_booking' => 'Walk In Booking',
    'third_party_booking' => 'Third Party Booking',
    
    // Integration
    'calendar_integration' => 'Calendar Integration',
    'google_calendar' => 'Google Calendar',
    'outlook_calendar' => 'Outlook Calendar',
    'apple_calendar' => 'Apple Calendar',
    'sync_calendars' => 'Sync Calendars',
    'export_to_calendar' => 'Export to Calendar',
    
    // Payment Integration
    'payment_integration' => 'Payment Integration',
    'online_payment' => 'Online Payment',
    'deposit_payment' => 'Deposit Payment',
    'full_payment' => 'Full Payment',
    'payment_on_arrival' => 'Payment on Arrival',
    'payment_methods' => 'Payment Methods',
    'secure_payment' => 'Secure Payment',
    
    // Customer Communication
    'customer_communication' => 'Customer Communication',
    'automated_messages' => 'Automated Messages',
    'personalized_messages' => 'Personalized Messages',
    'sms_templates' => 'SMS Templates',
    'email_templates' => 'Email Templates',
    'whatsapp_integration' => 'WhatsApp Integration',
    'messaging_platforms' => 'Messaging Platforms',
    
    // Analytics and Insights
    'reservation_analytics' => 'Reservation Analytics',
    'booking_trends' => 'Booking Trends',
    'customer_behavior' => 'Customer Behavior',
    'revenue_per_cover' => 'Revenue Per Cover',
    'table_efficiency' => 'Table Efficiency',
    'staff_performance' => 'Staff Performance',
    'seasonal_patterns' => 'Seasonal Patterns',
    'forecasting' => 'Forecasting',
    
    // Mobile App Features
    'mobile_app' => 'Mobile App',
    'mobile_booking' => 'Mobile Booking',
    'push_notifications' => 'Push Notifications',
    'qr_code_checkin' => 'QR Code Checkin',
    'digital_menu' => 'Digital Menu',
    'mobile_payment' => 'Mobile Payment',
    
    // Additional Objects
    'reservation_object' => 'Reservation Object',
    'customer_object' => 'Customer Object',
    'table_object' => 'Table Object',
    'notification_object' => 'Notification Object',
    'payment_object' => 'Payment Object',
    'report_object' => 'Report Object',
    'settings_object' => 'Settings Object',
    'analytics_object' => 'Analytics Object',
    'integration_object' => 'Integration Object',
];
