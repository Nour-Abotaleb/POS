<?php

return [
    /*
    |--------------------------------------------------------------------------
    | ZATCA API Environment
    |--------------------------------------------------------------------------
    |
    | This value determines which ZATCA environment to use for API calls.
    | Supported: "developer", "simulation", "production"
    |
    */
    'environment' => env('ZATCA_ENVIRONMENT', 'simulation'),

    /*
    |--------------------------------------------------------------------------
    | ZATCA API Endpoints
    |--------------------------------------------------------------------------
    |
    | These are the official ZATCA API endpoints for different environments.
    |
    */
    'endpoints' => [
        'developer' => 'https://gw-apic-gov.gazt.gov.sa/e-invoicing/developer-portal',
        'simulation' => 'https://gw-apic-gov.gazt.gov.sa/e-invoicing/simulation',
        'production' => 'https://gw-apic-gov.gazt.gov.sa/e-invoicing/core',
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Tax Settings
    |--------------------------------------------------------------------------
    |
    | Default tax percentage and currency for invoices.
    |
    */
    'default_tax_percent' => env('ZATCA_DEFAULT_TAX_PERCENT', 15.00),
    'default_currency' => env('ZATCA_DEFAULT_CURRENCY', 'SAR'),

    /*
    |--------------------------------------------------------------------------
    | Queue Settings
    |--------------------------------------------------------------------------
    |
    | Configure queue settings for ZATCA reporting jobs.
    |
    */
    'queue' => [
        'enabled' => env('ZATCA_QUEUE_ENABLED', true),
        'connection' => env('ZATCA_QUEUE_CONNECTION', 'default'),
        'queue' => env('ZATCA_QUEUE_NAME', 'default'),
        'delay_seconds' => env('ZATCA_QUEUE_DELAY', 30),
    ],

    /*
    |--------------------------------------------------------------------------
    | Logging Settings
    |--------------------------------------------------------------------------
    |
    | Configure logging for ZATCA operations.
    |
    */
    'logging' => [
        'enabled' => env('ZATCA_LOGGING_ENABLED', true),
        'channel' => env('ZATCA_LOG_CHANNEL', 'single'),
        'level' => env('ZATCA_LOG_LEVEL', 'info'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Validation Settings
    |--------------------------------------------------------------------------
    |
    | Configure validation rules for ZATCA data.
    |
    */
    'validation' => [
        'strict_mode' => env('ZATCA_STRICT_VALIDATION', false),
        'required_fields' => [
            'vat_number',
            'commercial_registration',
            'company_name',
            'address',
            'city',
        ],
    ],
];