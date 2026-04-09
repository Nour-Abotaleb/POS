<?php

namespace YourVendor\ZatcaLaravel\Models;

use Illuminate\Database\Eloquent\Model;
use YourVendor\ZatcaLaravel\Contracts\ZatcaInvoiceItemInterface;

class ZatcaInvoiceItem extends Model implements ZatcaInvoiceItemInterface
{
    protected $fillable = [
        'invoice_id',
        'name',
        'quantity',
        'price',
        'amount',
        'tax_amount',
        'tax_percentage',
    ];

    protected $casts = [
        'quantity' => 'decimal:2',
        'price' => 'decimal:2',
        'amount' => 'decimal:2',
        'tax_amount' => 'decimal:2',
        'tax_percentage' => 'decimal:2',
    ];

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getQuantity(): float
    {
        return (float) $this->quantity;
    }

    public function getPrice(): float
    {
        return (float) $this->price;
    }

    public function getAmount(): float
    {
        return (float) $this->amount;
    }

    public function getTaxAmount(): float
    {
        return (float) $this->tax_amount;
    }

    public function getTaxPercentage(): float
    {
        return (float) $this->tax_percentage;
    }

    /**
     * Relationship with invoice
     */
    public function invoice()
    {
        return $this->belongsTo(ZatcaInvoice::class, 'invoice_id');
    }
}