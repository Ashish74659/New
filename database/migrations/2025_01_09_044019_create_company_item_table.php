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
        Schema::create('company_item', function (Blueprint $table) {
            $table->id();            
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('warehouse_id');
            $table->unsignedBigInteger('comy_id')->nullable(); 
            $table->double('selling_price',15,3);
            $table->double('product_quantity',15,3);
            $table->double('discount_per',5,3)->nullable(); 
            $table->double('alert_quantity',15,3)->nullable();
            $table->double('tax_per',5,3)->nullable(); 

            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

                        
            $table->foreign('company_id')->references('id')->on('company')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('warehouse_id')->references('id')->on('warehouse')->onDelete('cascade');
            $table->foreign('comy_id')->references('id')->on('company')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('item')->onDelete('cascade');                        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_item');
    }
};
