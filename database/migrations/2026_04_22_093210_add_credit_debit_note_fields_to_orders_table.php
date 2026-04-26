<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('invoice_type')->default('388')->comment('388: Standard/Simplified, 381: Credit Note, 383: Debit Note');
            $table->foreignId('parent_order_id')->nullable()->constrained('orders')->onDelete('cascade');
            $table->text('return_reason')->nullable()->comment('Reason for the credit/debit note required by ZATCA');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['parent_order_id']);
            $table->dropColumn(['invoice_type', 'parent_order_id', 'return_reason']);
        });
    }
};
