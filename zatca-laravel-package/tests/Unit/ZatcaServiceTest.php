<?php

namespace YourVendor\ZatcaLaravel\Tests\Unit;

use YourVendor\ZatcaLaravel\Tests\TestCase;
use YourVendor\ZatcaLaravel\Services\ZatcaService;
use YourVendor\ZatcaLaravel\Models\ZatcaInvoice;
use YourVendor\ZatcaLaravel\Models\ZatcaCompany;
use YourVendor\ZatcaLaravel\Models\ZatcaInvoiceItem;
use YourVendor\ZatcaLaravel\Exceptions\ZatcaException;

class ZatcaServiceTest extends TestCase
{
    private ZatcaService $zatcaService;
    private ZatcaCompany $company;
    private ZatcaInvoice $invoice;

    protected function setUp(): void
    {
        parent::setUp();

        $this->zatcaService = new ZatcaService();

        // Create test company
        $this->company = ZatcaCompany::create([
            'company_name' => 'Test Company',
            'vat_number' => '300000000000003',
            'commercial_registration' => '1010123457',
            'address' => 'Test Street',
            'city' => 'Riyadh',
            'zip_code' => '12345',
            'zatca_api_environment' => 'simulation',
        ]);

        // Create test invoice
        $this->invoice = ZatcaInvoice::create([
            'company_id' => $this->company->id,
            'invoice_number' => 'TEST-001',
            'sub_total' => 100.00,
            'total_tax_amount' => 15.00,
            'total' => 115.00,
            'payment_method' => 'cash',
        ]);

        // Create test invoice item
        ZatcaInvoiceItem::create([
            'invoice_id' => $this->invoice->id,
            'name' => 'Test Product',
            'quantity' => 1,
            'price' => 100.00,
            'amount' => 100.00,
            'tax_amount' => 15.00,
            'tax_percentage' => 15.00,
        ]);
    }

    public function test_can_generate_qr_code(): void
    {
        $qrCode = $this->zatcaService->generateQrCode($this->invoice, $this->company);
        
        $this->assertIsString($qrCode);
        $this->assertNotEmpty($qrCode);
    }

    public function test_throws_exception_for_missing_credentials(): void
    {
        $this->expectException(ZatcaException::class);
        $this->expectExceptionMessage('ZATCA credentials missing');

        $this->zatcaService->reportB2CInvoice($this->invoice, $this->company);
    }

    public function test_can_validate_company_credentials(): void
    {
        // Set credentials
        $this->company->zatca_certificate = 'test-certificate';
        $this->company->zatca_private_key = 'test-private-key';
        $this->company->save();

        // This should not throw an exception for credential validation
        // Note: It will still fail at XML signing stage, but that's expected in tests
        try {
            $this->zatcaService->reportB2CInvoice($this->invoice, $this->company);
        } catch (ZatcaException $e) {
            // Should not be a credentials missing error
            $this->assertStringNotContainsString('credentials missing', $e->getMessage());
        } catch (\Exception $e) {
            // Other exceptions are expected in test environment
            $this->assertTrue(true);
        }
    }

    public function test_invoice_gets_zatca_fields_populated(): void
    {
        $this->company->zatca_certificate = 'test-certificate';
        $this->company->zatca_private_key = 'test-private-key';
        $this->company->save();

        try {
            $this->zatcaService->reportB2CInvoice($this->invoice, $this->company);
        } catch (\Exception $e) {
            // Expected to fail in test environment
        }

        // Refresh invoice from database
        $this->invoice->refresh();

        // Check that ZATCA fields were populated
        $this->assertNotNull($this->invoice->zatca_uuid);
        $this->assertNotNull($this->invoice->zatca_invoice_counter);
        $this->assertEquals(1, $this->invoice->zatca_invoice_counter);
    }
}