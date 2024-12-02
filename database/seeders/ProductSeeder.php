<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'product_name' => 'Sony Alpha 7 Mark III',
            'brand' => 'Sony',
            'category_id' => 2,
            'rental_count' => 15,
        ]);
        Product::create([
            'product_name' => 'Sony Alpha 7 Mark II',
            'brand' => 'Sonyyy',
            'category_id' => 3,
            'rental_count' => 10,
        ]);
        Product::create([
            'product_name' => 'Sony Alpha 7 Mark I',
            'brand' => 'Sonyy',
            'category_id' => 4,
            'rental_count' => 11,
        ]);
    }
}
