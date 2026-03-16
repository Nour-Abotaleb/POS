<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Log;

use Salla\ZATCA\Tags\Seller;
use Salla\ZATCA\Tags\TaxNumber;
use Salla\ZATCA\Tags\Timestamp;
use Salla\ZATCA\Tags\TotalAmount;
use Salla\ZATCA\Tags\TaxAmount;
use Salla\ZATCA\GenerateQrCode;
use Salla\ZATCA\Helpers\Certificate;
use Salla\ZATCA\Models\InvoiceSign;

class ZatcaPhase2Service
{
    /**
     * Report a B2C Invoice to ZATCA within 24 hours.
     * 
     * @param Order $order
     * @return bool
     */
    public function reportB2CInvoice(Order $order): bool
    {
        try {
            $restaurant = $order->restaurant ?? restaurant(); 
            
            if (!$restaurant) {
                throw new Exception("Restaurant not found for invoice reporting.");
            }

            // Check if ZATCA credentials are set
            if (!$restaurant->zatca_certificate || !$restaurant->zatca_private_key) {
                // If not onboarded yet, we might want to skip or log a specific error
                // For simulation/dev, we can use placeholders or just fail gracefully
                Log::warning("ZATCA credentials missing for restaurant ID: " . $restaurant->id);
                return false;
            }

            // 1. Determine ICV and PIH
            $lastReportedOrder = Order::where('restaurant_id', $restaurant->id)
                ->where('zatca_status', 'reported')
                ->where('id', '!=', $order->id)
                ->orderBy('zatca_invoice_counter', 'desc')
                ->first();

            $icv = $lastReportedOrder ? ($lastReportedOrder->zatca_invoice_counter + 1) : 1;
            $pih = $lastReportedOrder ? $lastReportedOrder->zatca_hash : "NWZlY2ViNjZmZmM4NmYzOGQ5NTI3ODZjNmQ2OTZjNzljMmRiYzIzOWRkNGU5MWI0NjcyOWQ3M2EyN2ZiNTdlOQ==";

            $uuid = $order->zatca_uuid ?? (string) Str::uuid();
            $order->zatca_uuid = $uuid;
            $order->zatca_invoice_counter = $icv;

            // 2. Generate Base XML (UBL 2.1)
            $baseXml = $this->generateBaseXml($order, $restaurant, $uuid, $icv, $pih);
            
            // 3. Sign the XML using Salla library
            $certHelper = new Certificate($restaurant->zatca_certificate, $restaurant->zatca_private_key);
            if ($restaurant->zatca_secret) {
                $certHelper->setSecretKey($restaurant->zatca_secret);
            }

            $signer = new InvoiceSign($baseXml, $certHelper);
            $signedInvoice = $signer->sign(); // This returns Salla\Zatca\Models\Invoice object

            $signedXml = $signedInvoice->getSignedXml();
            $invoiceHash = $signedInvoice->getInvoiceHash();
            $qrCode = $signedInvoice->getQrCode();

            // 4. Update order with generated data
            $order->zatca_hash = $invoiceHash;
            $order->zatca_xml = $signedXml;
            $order->zatca_qr_code = $qrCode;
            $order->zatca_status = 'pending'; // Temporary before API call
            $order->save();

            // 5. Build API Request to ZATCA
            $isSuccess = $this->sendToZatca($order, $signedXml, $invoiceHash, $certHelper, $restaurant->zatca_api_environment ?? 'simulation');
            
            if ($isSuccess) {
                $order->zatca_status = 'reported';
                $order->zatca_reported_at = Carbon::now();
                $order->zatca_errors = null;
            } else {
                $order->zatca_status = 'failed';
                // Note: errors are updated inside sendToZatca
            }
            
            $order->save();

            return $isSuccess;

        } catch (Exception $e) {
            Log::error("ZATCA Reporting Error: " . $e->getMessage(), ['order_id' => $order->id]);
            $order->zatca_status = 'failed';
            $order->zatca_errors = json_encode(['exception' => $e->getMessage()]);
            $order->save();
            
            return false;
        }
    }

    /**
     * Generate the base unsigned UBL 2.1 XML structure.
     */
    private function generateBaseXml(Order $order, $restaurant, string $uuid, int $icv, string $pih): string
    {
        $issueDate = Carbon::parse($order->created_at)->format('Y-m-d');
        $issueTime = Carbon::parse($order->created_at)->format('H:i:s');
        $orderNumber = $order->order_number;
        
        // Use 15% VAT as default if not specified
        $taxPercent = 15.00; 

        $xml = '<?xml version="1.0" encoding="UTF-8"?>
<Invoice xmlns="urn:oasis:names:specification:ubl:schema:xsd:Invoice-2" 
         xmlns:cac="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2" 
         xmlns:cbc="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2"
         xmlns:ext="urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2">
    <cbc:ProfileID>reporting:1.0</cbc:ProfileID>
    <cbc:ID>' . $orderNumber . '</cbc:ID>
    <cbc:UUID>' . $uuid . '</cbc:UUID>
    <cbc:IssueDate>' . $issueDate . '</cbc:IssueDate>
    <cbc:IssueTime>' . $issueTime . '</cbc:IssueTime>
    <cbc:InvoiceTypeCode name="0200000">388</cbc:InvoiceTypeCode>
    <cbc:DocumentCurrencyCode>SAR</cbc:DocumentCurrencyCode>
    <cbc:TaxCurrencyCode>SAR</cbc:TaxCurrencyCode>
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
                <cbc:ID schemeID="CRN">' . ($restaurant->commercial_registration ?? '1010123457') . '</cbc:ID>
            </cac:PartyIdentification>
            <cac:PartyPostalAddress>
                <cbc:StreetName>' . ($restaurant->address ?? 'Main Street') . '</cbc:StreetName>
                <cbc:CityName>' . ($restaurant->city ?? 'Riyadh') . '</cbc:CityName>
                <cbc:PostalZone>' . ($restaurant->zip_code ?? '12345') . '</cbc:PostalZone>
                <cac:Country>
                    <cbc:IdentificationCode>SA</cbc:IdentificationCode>
                </cac:Country>
            </cac:PartyPostalAddress>
            <cac:PartyTaxScheme>
                <cbc:CompanyID>' . ($restaurant->vat_number ?? '300000000000003') . '</cbc:CompanyID>
                <cac:TaxScheme>
                    <cbc:ID>VAT</cbc:ID>
                </cac:TaxScheme>
            </cac:PartyTaxScheme>
            <cac:PartyLegalEntity>
                <cbc:RegistrationName>' . ($restaurant->restaurant_name ?? 'Demo Restaurant') . '</cbc:RegistrationName>
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
        <cbc:PaymentMeansCode>' . ($this->getPaymentMeansCode($order)) . '</cbc:PaymentMeansCode>
    </cac:PaymentMeans>
    <cac:TaxTotal>
        <cbc:TaxAmount currencyID="SAR">' . number_format($order->total_tax_amount ?? 0, 2, '.', '') . '</cbc:TaxAmount>
        <cac:TaxSubtotal>
            <cbc:TaxableAmount currencyID="SAR">' . number_format($order->sub_total, 2, '.', '') . '</cbc:TaxableAmount>
            <cbc:TaxAmount currencyID="SAR">' . number_format($order->total_tax_amount ?? 0, 2, '.', '') . '</cbc:TaxAmount>
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
        <cbc:LineExtensionAmount currencyID="SAR">' . number_format($order->sub_total, 2, '.', '') . '</cbc:LineExtensionAmount>
        <cbc:TaxExclusiveAmount currencyID="SAR">' . number_format($order->sub_total, 2, '.', '') . '</cbc:TaxExclusiveAmount>
        <cbc:TaxInclusiveAmount currencyID="SAR">' . number_format($order->total, 2, '.', '') . '</cbc:TaxInclusiveAmount>
        <cbc:AllowanceTotalAmount currencyID="SAR">0.00</cbc:AllowanceTotalAmount>
        <cbc:PayableAmount currencyID="SAR">' . number_format($order->total, 2, '.', '') . '</cbc:PayableAmount>
    </cac:LegalMonetaryTotal>';

        foreach ($order->items as $item) {
            $xml .= '
    <cac:InvoiceLine>
        <cbc:ID>' . $item->id . '</cbc:ID>
        <cbc:InvoicedQuantity unitCode="PCE">' . $item->quantity . '</cbc:InvoicedQuantity>
        <cbc:LineExtensionAmount currencyID="SAR">' . number_format($item->amount, 2, '.', '') . '</cbc:LineExtensionAmount>
        <cac:Item>
            <cbc:Name>' . ($item->menuItem->item_name ?? 'Item') . '</cbc:Name>
            <cac:ClassifiedTaxCategory>
                <cbc:ID>S</cbc:ID>
                <cbc:Percent>' . number_format($taxPercent, 2, '.', '') . '</cbc:Percent>
                <cac:TaxScheme>
                    <cbc:ID>VAT</cbc:ID>
                </cac:TaxScheme>
            </cac:ClassifiedTaxCategory>
        </cac:Item>
        <cac:Price>
            <cbc:PriceAmount currencyID="SAR">' . number_format($item->price, 2, '.', '') . '</cbc:PriceAmount>
        </cac:Price>
    </cac:InvoiceLine>';
        }

        $xml .= '
</Invoice>';

        return $xml;
    }

    /**
     * Send the signed XML to ZATCA Reporting API.
     */
    private function sendToZatca(Order $order, string $signedXml, string $hash, Certificate $certHelper, string $env): bool
    {
        $endpoint = $this->getZatcaEndpoint($env) . '/invoices/reporting/single';
        
        $payload = [
            'invoiceHash' => $hash,
            'uuid' => $order->zatca_uuid,
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
                return true;
            } else {
                $order->zatca_errors = $response->body();
                Log::error("ZATCA API Rejection: " . $response->body(), ['order_id' => $order->id, 'response_code' => $response->status()]);
                return false;
            }
        } catch (Exception $e) {
            $order->zatca_errors = json_encode(['api_exception' => $e->getMessage()]);
            Log::error("ZATCA API Exception: " . $e->getMessage(), ['order_id' => $order->id]);
            return false;
        }
    }

    private function getZatcaEndpoint(string $environment): string
    {
        return match ($environment) {
            'developer' => 'https://gw-apic-gov.gazt.gov.sa/e-invoicing/developer-portal',
            'simulation' => 'https://gw-apic-gov.gazt.gov.sa/e-invoicing/simulation',
            'production' => 'https://gw-apic-gov.gazt.gov.sa/e-invoicing/core',
            default => 'https://gw-apic-gov.gazt.gov.sa/e-invoicing/simulation',
        };
    }

    private function getPaymentMeansCode(Order $order): string
    {
        // 10: Cash, 48: Card, 30: Credit, 42: Bank Account
        $payment = $order->payments()->first();
        if (!$payment) return '10';

        return match (strtolower($payment->payment_method ?? '')) {
            'cash' => '10',
            'card', 'credit_card', 'visa', 'mastercard' => '48',
            'bank_transfer' => '42',
            default => '10',
        };
    }
}
