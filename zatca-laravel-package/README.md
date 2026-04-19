# ZATCA Laravel Package

A comprehensive Laravel package for integrating with Saudi Arabia's ZATCA (Zakat, Tax and Customs Authority) E-Invoicing system Phase 2.

## Features

- ✅ Full ZATCA Phase 2 compliance
- ✅ B2C Invoice reporting
- ✅ QR Code generation
- ✅ UBL 2.1 XML generation and signing
- ✅ Queue support for background processing
- ✅ Flexible model integration via interfaces
- ✅ Comprehensive logging and error handling
- ✅ Artisan commands for testing and reporting
- ✅ Multiple environment support (developer, simulation, production)

## Requirements

- PHP 8.2+
- Laravel 10.x, 11.x, or 12.x
- `salla/zatca` package for XML signing
- `guzzlehttp/guzzle` for HTTP requests

## Installation

1. Install the package via Composer:

```bash
composer require your-vendor/zatca-laravel
```

2. Publish the configuration file:

```bash
php artisan vendor:publish --tag=zatca-config
```

3. Publish and run the migrations:

```bash
php artisan vendor:publish --tag=zatca-migrations
php artisan migrate
```

4. Configure your environment variables:

```env
ZATCA_ENVIRONMENT=simulation
ZATCA_DEFAULT_TAX_PERCENT=15.00
ZATCA_DEFAULT_CURRENCY=SAR
ZATCA_QUEUE_ENABLED=true
ZATCA_QUEUE_DELAY=30
ZATCA_LOGGING_ENABLED=true
```

## Configuration

The package configuration file `config/zatca.php` allows you to customize:

- API environment (developer, simulation, production)
- Default tax settings
- Queue configuration
- Logging settings
- Validation rules

## Usage

### Basic Usage with Package Models

```php
use YourVendor\ZatcaLaravel\Models\ZatcaCompany;
use YourVendor\ZatcaLaravel\Models\ZatcaInvoice;
use YourVendor\ZatcaLaravel\Models\ZatcaInvoiceItem;
use YourVendor\ZatcaLaravel\Services\ZatcaService;

// Create a company
$company = ZatcaCompany::create([
    'company_name' => 'My Company',
    'vat_number' => '300000000000003',
    'commercial_registration' => '1010123457',
    'address' => 'Main Street',
    'city' => 'Riyadh',
    'zatca_certificate' => 'your-certificate',
    'zatca_private_key' => 'your-private-key',
    'zatca_api_environment' => 'simulation',
]);

// Create an invoice
$invoice = ZatcaInvoice::create([
    'company_id' => $company->id,
    'invoice_number' => 'INV-001',
    'sub_total' => 100.00,
    'total_tax_amount' => 15.00,
    'total' => 115.00,
    'payment_method' => 'cash',
]);

// Add invoice items
ZatcaInvoiceItem::create([
    'invoice_id' => $invoice->id,
    'name' => 'Product 1',
    'quantity' => 1,
    'price' => 100.00,
    'amount' => 100.00,
    'tax_amount' => 15.00,
    'tax_percentage' => 15.00,
]);

// Report to ZATCA
$zatcaService = app(ZatcaService::class);
$success = $zatcaService->reportB2CInvoice($invoice, $company);

if ($success) {
    echo "Invoice reported successfully!";
    echo "ZATCA UUID: " . $invoice->getZatcaUuid();
    echo "QR Code: " . $invoice->getZatcaQrCode();
}
```

### Using with Your Existing Models

Implement the required interfaces in your existing models:

```php
use YourVendor\ZatcaLaravel\Contracts\ZatcaInvoiceInterface;
use YourVendor\ZatcaLaravel\Contracts\ZatcaCompanyInterface;
use YourVendor\ZatcaLaravel\Traits\HasZatcaIntegration;

class Order extends Model implements ZatcaInvoiceInterface
{
    use HasZatcaIntegration;

    // Implement required interface methods
    public function getId(): int
    {
        return $this->id;
    }

    public function getInvoiceNumber(): string
    {
        return $this->order_number;
    }

    public function getCreatedAt(): Carbon
    {
        return $this->created_at;
    }

    public function getSubTotal(): float
    {
        return (float) $this->sub_total;
    }

    public function getTotalTaxAmount(): float
    {
        return (float) $this->total_tax_amount;
    }

    public function getTotal(): float
    {
        return (float) $this->total;
    }

    public function getPaymentMethod(): ?string
    {
        return $this->payment_method;
    }

    public function getItems(): array
    {
        return $this->items->toArray();
    }

    // ZATCA specific getters and setters
    public function getZatcaUuid(): ?string
    {
        return $this->zatca_uuid;
    }

    public function setZatcaUuid(string $uuid): void
    {
        $this->zatca_uuid = $uuid;
    }

    // ... implement other ZATCA methods

    // Define relationship to company
    protected function getZatcaCompany(): ?ZatcaCompanyInterface
    {
        return $this->restaurant; // or however you access your company model
    }
}

class Restaurant extends Model implements ZatcaCompanyInterface
{
    // Implement required interface methods
    public function getId(): int
    {
        return $this->id;
    }

    public function getCompanyName(): string
    {
        return $this->restaurant_name;
    }

    public function getVatNumber(): string
    {
        return $this->vat_number;
    }

    // ... implement other methods
}
```

### Using the Trait

The `HasZatcaIntegration` trait provides convenient methods:

```php
// Report to ZATCA immediately
$order->reportToZatca();

// Queue ZATCA reporting
$order->queueZatcaReport();

// Generate QR code only
$qrCode = $order->generateZatcaQrCode();

// Check status
if ($order->isReportedToZatca()) {
    echo "Invoice reported successfully";
}

if ($order->hasZatcaReportingFailed()) {
    $errors = $order->getZatcaReportingErrors();
    print_r($errors);
}
```

### Using the Facade

```php
use YourVendor\ZatcaLaravel\Facades\Zatca;

// Report invoice
$success = Zatca::reportB2CInvoice($invoice, $company);

// Generate QR code
$qrCode = Zatca::generateQrCode($invoice, $company);
```

### Queue Jobs

```php
use YourVendor\ZatcaLaravel\Jobs\ReportZatcaInvoiceJob;

// Dispatch job manually
ReportZatcaInvoiceJob::dispatch($invoiceId, $companyId);

// With custom models
ReportZatcaInvoiceJob::dispatch(
    $invoiceId, 
    $companyId, 
    App\Models\Order::class, 
    App\Models\Restaurant::class
);
```

## Artisan Commands

### Report Invoice

```bash
# Report immediately
php artisan zatca:report 123 456

# Queue the job
php artisan zatca:report 123 456 --queue

# With custom models
php artisan zatca:report 123 456 --invoice-model="App\Models\Order" --company-model="App\Models\Restaurant"
```

### Test Integration

```bash
# Full test
php artisan zatca:test 123 456

# QR code only
php artisan zatca:test 123 456 --qr-only

# With custom models
php artisan zatca:test 123 456 --invoice-model="App\Models\Order" --company-model="App\Models\Restaurant"
```

## Database Migrations

Add ZATCA fields to your existing tables:

```php
// For invoices/orders table
Schema::table('orders', function (Blueprint $table) {
    $table->string('zatca_uuid')->nullable();
    $table->text('zatca_hash')->nullable();
    $table->longText('zatca_xml')->nullable();
    $table->text('zatca_qr_code')->nullable();
    $table->string('zatca_status')->default('pending');
    $table->longText('zatca_errors')->nullable();
    $table->dateTime('zatca_reported_at')->nullable();
    $table->integer('zatca_invoice_counter')->nullable();
});

// For companies/restaurants table
Schema::table('restaurants', function (Blueprint $table) {
    $table->string('vat_number', 15)->nullable();
    $table->string('commercial_registration', 10)->nullable();
    $table->text('zatca_private_key')->nullable();
    $table->text('zatca_certificate')->nullable();
    $table->string('zatca_secret')->nullable();
    $table->string('zatca_api_environment')->default('simulation');
    $table->string('zatca_csid')->nullable();
});
```

## Error Handling

The package provides comprehensive error handling:

```php
use YourVendor\ZatcaLaravel\Exceptions\ZatcaException;

try {
    $success = $zatcaService->reportB2CInvoice($invoice, $company);
} catch (ZatcaException $e) {
    echo "ZATCA Error: " . $e->getMessage();
    $zatcaErrors = $e->getZatcaErrors();
    print_r($zatcaErrors);
}
```

## Logging

All ZATCA operations are logged. Configure logging in `config/zatca.php`:

```php
'logging' => [
    'enabled' => true,
    'channel' => 'single', // or 'daily', 'slack', etc.
    'level' => 'info',
],
```

## Testing

The package includes comprehensive tests. Run them with:

```bash
composer test
```

## Security

- Private keys and certificates are stored securely
- All API communications use HTTPS
- Input validation and sanitization
- Comprehensive error handling

## Contributing

1. Fork the repository
2. Create your feature branch
3. Add tests for your changes
4. Ensure all tests pass
5. Submit a pull request

## License

This package is open-sourced software licensed under the [MIT license](LICENSE.md).

## Support

For support, please create an issue on GitHub or contact [your.email@example.com](mailto:your.email@example.com).

## Changelog

See [CHANGELOG.md](CHANGELOG.md) for details about changes and updates.