<?php

namespace YourVendor\ZatcaLaravel\Jobs;

use YourVendor\ZatcaLaravel\Services\ZatcaService;
use YourVendor\ZatcaLaravel\Contracts\ZatcaInvoiceInterface;
use YourVendor\ZatcaLaravel\Contracts\ZatcaCompanyInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ReportZatcaInvoiceJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $invoiceId;
    public $companyId;
    public $invoiceModel;
    public $companyModel;

    /**
     * Create a new job instance.
     */
    public function __construct(
        int $invoiceId, 
        int $companyId, 
        string $invoiceModel = null, 
        string $companyModel = null
    ) {
        $this->invoiceId = $invoiceId;
        $this->companyId = $companyId;
        $this->invoiceModel = $invoiceModel;
        $this->companyModel = $companyModel;

        // Set queue configuration
        $this->onConnection(config('zatca.queue.connection', 'default'));
        $this->onQueue(config('zatca.queue.queue', 'default'));
        
        if (config('zatca.queue.delay_seconds', 30) > 0) {
            $this->delay(now()->addSeconds(config('zatca.queue.delay_seconds', 30)));
        }
    }

    /**
     * Execute the job.
     */
    public function handle(ZatcaService $zatcaService): void
    {
        try {
            // Get invoice and company instances
            $invoice = $this->getInvoiceInstance();
            $company = $this->getCompanyInstance();

            if (!$invoice || !$company) {
                Log::error('ZATCA Job: Invoice or Company not found', [
                    'invoice_id' => $this->invoiceId,
                    'company_id' => $this->companyId
                ]);
                return;
            }

            // Check if invoice is in reportable status
            if (!$this->isInvoiceReportable($invoice)) {
                Log::info('ZATCA Job: Invoice not in reportable status', [
                    'invoice_id' => $this->invoiceId,
                    'status' => $invoice->getZatcaStatus()
                ]);
                return;
            }

            // Report to ZATCA
            $success = $zatcaService->reportB2CInvoice($invoice, $company);

            if ($success) {
                Log::info('ZATCA Job: Invoice reported successfully', [
                    'invoice_id' => $this->invoiceId
                ]);
            } else {
                Log::error('ZATCA Job: Failed to report invoice', [
                    'invoice_id' => $this->invoiceId,
                    'errors' => $invoice->getZatcaErrors()
                ]);
            }

        } catch (\Exception $e) {
            Log::error('ZATCA Job Exception: ' . $e->getMessage(), [
                'invoice_id' => $this->invoiceId,
                'company_id' => $this->companyId,
                'trace' => $e->getTraceAsString()
            ]);
            
            // Re-throw to trigger job failure handling
            throw $e;
        }
    }

    /**
     * Get invoice instance
     */
    private function getInvoiceInstance(): ?ZatcaInvoiceInterface
    {
        $modelClass = $this->invoiceModel ?? config('zatca.models.invoice', \YourVendor\ZatcaLaravel\Models\ZatcaInvoice::class);
        
        if (!class_exists($modelClass)) {
            Log::error('ZATCA Job: Invoice model class not found', ['model' => $modelClass]);
            return null;
        }

        return $modelClass::find($this->invoiceId);
    }

    /**
     * Get company instance
     */
    private function getCompanyInstance(): ?ZatcaCompanyInterface
    {
        $modelClass = $this->companyModel ?? config('zatca.models.company', \YourVendor\ZatcaLaravel\Models\ZatcaCompany::class);
        
        if (!class_exists($modelClass)) {
            Log::error('ZATCA Job: Company model class not found', ['model' => $modelClass]);
            return null;
        }

        return $modelClass::find($this->companyId);
    }

    /**
     * Check if invoice is in reportable status
     */
    private function isInvoiceReportable(ZatcaInvoiceInterface $invoice): bool
    {
        $status = $invoice->getZatcaStatus();
        
        // Only report if not already reported or failed
        return in_array($status, ['pending', 'failed', null]);
    }

    /**
     * Handle job failure
     */
    public function failed(\Throwable $exception): void
    {
        Log::error('ZATCA Job Failed: ' . $exception->getMessage(), [
            'invoice_id' => $this->invoiceId,
            'company_id' => $this->companyId,
            'exception' => $exception->getTraceAsString()
        ]);

        // Update invoice status to failed if possible
        try {
            $invoice = $this->getInvoiceInstance();
            if ($invoice) {
                $invoice->setZatcaStatus('failed');
                $invoice->setZatcaErrors(json_encode([
                    'job_failed' => true,
                    'error' => $exception->getMessage()
                ]));
                $invoice->save();
            }
        } catch (\Exception $e) {
            Log::error('ZATCA Job: Failed to update invoice status after job failure', [
                'invoice_id' => $this->invoiceId,
                'error' => $e->getMessage()
            ]);
        }
    }
}