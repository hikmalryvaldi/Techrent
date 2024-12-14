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
        $product = Product::create([
            'product_name' => 'Sony Alpha 7 Mark III',
            'brand' => 'sony',
            'price' => 95000,
            'stock' => 15,
            'category_id' => 2,
            'description' => 'Kamera DSLR dengan fitur unggulan untuk fotografi pemula hingga profesional.',
            'rental_count' => 15,
        ]);

        // Menambahkan gambar ke tabel 'images'
        $product->images()->create([
            'image_path1' => 'img/halamanhome/barangunggulan/sony.png',
            'image_path2' => 'img/halamanhome/barangunggulan/sony.png',
            'image_path3' => 'img/halamanhome/barangunggulan/sony.png',
            'image_path4' => 'img/halamanhome/barangunggulan/sony.png',
        ]);

        $product2 = Product::create([
            'product_name' => 'Playstation 5',
            'brand' => 'sony',
            'price' => 85000,
            'stock' => 12,
            'category_id' => 3,
            'description' => 'Konsol game terbaru dari Sony, Playstation 5 dengan kualitas grafis luar biasa.',
            'rental_count' => 10,
        ]);

        $product2->images()->create([
            'image_path1' => 'img/halamanhome/barangunggulan/ps5.png',
            'image_path2' => 'img/halamanhome/barangunggulan/ps5.png',
            'image_path3' => 'img/halamanhome/barangunggulan/ps5.png',
            'image_path4' => 'img/halamanhome/barangunggulan/ps5.png',
        ]);

        $product3 = Product::create([
            'product_name' => 'Speaker JBL',
            'brand' => 'JBL',
            'price' => 250000,
            'stock' => 13,
            'category_id' => 4,
            'description' => 'Speaker JBL dengan suara jernih dan bass yang powerful, cocok untuk musik dan party.',
            'rental_count' => 11,
        ]);

        $product3->images()->create([
            'image_path1' => 'img/halamanhome/promo/speaker.png',
            'image_path2' => 'img/halamanhome/promo/speaker.png',
            'image_path3' => 'img/halamanhome/promo/speaker.png',
            'image_path4' => 'img/halamanhome/promo/speaker.png',
        ]);
    }
}
