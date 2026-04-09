<?php

namespace YourVendor\ZatcaLaravel\Models;

use Illuminate\Database\Eloquent\Model;
use YourVendor\ZatcaLaravel\Contracts\ZatcaInvoiceInterface;
use Carbon\Carbon;

class ZatcaInvoice extends Model implements ZatcaInvoiceInterface
{
    protected $fillable = [
        'invoice_number',
        'sub_total',
        'total_tax_amount',
        'total',
        'payment_method',
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
        'zatca_invoice_counter' => 'integer',
    ];

    public function getId(): int
    {
        return $this->id;
    }

    public function getInvoiceNumber(): string
    {
        return $this->invoice_number;
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
        // This should return related invoice items
        // Implementation depends on your specific relationship structure
        return $this->items()->get()->toArray();
    }

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

    /**
     * Relationship with invoice items
     */
    public function items()
    {
        return $this->hasMany(ZatcaInvoiceItem::class, 'invoice_id');
    }
}