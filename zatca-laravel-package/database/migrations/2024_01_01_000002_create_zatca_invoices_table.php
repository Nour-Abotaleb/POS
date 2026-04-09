<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('zatca_invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('zatca_companies')->onDelete('cascade');
            $table->string('invoice_number');
            $table->decimal('sub_total', 10, 2);
            $table->decimal('total_tax_amount', 10, 2)->default(0);
            $table->decimal('total', 10, 2);
            $table->string('payment_method')->nullable();
            
            // ZATCA specific fields
            $table->string('zatca_uuid')->nullable();
            $table->text('zatca_hash')->nullable();
            $table->longText('zatca_xml')->nullable();
            $table->text('zatca_qr_code')->nullable();
            $table->string('zatca_status')->default('pending')->comment('pending, reported, failed');
            $table->longText('zatca_errors')->nullable();
            $table->dateTime('zatca_reported_at')->nullable();
            $table->integer('zatca_invoice_counter')->nullable();
            
            $table->timestamps();

            $table->index(['company_id', 'invoice_number']);
            $table->index(['zatca_status']);
            $table->index(['zatca_reported_at']);
            $table->index(['zatca_invoice_counter']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('zatca_invoices');
    }
};