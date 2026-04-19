<?php

namespace YourVendor\ZatcaLaravel\Commands;

use YourVendor\ZatcaLaravel\Services\ZatcaService;
use YourVendor\ZatcaLaravel\Jobs\ReportZatcaInvoiceJob;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ZatcaReportCommand extends Command
{
    protected $signature = 'zatca:report 
                           {invoice_id : The invoice ID to report}
                           {company_id : The company ID}
                           {--queue : Queue the job instead of running immediately}
                           {--invoice-model= : Custom invoice model class}
                           {--company-model= : Custom company model class}';

    protected $description = 'Report an invoice to ZATCA';

    public function handle(ZatcaService $zatcaService): int
    {
        $invoiceId = (int) $this->argument('invoice_id');
        $companyId = (int) $this->argument('company_id');
        $useQueue = $this->option('queue');
        $invoiceModel = $this->option('invoice-model');
        $companyModel = $this->option('company-model');

        $this->info("Reporting invoice {$invoiceId} to ZATCA...");

        try {
            if ($useQueue) {
                // Dispatch job to queue
                ReportZatcaInvoiceJob::dispatch($invoiceId, $companyId, $invoiceModel, $companyModel);
                $this->info("ZATCA reporting job queued successfully.");
                return 0;
            }

            // Run immediately
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

            $success = $zatcaService->reportB2CInvoice($invoice, $company);

            if ($success) {
                $this->info("Invoice reported to ZATCA successfully!");
                $this->line("ZATCA Status: " . $invoice->getZatcaStatus());
                $this->line("ZATCA UUID: " . $invoice->getZatcaUuid());
                return 0;
            } else {
                $this->error("Failed to report invoice to ZATCA.");
                $this->line("Errors: " . $invoice->getZatcaErrors());
                return 1;
            }

        } catch (\Exception $e) {
            $this->error("Exception occurred: " . $e->getMessage());
            Log::error("ZATCA Report Command Error: " . $e->getMessage(), [
                'invoice_id' => $invoiceId,
                'company_id' => $companyId
            ]);
            return 1;
        }
    }
}