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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique(); // e.g., ORD-2026-00001
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->string('customer_whatsapp')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('delivery_address');
            $table->string('city')->nullable();
            $table->string('necklace_size')->nullable();
            $table->string('product_name');
            $table->string('material_option');
            $table->decimal('product_price', 10, 2);
            $table->decimal('making_charge', 10, 2);
            $table->decimal('delivery_charge', 10, 2);
            $table->decimal('total_price', 10, 2);
            $table->string('payment_method')->default('Bkash / Nagad (Advance)');
            $table->text('special_notes')->nullable();
            $table->enum('status', ['pending', 'confirmed', 'shipped', 'delivered', 'cancelled'])->default('pending');
            $table->timestamps();
            $table->index('status');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
