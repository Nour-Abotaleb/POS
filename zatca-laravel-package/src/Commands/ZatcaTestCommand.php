<?php

namespace YourVendor\ZatcaLaravel\Commands;

use YourVendor\ZatcaLaravel\Services\ZatcaService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ZatcaTestCommand extends Command
{
    protected $signature = 'zatca:test 
                           {invoice_id : The invoice ID to test}
                           {company_id : The company ID}
                           {--qr-only : Generate QR code only without reporting}
                           {--invoice-model= : Custom invoice model class}
                           {--company-model= : Custom company model class}';

    protected $description = 'Test ZATCA integration with an invoice';

    public function handle(ZatcaService $zatcaService): int
    {
        $invoiceId = (int) $this->argument('invoice_id');
        $companyId = (int) $this->argument('company_id');
        $qrOnly = $this->option('qr-only');
        $invoiceModel = $this->option('invoice-model');
        $companyModel = $this->option('company-model');

        $this->info("Testing ZATCA integration...");

        try {
            // Get model classes
            $invoiceModelClass = $invoiceModel ?? config('zatca.models.invoice', \YourVendor\ZatcaLaravel\Models\ZatcaInvoice::class);
            $companyModelClass = $companyModel ?? config('zatca.models.company', \YourVendor\ZatcaLaravel\Models\ZatcaCompany::class);

            if (!class_exists($invoiceModelClass) || !class_exists($companyModelClass)) {
                $this->error("Model classes not found.");
                return 1;
            }

            $invoice = $invoiceModelClass::find($invoiceId);
            $company = $companyModelClass::find($companyId);

            if (!$invoice) {
                $this->error("Invoice with ID {$invoiceId} not found.");
                return 1;
            }

            if (!$company) {
                $this->error("Company with ID {$companyId} not found.");
                return 1;
            }

            // Display invoice and company info
            $this->displayInvoiceInfo($invoice);
            $this->displayCompanyInfo($company);

            if ($qrOnly) {
                // Generate QR code only
                $this->info("Generating QR code...");
                $qrCode = $zatcaService->generateQrCode($invoice, $company);
                $this->line("QR Code: " . $qrCode);
                return 0;
            }

            // Test full reporting
            $this->info("Testing ZATCA reporting...");
            $success = $zatcaService->reportB2CInvoice($invoice, $company);

            if ($success) {
                $this->info("✅ ZATCA test successful!");
                $this->displayZatcaResults($invoice);
                return 0;
            } else {
                $this->error("❌ ZATCA test failed.");
                $this->line("Errors: " . $invoice->getZatcaErrors());
                return 1;
            }

        } catch (\Exception $e) {
            $this->error("Exception occurred: " . $e->getMessage());
            Log::error("ZATCA Test Command Error: " . $e->getMessage(), [
                'invoice_id' => $invoiceId,
                'company_id' => $companyId
            ]);
            return 1;
        }
    }

    private function displayInvoiceInfo($invoice): void
    {
        $this->line("📄 Invoice Information:");
        $this->line("  ID: " . $invoice->getId());
        $this->line("  Number: " . $invoice->getInvoiceNumber());
        $this->line("  Date: " . $invoice->getCreatedAt()->format('Y-m-d H:i:s'));
        $this->line("  Subtotal: " . number_format($invoice->getSubTotal(), 2));
        $this->line("  Tax: " . number_format($invoice->getTotalTaxAmount(), 2));
        $this->line("  Total: " . number_format($invoice->getTotal(), 2));
        $this->line("  Payment Method: " . ($invoice->getPaymentMethod() ?? 'N/A'));
        $this->line("  Items Count: " . count($invoice->getItems()));
        $this->line("");
    }

    private function displayCompanyInfo($company): void
    {
        $this->line("🏢 Company Information:");
        $this->line("  ID: " . $company->getId());
        $this->line("  Name: " . $company->getCompanyName());
        $this->line("  VAT Number: " . $company->getVatNumber());
        $this->line("  Commercial Registration: " . ($company->getCommercialRegistration() ?? 'N/A'));
        $this->line("  Address: " . ($company->getAddress() ?? 'N/A'));
        $this->line("  City: " . ($company->getCity() ?? 'N/A'));
        $this->line("  Environment: " . $company->getZatcaApiEnvironment());
        $this->line("  Has Certificate: " . ($company->getZatcaCertificate() ? 'Yes' : 'No'));
        $this->line("  Has Private Key: " . ($company->getZatcaPrivateKey() ? 'Yes' : 'No'));
        $this->line("");
    }

    private function displayZatcaResults($invoice): void
    {
        $this->line("🔐 ZATCA Results:");
        $this->line("  Status: " . $invoice->getZatcaStatus());
        $this->line("  UUID: " . $invoice->getZatcaUuid());
        $this->line("  Invoice Counter: " . $invoice->getZatcaInvoiceCounter());
        $this->line("  Hash: " . substr($invoice->getZatcaHash() ?? '', 0, 50) . '...');
        $this->line("  QR Code: " . substr($invoice->getZatcaQrCode() ?? '', 0, 50) . '...');
        $this->line("  Reported At: " . ($invoice->getZatcaReportedAt() ? $invoice->getZatcaReportedAt()->format('Y-m-d H:i:s') : 'N/A'));
    }
}