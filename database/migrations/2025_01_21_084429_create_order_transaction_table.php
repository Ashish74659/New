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
        Schema::create('order_transaction', function (Blueprint $table) { //customer_id order_header_id
            $table->id();
            $table->string('code', 60)->unique();
            $table->string('card_holder_name', 255)->nullable();
            $table->double('card_number', 20,0)->nullable();
            $table->string('expiry', 10)->nullable();
            $table->string('cvv', 4)->nullable();
            $table->enum('payment_mode', ['Credit Card','Debit Card','Cash','UPI']); 
            $table->unsignedBigInteger('order_header_id');        
            $table->unsignedBigInteger('customer_id');              
            $table->double('net_total',15,3); 
            $table->enum('status', ['Failed','Success']);  
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('created_by');
            $table->timestamps();

            $table->foreign('order_header_id')->references('id')->on('order_header')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customer')->onDelete('cascade'); 
            $table->foreign('company_id')->references('id')->on('company')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction');
    }
};
