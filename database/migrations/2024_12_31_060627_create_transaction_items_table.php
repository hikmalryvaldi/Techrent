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
        Schema::create('transaction_items', function (Blueprint $table) {
            $table->id(); // ID item transaksi
            $table->foreignId('transaction_id')->constrained()->onDelete('cascade'); // Foreign key ke tabel transactions
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Foreign key ke tabel products
            $table->integer('quantity'); // Jumlah produk yang dibeli
            $table->decimal('price', 15, 2); // Harga per unit produk pada saat transaksi
            $table->decimal('total_price', 15, 2); // Total harga (price * quantity)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_items');
    }
};
