<?php

/**
 * Example: Using ZATCA Package with Existing Laravel Models
 * 
 * This example shows how to integrate the package with your existing Order and Restaurant models
 */

use YourVendor\ZatcaLaravel\Contracts\ZatcaInvoiceInterface;
use YourVendor\ZatcaLaravel\Contracts\ZatcaCompanyInterface;
use YourVendor\ZatcaLaravel\Contracts\ZatcaInvoiceItemInterface;
use YourVendor\ZatcaLaravel\Traits\HasZatcaIntegration;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * Your existing Order model implementing ZatcaInvoiceInterface
 */
class Order extends Model implements ZatcaInvoiceInterface
{
    use HasZatcaIntegration;

    protected $fillable = [
        'restaurant_id',
        'order_number',
        'sub_total',
        'total_tax_amount',
        'total',
        'payment_method',
        'status',
        // ZATCA fields
        'zatca_uuid',
        'zatca_hash',
        'zatca_xml',
        'zatca_qr_code',
        'zatca_status',
        'zatca_errors',
        'zatca_reported_at',
        'zatca_invoice_counter',
    ];

    protected $casts = [
        'sub_total' => 'decimal:2',
        'total_tax_amount' => 'decimal:2',
        'total' => 'decimal:2',
        'zatca_reported_at' => 'datetime',
    ];

    // Implement ZatcaInvoiceInterface methods
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
        return $this->items->map(function ($item) {
            return new class($item) implements ZatcaInvoiceItemInterface {
                private $item;

                public function __construct($item)
                {
                    $this->item = $item;
                }

                public function getId(): int
                {
                    return $this->item->id;
                }

                public function getName(): string
                {
                    return $this->item->menuItem->item_name ?? $this->item->name;
                }

                public function getQuantity(): float
                {
                    return (float) $this->item->quantity;
                }

                public function getPrice(): float
                {
                    return (float) $this->item->price;
                }

                public function getAmount(): float
                {
                    return (float) $this->item->amount;
                }

                public function getTaxAmount(): float
                {
                    return (float) ($this->item->tax_amount ?? 0);
                }

                public function getTaxPercentage(): float
                {
                    return 15.00; // Default VAT rate
                }
            };
        })->toArray();
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

    public function getZatcaHash(): ?string
    {
        return $this->zatca_hash;
    }

    public function setZatcaHash(string $hash): void
    {
        $this->zatca_hash = $hash;
    }

    public function getZatcaXml(): ?string
    {
        return $this->zatca_xml;
    }

    public function setZatcaXml(string $xml): void
    {
        $this->zatca_xml = $xml;
    }

    public function getZatcaQrCode(): ?string
    {
        return $this->zatca_qr_code;
    }

    public function setZatcaQrCode(string $qrCode): void
    {
        $this->zatca_qr_code = $qrCode;
    }

    public function getZatcaStatus(): ?string
    {
        return $this->zatca_status;
    }

    public function setZatcaStatus(string $status): void
    {
        $this->zatca_status = $status;
    }

    public function getZatcaErrors(): ?string
    {
        return $this->zatca_errors;
    }

    public function setZatcaErrors(?string $errors): void
    {
        $this->zatca_errors = $errors;
    }

    public function getZatcaReportedAt(): ?Carbon
    {
        return $this->zatca_reported_at;
    }

    public function setZatcaReportedAt(?Carbon $reportedAt): void
    {
        $this->zatca_reported_at = $reportedAt;
    }

    public function getZatcaInvoiceCounter(): ?int
    {
        return $this->zatca_invoice_counter;
    }

    public function setZatcaInvoiceCounter(int $counter): void
    {
        $this->zatca_invoice_counter = $counter;
    }

    // Relationships
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Override trait method to provide company
    protected function getZatcaCompany(): ?ZatcaCompanyInterface
    {
        return $this->restaurant;
    }

    // Override trait method for auto-reporting logic
    protected function shouldAutoReportToZatca(): bool
    {
        return $this->status === 'paid' && 
               $this->getTotal() > 0 && 
               in_array($this->getZatcaStatus(), ['pending', null]);
    }
}

/**
 * Your existing Restaurant model implementing ZatcaCompanyInterface
 */
class Restaurant extends Model implements ZatcaCompanyInterface
{
    protected $fillable = [
        'restaurant_name',
        'vat_number',
        'commercial_registration',
        'address',
        'city',
        'zip_code',
        'phone_number',
        // ZATCA fields
        'zatca_private_key',
        'zatca_certificate',
        'zatca_secret',
        'zatca_api_environment',
        'zatca_csid',
    ];

    protected $hidden = [
        'zatca_private_key',
        'zatca_certificate',
        'zatca_secret',
    ];

    // Implement ZatcaCompanyInterface methods
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

    public function getCommercialRegistration(): ?string
    {
        return $this->commercial_registration;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function getZipCode(): ?string
    {
        return $this->zip_code;
    }

    public function getZatcaPrivateKey(): ?string
    {
        return $this->zatca_private_key;
    }

    public function getZatcaCertificate(): ?string
    {
        return $this->zatca_certificate;
    }

    public function getZatcaSecret(): ?string
    {
        return $this->zatca_secret;
    }

    public function getZatcaApiEnvironment(): string
    {
        return $this->zatca_api_environment ?? config('zatca.environment', 'simulation');
    }

    public function getZatcaCsid(): ?string
    {
        return $this->zatca_csid;
    }

    // Relationships
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}

// Usage examples:

// 1. Create order and report to ZATCA immediately
$order = Order::create([
    'restaurant_id' => 1,
    'order_number' => 'ORD-2024-001',
    'sub_total' => 100.00,
    'total_tax_amount' => 15.00,
    'total' => 115.00,
    'payment_method' => 'cash',
    'status' => 'paid',
]);

// Report immediately
$success = $order->reportToZatca();
if ($success) {
    echo "Order reported to ZATCA successfully!\n";
}

// 2. Queue ZATCA reporting
$order->queueZatcaReport();

// 3. Generate QR code only
$qrCode = $order->generateZatcaQrCode();
echo "QR Code: " . $qrCode . "\n";

// 4. Check status
if ($order->isReportedToZatca()) {
    echo "Order is reported to ZATCA\n";
} elseif ($order->hasZatcaReportingFailed()) {
    echo "ZATCA reporting failed\n";
    $errors = $order->getZatcaReportingErrors();
    print_r($errors);
}

// 5. Auto-reporting with model events (if enabled in config)
// This will automatically queue ZATCA reporting when order status changes to 'paid'
$order->update(['status' => 'paid']);