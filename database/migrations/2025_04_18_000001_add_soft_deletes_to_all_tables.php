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
        // Add soft deletes to hero_sections
        Schema::table('hero_sections', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Add soft deletes to product_details
        Schema::table('product_details', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Add soft deletes to material_options
        Schema::table('material_options', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Add soft deletes to size_options
        Schema::table('size_options', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Add soft deletes to contact_info
        Schema::table('contact_info', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Add soft deletes to carousel_slides
        Schema::table('carousel_slides', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Add soft deletes to orders
        Schema::table('orders', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hero_sections', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('product_details', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('material_options', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('size_options', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('contact_info', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('carousel_slides', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
