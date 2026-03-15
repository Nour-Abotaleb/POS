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
            $table->string('zatca_uuid')->nullable();
            $table->text('zatca_hash')->nullable();
            $table->longText('zatca_xml')->nullable();
            $table->string('zatca_status')->default('pending')->comment('pending, reported, failed');
            $table->longText('zatca_errors')->nullable();
            $table->dateTime('zatca_reported_at')->nullable();
            $table->integer('zatca_invoice_counter')->nullable();
        });

        Schema::table('restaurants', function (Blueprint $table) {
            $table->text('zatca_private_key')->nullable();
            $table->text('zatca_certificate')->nullable();
            $table->string('zatca_secret')->nullable();
            $table->string('zatca_api_environment')->default('simulation')->comment('developer, simulation, production');
            $table->string('zatca_csid')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'zatca_uuid',
                'zatca_hash',
                'zatca_xml',
                'zatca_status',
                'zatca_errors',
                'zatca_reported_at',
                'zatca_invoice_counter'
            ]);
        });

        Schema::table('restaurants', function (Blueprint $table) {
            $table->dropColumn([
                'zatca_private_key',
                'zatca_certificate',
                'zatca_secret',
                'zatca_api_environment',
                'zatca_csid'
            ]);
        });
    }
};
