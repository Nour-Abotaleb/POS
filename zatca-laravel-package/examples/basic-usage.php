<?php

/**
 * Basic Usage Example for ZATCA Laravel Package
 * 
 * This example shows how to use the package with the built-in models
 */

require_once 'vendor/autoload.php';

use YourVendor\ZatcaLaravel\Models\ZatcaCompany;
use YourVendor\ZatcaLaravel\Models\ZatcaInvoice;
use YourVendor\ZatcaLaravel\Models\ZatcaInvoiceItem;
use YourVendor\ZatcaLaravel\Services\ZatcaService;
use YourVendor\ZatcaLaravel\Jobs\ReportZatcaInvoiceJob;
use YourVendor\ZatcaLaravel\Facades\Zatca;

// 1. Create a company with ZATCA credentials
$company = ZatcaCompany::create([
    'company_name' => 'My Restaurant',
    'vat_number' => '300000000000003',
    'commercial_registration' => '1010123457',
    'address' => 'King Fahd Road',
    'city' => 'Riyadh',
    'zip_code' => '12345',
    'zatca_certificate' => 'your-zatca-certificate-here',
    'zatca_private_key' => 'your-zatca-private-key-here',
    'zatca_secret' => 'your-zatca-secret-here', // optional
    'zatca_api_environment' => 'simulation', // or 'production'
]);

// 2. Create an invoice
$invoice = ZatcaInvoice::create([
    'company_id' => $company->id,
    'invoice_number' => 'INV-2024-001',
    'sub_total' => 200.00,
    'total_tax_amount' => 30.00,
    'total' => 230.00,
    'payment_method' => 'cash',
]);

// 3. Add invoice items
ZatcaInvoiceItem::create([
    'invoice_id' => $invoice->id,
    'name' => 'Chicken Burger',
    'quantity' => 2,
    'price' => 50.00,
    'amount' => 100.00,
    'tax_amount' => 15.00,
    'tax_percentage' => 15.00,
]);

ZatcaInvoiceItem::create([
    'invoice_id' => $invoice->id,
    'name' => 'French Fries',
    'quantity' => 2,
    'price' => 25.00,
    'amount' => 50.00,
    'tax_amount' => 7.50,
    'tax_percentage' => 15.00,
]);

ZatcaInvoiceItem::create([
    'invoice_id' => $invoice->id,
    'name' => 'Soft Drink',
    'quantity' => 2,
    'price' => 25.00,
    'amount' => 50.00,
    'tax_amount' => 7.50,
    'tax_percentage' => 15.00,
]);

// 4. Report to ZATCA using the service directly
$zatcaService = app(ZatcaService::class);
$success = $zatcaService->reportB2CInvoice($invoice, $company);

if ($success) {
    echo "✅ Invoice reported to ZATCA successfully!\n";
    echo "ZATCA UUID: " . $invoice->getZatcaUuid() . "\n";
    echo "ZATCA Status: " . $invoice->getZatcaStatus() . "\n";
    echo "QR Code: " . substr($invoice->getZatcaQrCode(), 0, 50) . "...\n";
} else {
    echo "❌ Failed to report invoice to ZATCA\n";
    echo "Errors: " . $invoice->getZatcaErrors() . "\n";
}

// 5. Alternative: Use the facade
$qrCode = Zatca::generateQrCode($invoice, $company);
echo "QR Code (via facade): " . substr($qrCode, 0, 50) . "...\n";

// 6. Alternative: Queue the job for background processing
ReportZatcaInvoiceJob::dispatch($invoice->id, $company->id);
echo "📤 ZATCA reporting job queued\n";

// 7. Check invoice status
if ($invoice->isReportedToZatca()) {
    echo "✅ Invoice is reported to ZATCA\n";
} elseif ($invoice->hasZatcaReportingFailed()) {
    echo "❌ Invoice reporting failed\n";
    $errors = $invoice->getZatcaReportingErrors();
    print_r($errors);
} else {
    echo "⏳ Invoice reporting is pending\n";
}