<?php

namespace YourVendor\ZatcaLaravel\Traits;

use YourVendor\ZatcaLaravel\Services\ZatcaService;
use YourVendor\ZatcaLaravel\Jobs\ReportZatcaInvoiceJob;
use YourVendor\ZatcaLaravel\Contracts\ZatcaInvoiceInterface;
use YourVendor\ZatcaLaravel\Contracts\ZatcaCompanyInterface;

trait HasZatcaIntegration
{
    /**
     * Report this invoice to ZATCA
     */
    public function reportToZatca(ZatcaCompanyInterface $company = null): bool
    {
        if (!$this instanceof ZatcaInvoiceInterface) {
            throw new \InvalidArgumentException('Model must implement ZatcaInvoiceInterface');
        }

        $company = $company ?? $this->getZatcaCompany();
        
        if (!$company) {
            throw new \InvalidArgumentException('Company is required for ZATCA reporting');
        }

        $zatcaService = app(ZatcaService::class);
        return $zatcaService->reportB2CInvoice($this, $company);
    }

    /**
     * Queue ZATCA reporting job
     */
    public function queueZatcaReport(ZatcaCompanyInterface $company = null): void
    {
        if (!$this instanceof ZatcaInvoiceInterface) {
            throw new \InvalidArgumentException('Model must implement ZatcaInvoiceInterface');
        }

        $company = $company ?? $this->getZatcaCompany();
        
        if (!$company) {
            throw new \InvalidArgumentException('Company is required for ZATCA reporting');
        }

        if (config('zatca.queue.enabled', true)) {
            ReportZatcaInvoiceJob::dispatch(
                $this->getId(),
                $company->getId(),
                get_class($this),
                get_class($company)
            );
        } else {
            $this->reportToZatca($company);
        }
    }

    /**
     * Generate QR code for this invoice
     */
    public function generateZatcaQrCode(ZatcaCompanyInterface $company = null): string
    {
        if (!$this instanceof ZatcaInvoiceInterface) {
            throw new \InvalidArgumentException('Model must implement ZatcaInvoiceInterface');
        }

        $company = $company ?? $this->getZatcaCompany();
        
        if (!$company) {
            throw new \InvalidArgumentException('Company is required for QR code generation');
        }

        $zatcaService = app(ZatcaService::class);
        return $zatcaService->generateQrCode($this, $company);
    }

    /**
     * Check if invoice is reported to ZATCA
     */
    public function isReportedToZatca(): bool
    {
        if (!$this instanceof ZatcaInvoiceInterface) {
            return false;
        }

        return $this->getZatcaStatus() === 'reported';
    }

    /**
     * Check if invoice reporting failed
     */
    public function hasZatcaReportingFailed(): bool
    {
        if (!$this instanceof ZatcaInvoiceInterface) {
            return false;
        }

        return $this->getZatcaStatus() === 'failed';
    }

    /**
     * Get ZATCA reporting errors
     */
    public function getZatcaReportingErrors(): ?array
    {
        if (!$this instanceof ZatcaInvoiceInterface) {
            return null;
        }

        $errors = $this->getZatcaErrors();
        return $errors ? json_decode($errors, true) : null;
    }

    /**
     * Override this method to provide company instance
     * This should be implemented in your model
     */
    protected function getZatcaCompany(): ?ZatcaCompanyInterface
    {
        // Default implementation - override in your model
        if (method_exists($this, 'company')) {
            return $this->company;
        }

        return null;
    }

    /**
     * Boot the trait
     */
    public static function bootHasZatcaIntegration(): void
    {
        // Auto-queue ZATCA reporting when invoice is created/updated
        static::saved(function ($model) {
            if ($model instanceof ZatcaInvoiceInterface && config('zatca.auto_report', false)) {
                // Check if invoice should be auto-reported
                if ($model->shouldAutoReportToZatca()) {
                    $model->queueZatcaReport();
                }
            }
        });
    }

    /**
     * Determine if invoice should be auto-reported
     * Override this method in your model for custom logic
     */
    protected function shouldAutoReportToZatca(): bool
    {
        // Default implementation - only report if status is appropriate
        if (!$this instanceof ZatcaInvoiceInterface) {
            return false;
        }

        $status = $this->getZatcaStatus();
        return in_array($status, ['pending', null]) && $this->getTotal() > 0;
    }
}