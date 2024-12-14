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
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('image_path1')->nullable(); // Gambar 1
            $table->string('image_path2')->nullable(); // Gambar 2
            $table->string('image_path3')->nullable(); // Gambar 3
            $table->string('image_path4')->nullable(); // Gambar 4
            $table->foreignId('product_id')->constrained('products', 'id')->onDelete('cascade'); // Foreign key ke tabel 'products'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
