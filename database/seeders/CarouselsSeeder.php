<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Carousel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

// class CarouselsSeeder extends Seeder
// {
//     /**
//      * Run the database seeds.
//      */
//     public function run(): void
//     {
//         // Ambil produk dari tabel products
//         $product1 = Product::where('product_name', 'Sony Alpha 7 Mark III')->first();
//         $product2 = Product::where('product_name', 'Playstation 5')->first();
//         $product3 = Product::where('product_name', 'Speaker JBL')->first();

//         if ($product1) {
//             Carousel::create([
//                 'product_id' => $product1->id,
//                 'image_path' => 'img/halamanhome/promo/BgCanon.jpg',
//             ]);
//         }

//         if ($product2) {
//             Carousel::create([
//                 'product_id' => $product2->id,
//                 'image_path' => 'img/halamanhome/promo/BgSony.jpg',
//             ]);
//         }

//         if ($product3) {
//             Carousel::create([
//                 'product_id' => $product3->id,
//                 'image_path' => 'img/halamanhome/promo/speaker.png',
//             ]);
//         }
//     }
// }


class CarouselsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void 
    {
        Carousel::create([
            'product_name' => "Cannon EOS 1200 D",
            'image_path' => "img/halamanhome/promo/BgCanon.jpg"
        ]);
    
        // Menyimpan gambar dari folder internal storage
        Carousel::create([
            'product_name' => "SONY ALPHA 6000",
            'image_path' => "img/halamanhome/promo/BgSony.jpg"  // Misalnya gambar ada di storage/app/public/images/sonson.jpg
        ]);
    }
    
}
