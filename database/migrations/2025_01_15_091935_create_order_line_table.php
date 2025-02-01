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
        Schema::create('order_line', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_header_id');        
            $table->unsignedBigInteger('item_id');  
            $table->unsignedBigInteger('company_item_id');  
            $table->double('price',15,3);
            $table->double('quantity',15,3);
            $table->double('sub_total',15,3);
            $table->double('discount',15,3)->nullable();             
            $table->double('tax',15,3)->nullable();
            $table->enum('tax_type', ['Exclusive','Inclusive']); 
 
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->foreign('order_header_id')->references('id')->on('order_header')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('item')->onDelete('cascade');
            $table->foreign('company_item_id')->references('id')->on('company_item')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('company')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_line');
    }
};
