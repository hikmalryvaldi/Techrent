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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('brand')->nullable();
            $table->decimal('discount', 5, 2)->nullable();
            $table->integer('price');
            $table->integer('stock');
            $table->foreignId('category_id')->constrained(
                table: 'categories',
                indexName: 'products_category_id'
            );
            $table->text('description');
            $table->integer('rental_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
