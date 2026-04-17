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
        Schema::create('size_options', function (Blueprint $table) {
            $table->id();
            $table->string('size_name');
            $table->string('length_inches');
            $table->string('length_cm');
            $table->string('best_for');
            $table->string('style');
            $table->integer('sort_order')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('size_options');
    }
};
