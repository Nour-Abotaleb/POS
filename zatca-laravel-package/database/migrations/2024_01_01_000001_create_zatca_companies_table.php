<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('zatca_companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('vat_number', 15);
            $table->string('commercial_registration', 10)->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('zip_code', 10)->nullable();
            $table->text('zatca_private_key')->nullable();
            $table->text('zatca_certificate')->nullable();
            $table->string('zatca_secret')->nullable();
            $table->string('zatca_api_environment')->default('simulation')->comment('developer, simulation, production');
            $table->string('zatca_csid')->nullable();
            $table->timestamps();

            $table->index(['vat_number']);
            $table->index(['zatca_api_environment']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('zatca_companies');
    }
};