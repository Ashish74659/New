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
        Schema::create('customer_contact', function (Blueprint $table) {
            $table->id();
            $table->string('prifix',15)->nullable();
            $table->string('firstname', 60)->nullable();
            $table->string('lastname',60)->nullable();
            $table->string('email',100)->nullable(); 
            $table->string('phone_no',15)->nullable();            
            $table->unsignedBigInteger('customer_id')->nullable(); 
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customer')->onDelete('cascade');             
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_contact');
    }
};
