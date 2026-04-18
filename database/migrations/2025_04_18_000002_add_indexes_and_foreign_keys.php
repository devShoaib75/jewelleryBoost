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
        // Add user_id to orders table and create foreign key
        Schema::table('orders', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->after('id')->constrained()->onDelete('set null');
            
            // Add missing indexes for frequently queried columns
            $table->index('customer_email');
            $table->index('customer_phone');
            $table->index('order_number');
        });

        // Add indexes to material_options
        Schema::table('material_options', function (Blueprint $table) {
            $table->index('sort_order');
            $table->index('name');
        });

        // Add indexes to size_options
        Schema::table('size_options', function (Blueprint $table) {
            $table->index('sort_order');
            $table->index('size_name');
        });

        // Add indexes to carousel_slides
        Schema::table('carousel_slides', function (Blueprint $table) {
            $table->index('sort_order');
        });

        // Add indexes to product_details
        Schema::table('product_details', function (Blueprint $table) {
            $table->index('category');
        });

        // Add indexes to hero_sections
        Schema::table('hero_sections', function (Blueprint $table) {
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeignIdFor(\App\Models\User::class);
            $table->dropIndex('orders_customer_email_index');
            $table->dropIndex('orders_customer_phone_index');
            $table->dropIndex('orders_order_number_index');
        });

        Schema::table('material_options', function (Blueprint $table) {
            $table->dropIndex('material_options_sort_order_index');
            $table->dropIndex('material_options_name_index');
        });

        Schema::table('size_options', function (Blueprint $table) {
            $table->dropIndex('size_options_sort_order_index');
            $table->dropIndex('size_options_size_name_index');
        });

        Schema::table('carousel_slides', function (Blueprint $table) {
            $table->dropIndex('carousel_slides_sort_order_index');
        });

        Schema::table('product_details', function (Blueprint $table) {
            $table->dropIndex('product_details_category_index');
        });

        Schema::table('hero_sections', function (Blueprint $table) {
            $table->dropIndex('hero_sections_created_at_index');
        });
    }
};
