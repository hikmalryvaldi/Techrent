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
        Schema::create('featured_products', function (Blueprint $table) { //featured_products -> barang unggulan
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade'); // Relasi dengan tabel produk
            $table->integer('rental_count')->default(0); // Jumlah sewa untuk produk ini
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('featured_products');
    }
};
