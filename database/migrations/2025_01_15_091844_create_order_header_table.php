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
        Schema::create('order_header', function (Blueprint $table) {
            $table->id();            
            $table->string('code', 60)->unique();
            $table->unsignedBigInteger('customer_id')->nullable();              
            $table->double('sub_total',15,3)->nullable(); 
            $table->double('tax',15,3)->nullable(); 
            $table->double('discount',15,3)->nullable(); 
            $table->double('net_total',15,3)->nullable(); 
            $table->double('grand_total',15,3)->nullable();

            $table->double('cash_payment',15,3)->nullable(); 
            $table->double('card_payment',15,3)->nullable(); 
            $table->double('loyality_point_payment',15,3)->nullable();
            $table->double('upi_payment',15,3)->nullable(); 
            $table->double('sales_tax_return_payment',15,3)->nullable(); 

            $table->double('total_amount',15,3)->nullable(); 
            $table->double('total_sales_return',15,3)->nullable(); 
            $table->double('final_cash',15,3)->nullable();             
            $table->string('final_note', 255)->nullable();             
            
            $table->enum('status', ['Ongoing','Hold','Void','Payment Clear']);
            $table->timestamp('payment_date')->nullable();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
                        
            $table->foreign('company_id')->references('id')->on('company')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customer')->onDelete('cascade');                   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_header');
    }
};
