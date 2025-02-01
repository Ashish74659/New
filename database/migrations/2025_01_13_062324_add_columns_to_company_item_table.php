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
        Schema::table('company_item', function (Blueprint $table) {            
            $table->enum('selling_price_tax_type', ['Exclusive','Inclusive']);
            $table->enum('not_for_selling', ['No','Yes']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('company_item', function (Blueprint $table) {
            //
        });
    }
};
