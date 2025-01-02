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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id(); // ID transaksi
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key ke tabel users
            $table->string('transaction_id')->unique(); // ID transaksi unik dari Midtrans
            $table->decimal('gross_amount', 15, 2); // Total pembayaran
            $table->string('status_pengiriman')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('status'); // Status transaksi (success, pending, failed) // Link pembayaran (optional, jika diperlukan)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
