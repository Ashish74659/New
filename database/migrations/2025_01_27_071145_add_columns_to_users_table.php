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
        Schema::table('users', function (Blueprint $table) {
            $table->string('code', 20);
            $table->date('dob')->nullable(); 
            $table->string('city', 50)->nullable(); 
            $table->string('post_box', 20)->nullable(); 
            $table->string('address', 200)->nullable(); 
            $table->unsignedBigInteger('country_id');              

            $table->double('initial_cash',15,3); 
            $table->double('cash_payment',15,3)->nullable(); 
            $table->double('card_payment',15,3)->nullable(); 
            $table->double('loyality_point_payment',15,3)->nullable();
            $table->double('upi_payment',15,3)->nullable(); 
            $table->double('sales_tax_return_payment',15,3)->nullable(); 
            $table->double('total_amount',15,3)->nullable(); 
            $table->double('total_sales_return',15,3)->nullable(); 
            $table->double('final_cash',15,3)->nullable();

            $table->foreign('country_id')->references('id')->on('amy_countries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
