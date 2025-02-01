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
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->string('name', 60);
            $table->string('last_name', 60)->nullable();
            $table->string('code', 60)->unique();
            $table->string('email', 100);
            $table->date('dob')->nullable();
            $table->string('address',255)->nullable();
            $table->enum('customer_type', ['Individual','Business']);            
            $table->string('phone_no',15);
            $table->string('city',255)->nullable();
            $table->string('region',255)->nullable();
            $table->string('post_box',255)->nullable();
                                    
            $table->double('balance',15,3)->nullable();
            $table->double('credit_limit',15,3)->nullable();            
            $table->unsignedBigInteger('country_id')->nullable();
            $table->string('zipcode',10)->nullable();
            $table->unsignedBigInteger('loyality_point')->nullable();

            $table->enum('status', ['Active','Inactive','Blocked']);
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('company')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');            
            $table->foreign('country_id')->references('id')->on('amy_countries')->onDelete('cascade');                                    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
