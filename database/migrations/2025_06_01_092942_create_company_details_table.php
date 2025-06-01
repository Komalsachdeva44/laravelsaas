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
        Schema::create('company_details', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->string('company_name');
    $table->string('email');
    $table->string('phone');
    $table->string('website')->nullable();
    $table->string('business_type');
    $table->string('business_size');
    $table->string('industry')->nullable();
    $table->string('country');
    $table->string('state');
    $table->string('city');
    $table->text('address');
    $table->string('postal_code')->nullable();
    $table->string('timezone')->default('Asia/Kolkata');
    $table->string('currency')->default('INR');
    $table->string('language')->default('en');
    $table->string('gstin')->nullable();
    $table->string('logo_path')->nullable();
    $table->json('business_specific_data')->nullable();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_details');
    }
};
