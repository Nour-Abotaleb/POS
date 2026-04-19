<?php

namespace YourVendor\ZatcaLaravel\Tests\Feature;

use YourVendor\ZatcaLaravel\Tests\TestCase;
use YourVendor\ZatcaLaravel\Models\ZatcaInvoice;
use YourVendor\ZatcaLaravel\Models\ZatcaCompany;
use YourVendor\ZatcaLaravel\Models\ZatcaInvoiceItem;
use YourVendor\ZatcaLaravel\Jobs\ReportZatcaInvoiceJob;
use YourVendor\ZatcaLaravel\Facades\Zatca;
use Illuminate\Support\Facades\Queue;

class ZatcaIntegrationTest extends TestCase
{
    public function test_can_create_zatca_models(): void
    {
        $company = ZatcaCompany::create([
            'company_name' => 'Test Company',
            'vat_number' => '300000000000003',
            'commercial_registration' => '1010123457',
            'address' => 'Test Street',
            'city' => 'Riyadh',
        ]);

        $invoice = ZatcaInvoice::create([
            'company_id' => $company->id,
            'invoice_number' => 'TEST-001',
            'sub_total' => 100.00,
            'total_tax_amount' => 15.00,
            'total' => 115.00,
        ]);

        $item = ZatcaInvoiceItem::create([
            'invoice_id' => $invoice->id,
            'name' => 'Test Product',
            'quantity' => 1,
            'price' => 100.00,
            'amount' => 100.00,
            'tax_amount' => 15.00,
        ]);

        $this->assertDatabaseHas('zatca_companies', [
            'id' => $company->id,
            'company_name' => 'Test Company',
        ]);

        $this->assertDatabaseHas('zatca_invoices', [
            'id' => $invoice->id,
            'invoice_number' => 'TEST-001',
        ]);

        $this->assertDatabaseHas('zatca_invoice_items', [
            'id' => $item->id,
            'name' => 'Test Product',
        ]);
    }

    public function test_can_dispatch_zatca_job(): void
    {
        Queue::fake();

        $company = ZatcaCompany::create([
            'company_name' => 'Test Company',
            'vat_number' => '300000000000003',
        ]);

        $invoice = ZatcaInvoice::create([
            'company_id' => $company->id,
            'invoice_number' => 'TEST-001',
            'sub_total' => 100.00,
            'total_tax_amount' => 15.00,
            'total' => 115.00,
        ]);

        ReportZatcaInvoiceJob::dispatch($invoice->id, $company->id);

        Queue::assertPushed(ReportZatcaInvoiceJob::class);
    }

    public function test_zatca_facade_works(): void
    {
        $company = ZatcaCompany::create([
            'company_name' => 'Test Company',
            'vat_number' => '300000000000003',
        ]);

        $invoice = ZatcaInvoice::create([
            'company_id' => $company->id,
            'invoice_number' => 'TEST-001',
            'sub_total' => 100.00,
            'total_tax_amount' => 15.00,
            'total' => 115.00,
        ]);

        ZatcaInvoiceItem::create([
            'invoice_id' => $invoice->id,
            'name' => 'Test Product',
            'quantity' => 1,
            'price' => 100.00,
            'amount' => 100.00,
            'tax_amount' => 15.00,
        ]);

        $qrCode = Zatca::generateQrCode($invoice, $company);
        
        $this->assertIsString($qrCode);
        $this->assertNotEmpty($qrCode);
    }

    public function test_invoice_relationships_work(): void
    {
        $company = ZatcaCompany::create([
            'company_name' => 'Test Company',
            'vat_number' => '300000000000003',
        ]);

        $invoice = ZatcaInvoice::create([
            'company_id' => $company->id,
            'invoice_number' => 'TEST-001',
            'sub_total' => 100.00,
            'total_tax_amount' => 15.00,
            'total' => 115.00,
        ]);

        $item = ZatcaInvoiceItem::create([
            'invoice_id' => $invoice->id,
            'name' => 'Test Product',
            'quantity' => 1,
            'price' => 100.00,
            'amount' => 100.00,
            'tax_amount' => 15.00,
        ]);

        // Test relationships
        $this->assertEquals($company->id, $invoice->company_id);
        $this->assertEquals($invoice->id, $item->invoice_id);
        $this->assertCount(1, $invoice->items);
        $this->assertEquals('Test Product', $invoice->items->first()->name);
    }
}