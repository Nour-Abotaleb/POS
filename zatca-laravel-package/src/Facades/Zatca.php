<?php

namespace YourVendor\ZatcaLaravel\Facades;

use Illuminate\Support\Facades\Facade;
use YourVendor\ZatcaLaravel\Services\ZatcaService;

/**
 * @method static bool reportB2CInvoice(\YourVendor\ZatcaLaravel\Contracts\ZatcaInvoiceInterface $invoice, \YourVendor\ZatcaLaravel\Contracts\ZatcaCompanyInterface $company)
 * @method static string generateQrCode(\YourVendor\ZatcaLaravel\Contracts\ZatcaInvoiceInterface $invoice, \YourVendor\ZatcaLaravel\Contracts\ZatcaCompanyInterface $company)
 *
 * @see \YourVendor\ZatcaLaravel\Services\ZatcaService
 */
class Zatca extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return ZatcaService::class;
    }
}