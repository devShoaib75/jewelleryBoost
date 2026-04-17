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
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            $table->string('product_name')->default('Maharani Bridal Necklace Set');
            $table->string('category')->default('Bridal Collection · 2025');
            $table->decimal('current_price', 10, 2)->default(185000);
            $table->decimal('old_price', 10, 2)->default(210000);
            $table->longText('description');
            $table->string('gold_purity')->default('22 Karat');
            $table->string('total_weight')->default('~85 Grams');
            $table->string('stone_setting')->default('Kundan + Ruby');
            $table->string('includes')->default('Necklace + Earrings + Tikka');
            $table->string('certification')->default('BIS Hallmark');
            $table->string('delivery')->default('5–7 Days');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_details');
    }
};
