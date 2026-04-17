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
        Schema::create('contact_info', function (Blueprint $table) {
            $table->id();
            $table->string('shop_address');
            $table->string('shop_hours');
            $table->string('facebook_url');
            $table->string('facebook_name');
            $table->string('whatsapp_number');
            $table->string('email');
            $table->string('brand_name')->default('Zara Gold');
            $table->string('tagline')->default('Heritage · Craft · Brilliance');
            $table->string('copyright')->default('© 2025 Zara Gold Jewellers · All Rights Reserved · BIS Hallmark Certified');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_info');
    }
};
