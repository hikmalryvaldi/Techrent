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
            'image_path' => 'img/halamanhome/barangunggulan/sony.png'
        ]);
        Product::create([
            'product_name' => 'Playstation5',
            'brand' => 'Sony',
            'category_id' => 3,
            'rental_count' => 10,
            'image_path' => 'img/halamanhome/barangunggulan/ps5.png'
        ]);
        Product::create([
            'product_name' => 'Speaker',
            'brand' => 'Polytron',
            'category_id' => 4,
            'rental_count' => 11,
            'image_path' => 'img/halamanhome/promo/speaker.png'
        ]);
    }
}
