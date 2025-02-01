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
        Schema::create('item', function (Blueprint $table) {
            $table->id();
            $table->string('name', 60);
            $table->string('code', 60);
            $table->string('sku', 60)->unique(); 
            $table->string('image',255)->nullable();
            $table->string('barcode',255)->nullable();
            $table->enum('weight_with_scale', ['No','Yes']);
            $table->enum('is_pos', ['No','Yes']); 
            $table->unsignedBigInteger('uom_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->unsignedBigInteger('modifier_header_id')->nullable();

            $table->enum('status', ['Active','Inactive']);
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
                        
            $table->foreign('company_id')->references('id')->on('company')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('uom_id')->references('id')->on('uom')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');
            $table->foreign('subcategory_id')->references('id')->on('subcategory')->onDelete('cascade');
            $table->foreign('modifier_header_id')->references('id')->on('modifier_header')->onDelete('cascade');                         
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item');
    }
};
