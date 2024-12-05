<?php

namespace Database\Seeders;

use App\Models\Carousel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
