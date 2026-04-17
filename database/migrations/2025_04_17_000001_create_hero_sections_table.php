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
        Schema::create('hero_sections', function (Blueprint $table) {
            $table->id();
            $table->string('badge')->default('✦ New Arrival 2025 ✦');
            $table->string('title_main')->default('Bridal');
            $table->string('title_highlight')->default('Gold');
            $table->string('subtitle')->default('22K Hallmark Certified · Handcrafted Heritage');
            $table->string('cta_text')->default('Order Now');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_sections');
    }
};
