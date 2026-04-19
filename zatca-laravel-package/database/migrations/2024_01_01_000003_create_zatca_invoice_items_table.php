<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('zatca_invoice_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invoice_id')->constrained('zatca_invoices')->onDelete('cascade');
            $table->string('name');
            $table->decimal('quantity', 8, 2);
            $table->decimal('price', 10, 2);
            $table->decimal('amount', 10, 2);
            $table->decimal('tax_amount', 10, 2)->default(0);
            $table->decimal('tax_percentage', 5, 2)->default(15.00);
            $table->timestamps();

            $table->index(['invoice_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('zatca_invoice_items');
    }
};