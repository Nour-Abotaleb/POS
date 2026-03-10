<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('currencies', function (Blueprint $table) {
            $table->text('currency_symbol')->change();
        });
        
        Schema::table('global_currencies', function (Blueprint $table) {
            $table->text('currency_symbol')->change();
        });
    }

    public function down(): void
    {
        Schema::table('currencies', function (Blueprint $table) {
            $table->string('currency_symbol', 10)->change();
        });
        
        Schema::table('global_currencies', function (Blueprint $table) {
            $table->string('currency_symbol', 10)->change();
        });
    }
};