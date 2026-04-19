<?php

namespace YourVendor\ZatcaLaravel\Models;

use Illuminate\Database\Eloquent\Model;
use YourVendor\ZatcaLaravel\Contracts\ZatcaCompanyInterface;

class ZatcaCompany extends Model implements ZatcaCompanyInterface
{
    protected $fillable = [
        'company_name',
        'vat_number',
        'commercial_registration',
        'address',
        'city',
        'zip_code',
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

    public function getId(): int
    {
        return $this->id;
    }

    public function getCompanyName(): string
    {
        return $this->company_name;
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

    /**
     * Relationship with invoices
     */
    public function invoices()
    {
        return $this->hasMany(ZatcaInvoice::class, 'company_id');
    }
}