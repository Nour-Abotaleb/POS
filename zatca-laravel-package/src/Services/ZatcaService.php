<?php

namespace YourVendor\ZatcaLaravel\Services;

use YourVendor\ZatcaLaravel\Contracts\ZatcaInvoiceInterface;
use YourVendor\ZatcaLaravel\Contracts\ZatcaCompanyInterface;
use YourVendor\ZatcaLaravel\Models\ZatcaInvoice;
use YourVendor\ZatcaLaravel\Exceptions\ZatcaException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Exception;

use Salla\ZATCA\Tags\Seller;
use Salla\ZATCA\Tags\TaxNumber;
use Salla\ZATCA\Tags\Timestamp;
use Salla\ZATCA\Tags\TotalAmount;
use Salla\ZATCA\Tags\TaxAmount;
use Salla\ZATCA\GenerateQrCode;
use Salla\ZATCA\Helpers\Certificate;
use Salla\ZATCA\Models\InvoiceSign;

class ZatcaService
{
    /**
     * Report a B2C Invoice to ZATCA within 24 hours.
     */
    public function reportB2CInvoice(ZatcaInvoiceInterface $invoice, ZatcaCompanyInterface $company): bool
    {
        try {
            $this->validateCredentials($company);

            // 1. Determine ICV and PIH
            $lastReportedInvoice = $this->getLastReportedInvoice($company, $invoice);
            $icv = $lastReportedInvoice ? ($lastReportedInvoice->getZatcaInvoiceCounter() + 1) : 1;
            $pih = $lastReportedInvoice ? $lastReportedInvoice->getZatcaHash() : $this->getDefaultPIH();

            $uuid = $invoice->getZatcaUuid() ?? (string) Str::uuid();
            $invoice->setZatcaUuid($uuid);
            $invoice->setZatcaInvoiceCounter($icv);

            // 2. Generate Base XML (UBL 2.1)
            $baseXml = $this->generateBaseXml($invoice, $company, $uuid, $icv, $pih);
            
            // 3. Sign the XML using Salla library
            $certHelper = new Certificate($company->getZatcaCertificate(), $company->getZatcaPrivateKey());
            if ($company->getZatcaSecret()) {
                $certHelper->setSecretKey($company->getZatcaSecret());
            }

            $signer = new InvoiceSign($baseXml, $certHelper);
            $signedInvoice = $signer->sign();

            $signedXml = $signedInvoice->getSignedXml();
            $invoiceHash = $signedInvoice->getInvoiceHash();
            $qrCode = $signedInvoice->getQrCode();

            // 4. Update invoice with generated data
            $invoice->setZatcaHash($invoiceHash);
            $invoice->setZatcaXml($signedXml);
            $invoice->setZatcaQrCode($qrCode);
            $invoice->setZatcaStatus('pending');
            $invoice->save();

            // 5. Send to ZATCA API
            $isSuccess = $this->sendToZatca($invoice, $signedXml, $invoiceHash, $certHelper, $company->getZatcaApiEnvironment());
            
            if ($isSuccess) {
                $invoice->setZatcaStatus('reported');
                $invoice->setZatcaReportedAt(Carbon::now());
                $invoice->setZatcaErrors(null);
            } else {
                $invoice->setZatcaStatus('failed');
            }
            
            $invoice->save();

            return $isSuccess;

        } catch (Exception $e) {
            $this->logError("ZATCA Reporting Error: " . $e->getMessage(), ['invoice_id' => $invoice->getId()]);
            $invoice->setZatcaStatus('failed');
            $invoice->setZatcaErrors(json_encode(['exception' => $e->getMessage()]));
            $invoice->save();
            
            return false;
        }
    }

    /**
     * Generate QR Code for invoice without reporting to ZATCA
     */
    public function generateQrCode(ZatcaInvoiceInterface $invoice, ZatcaCompanyInterface $company): string
    {
        try {
            $seller = new Seller($company->getCompanyName());
            $taxNumber = new TaxNumber($company->getVatNumber());
            $invoiceDate = new Timestamp($invoice->getCreatedAt());
            $invoiceTotal = new TotalAmount($invoice->getTotal());
            $taxAmount = new TaxAmount($invoice->getTotalTaxAmount());

            return GenerateQrCode::render($seller, $taxNumber, $invoiceDate, $invoiceTotal, $taxAmount);
        } catch (Exception $e) {
            $this->logError("QR Code Generation Error: " . $e->getMessage(), ['invoice_id' => $invoice->getId()]);
            throw new ZatcaException("Failed to generate QR code: " . $e->getMessage());
        }
    }

    /**
     * Validate company ZATCA credentials
     */
    private function validateCredentials(ZatcaCompanyInterface $company): void
    {
        if (!$company->getZatcaCertificate() || !$company->getZatcaPrivateKey()) {
            throw new ZatcaException("ZATCA credentials missing for company ID: " . $company->getId());
        }

        if (config('zatca.validation.strict_mode')) {
            $requiredFields = config('zatca.validation.required_fields', []);
            foreach ($requiredFields as $field) {
                $method = 'get' . Str::studly($field);
                if (!method_exists($company, $method) || !$company->$method()) {
                    throw new ZatcaException("Required field missing: {$field}");
                }
            }
        }
    }

    /**
     * Get the last reported invoice for ICV and PIH calculation
     */
    private function getLastReportedInvoice(ZatcaCompanyInterface $company, ZatcaInvoiceInterface $currentInvoice): ?ZatcaInvoiceInterface
    {
        // This should be implemented based on your specific model structure
        // For now, return null to use default values
        return null;
    }

    /**
     * Get default PIH value
     */
    private function getDefaultPIH(): string
    {
        return "NWZlY2ViNjZmZmM4NmYzOGQ5NTI3ODZjNmQ2OTZjNzljMmRiYzIzOWRkNGU5MWI0NjcyOWQ3M2EyN2ZiNTdlOQ==";
    }

    /**
     * Generate the base unsigned UBL 2.1 XML structure
     */
    private function generateBaseXml(ZatcaInvoiceInterface $invoice, ZatcaCompanyInterface $company, string $uuid, int $icv, string $pih): string
    {
        $issueDate = Carbon::parse($invoice->getCreatedAt())->format('Y-m-d');
        $issueTime = Carbon::parse($invoice->getCreatedAt())->format('H:i:s');
        $invoiceNumber = $invoice->getInvoiceNumber();
        
        $taxPercent = config('zatca.default_tax_percent', 15.00);
        $currency = config('zatca.default_currency', 'SAR');

        $xml = '<?xml version="1.0" encoding="UTF-8"?>
<Invoice xmlns="urn:oasis:names:specification:ubl:schema:xsd:Invoice-2" 
         xmlns:cac="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2" 
         xmlns:cbc="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2"
         xmlns:ext="urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2">
    <cbc:ProfileID>reporting:1.0</cbc:ProfileID>
    <cbc:ID>' . $invoiceNumber . '</cbc:ID>
    <cbc:UUID>' . $uuid . '</cbc:UUID>
    <cbc:IssueDate>' . $issueDate . '</cbc:IssueDate>
    <cbc:IssueTime>' . $issueTime . '</cbc:IssueTime>
    <cbc:InvoiceTypeCode name="0200000">388</cbc:InvoiceTypeCode>
    <cbc:DocumentCurrencyCode>' . $currency . '</cbc:DocumentCurrencyCode>
    <cbc:TaxCurrencyCode>' . $currency . '</cbc:TaxCurrencyCode>
    <cac:AdditionalDocumentReference>
        <cbc:ID>ICV</cbc:ID>
        <cbc:UUID>' . $icv . '</cbc:UUID>
    </cac:AdditionalDocumentReference>
    <cac:AdditionalDocumentReference>
        <cbc:ID>PIH</cbc:ID>
        <cac:Attachment>
            <cbc:EmbeddedDocumentBinaryObject mimeCode="text/plain">' . $pih . '</cbc:EmbeddedDocumentBinaryObject>
        </cac:Attachment>
    </cac:AdditionalDocumentReference>
    <cac:AccountingSupplierParty>
        <cac:Party>
            <cac:PartyIdentification>
                <cbc:ID schemeID="CRN">' . ($company->getCommercialRegistration() ?? '1010123457') . '</cbc:ID>
            </cac:PartyIdentification>
            <cac:PartyPostalAddress>
                <cbc:StreetName>' . ($company->getAddress() ?? 'Main Street') . '</cbc:StreetName>
                <cbc:CityName>' . ($company->getCity() ?? 'Riyadh') . '</cbc:CityName>
                <cbc:PostalZone>' . ($company->getZipCode() ?? '12345') . '</cbc:PostalZone>
                <cac:Country>
                    <cbc:IdentificationCode>SA</cbc:IdentificationCode>
                </cac:Country>
            </cac:PartyPostalAddress>
            <cac:PartyTaxScheme>
                <cbc:CompanyID>' . ($company->getVatNumber() ?? '300000000000003') . '</cbc:CompanyID>
                <cac:TaxScheme>
                    <cbc:ID>VAT</cbc:ID>
                </cac:TaxScheme>
            </cac:PartyTaxScheme>
            <cac:PartyLegalEntity>
                <cbc:RegistrationName>' . ($company->getCompanyName() ?? 'Demo Company') . '</cbc:RegistrationName>
            </cac:PartyLegalEntity>
        </cac:Party>
    </cac:AccountingSupplierParty>
    <cac:AccountingCustomerParty>
        <cac:Party>
            <cac:PartyPostalAddress>
                <cac:Country>
                    <cbc:IdentificationCode>SA</cbc:IdentificationCode>
                </cac:Country>
            </cac:PartyPostalAddress>
            <cac:PartyTaxScheme>
                <cac:TaxScheme>
                    <cbc:ID>VAT</cbc:ID>
                </cac:TaxScheme>
            </cac:PartyTaxScheme>
        </cac:Party>
    </cac:AccountingCustomerParty>
    <cac:Delivery>
        <cbc:ActualDeliveryDate>' . $issueDate . '</cbc:ActualDeliveryDate>
    </cac:Delivery>
    <cac:PaymentMeans>
        <cbc:PaymentMeansCode>' . $this->getPaymentMeansCode($invoice) . '</cbc:PaymentMeansCode>
    </cac:PaymentMeans>
    <cac:TaxTotal>
        <cbc:TaxAmount currencyID="' . $currency . '">' . number_format($invoice->getTotalTaxAmount(), 2, '.', '') . '</cbc:TaxAmount>
        <cac:TaxSubtotal>
            <cbc:TaxableAmount currencyID="' . $currency . '">' . number_format($invoice->getSubTotal(), 2, '.', '') . '</cbc:TaxableAmount>
            <cbc:TaxAmount currencyID="' . $currency . '">' . number_format($invoice->getTotalTaxAmount(), 2, '.', '') . '</cbc:TaxAmount>
            <cac:TaxCategory>
                <cbc:ID>S</cbc:ID>
                <cbc:Percent>' . number_format($taxPercent, 2, '.', '') . '</cbc:Percent>
                <cac:TaxScheme>
                    <cbc:ID>VAT</cbc:ID>
                </cac:TaxScheme>
            </cac:TaxCategory>
        </cac:TaxSubtotal>
    </cac:TaxTotal>
    <cac:LegalMonetaryTotal>
        <cbc:LineExtensionAmount currencyID="' . $currency . '">' . number_format($invoice->getSubTotal(), 2, '.', '') . '</cbc:LineExtensionAmount>
        <cbc:TaxExclusiveAmount currencyID="' . $currency . '">' . number_format($invoice->getSubTotal(), 2, '.', '') . '</cbc:TaxExclusiveAmount>
        <cbc:TaxInclusiveAmount currencyID="' . $currency . '">' . number_format($invoice->getTotal(), 2, '.', '') . '</cbc:TaxInclusiveAmount>
        <cbc:AllowanceTotalAmount currencyID="' . $currency . '">0.00</cbc:AllowanceTotalAmount>
        <cbc:PayableAmount currencyID="' . $currency . '">' . number_format($invoice->getTotal(), 2, '.', '') . '</cbc:PayableAmount>
    </cac:LegalMonetaryTotal>';

        foreach ($invoice->getItems() as $item) {
            $xml .= '
    <cac:InvoiceLine>
        <cbc:ID>' . $item->getId() . '</cbc:ID>
        <cbc:InvoicedQuantity unitCode="PCE">' . $item->getQuantity() . '</cbc:InvoicedQuantity>
        <cbc:LineExtensionAmount currencyID="' . $currency . '">' . number_format($item->getAmount(), 2, '.', '') . '</cbc:LineExtensionAmount>
        <cac:Item>
            <cbc:Name>' . htmlspecialchars($item->getName()) . '</cbc:Name>
            <cac:ClassifiedTaxCategory>
                <cbc:ID>S</cbc:ID>
                <cbc:Percent>' . number_format($taxPercent, 2, '.', '') . '</cbc:Percent>
                <cac:TaxScheme>
                    <cbc:ID>VAT</cbc:ID>
                </cac:TaxScheme>
            </cac:ClassifiedTaxCategory>
        </cac:Item>
        <cac:Price>
            <cbc:PriceAmount currencyID="' . $currency . '">' . number_format($item->getPrice(), 2, '.', '') . '</cbc:PriceAmount>
        </cac:Price>
    </cac:InvoiceLine>';
        }

        $xml .= '
</Invoice>';

        return $xml;
    }

    /**
     * Send the signed XML to ZATCA Reporting API
     */
    private function sendToZatca(ZatcaInvoiceInterface $invoice, string $signedXml, string $hash, Certificate $certHelper, string $env): bool
    {
        $endpoint = $this->getZatcaEndpoint($env) . '/invoices/reporting/single';
        
        $payload = [
            'invoiceHash' => $hash,
            'uuid' => $invoice->getZatcaUuid(),
            'invoice' => base64_encode($signedXml),
        ];

        try {
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => $certHelper->getAuthorizationHeader(),
                'Accept-Version' => 'V2',
            ])->post($endpoint, $payload);

            if ($response->successful()) {
                $this->logInfo("ZATCA Invoice reported successfully", ['invoice_id' => $invoice->getId()]);
                return true;
            } else {
                $invoice->setZatcaErrors($response->body());
                $this->logError("ZATCA API Rejection: " . $response->body(), [
                    'invoice_id' => $invoice->getId(), 
                    'response_code' => $response->status()
                ]);
                return false;
            }
        } catch (Exception $e) {
            $invoice->setZatcaErrors(json_encode(['api_exception' => $e->getMessage()]));
            $this->logError("ZATCA API Exception: " . $e->getMessage(), ['invoice_id' => $invoice->getId()]);
            return false;
        }
    }

    /**
     * Get ZATCA API endpoint based on environment
     */
    private function getZatcaEndpoint(string $environment): string
    {
        $endpoints = config('zatca.endpoints');
        return $endpoints[$environment] ?? $endpoints['simulation'];
    }

    /**
     * Get payment means code based on payment method
     */
    private function getPaymentMeansCode(ZatcaInvoiceInterface $invoice): string
    {
        $paymentMethod = strtolower($invoice->getPaymentMethod() ?? '');
        
        return match ($paymentMethod) {
            'cash' => '10',
            'card', 'credit_card', 'visa', 'mastercard' => '48',
            'bank_transfer' => '42',
            default => '10',
        };
    }

    /**
     * Log error message
     */
    private function logError(string $message, array $context = []): void
    {
        if (config('zatca.logging.enabled', true)) {
            Log::channel(config('zatca.logging.channel', 'single'))->error($message, $context);
        }
    }

    /**
     * Log info message
     */
    private function logInfo(string $message, array $context = []): void
    {
        if (config('zatca.logging.enabled', true)) {
            Log::channel(config('zatca.logging.channel', 'single'))->info($message, $context);
        }
    }
}