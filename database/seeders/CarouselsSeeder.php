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
            'product_name' => "Sony Alpha 7",
            'image_path' => "https://image.shutterstock.com/image-photo/camera-lens-on-black-gray-260nw-2512231733.jpg"
        ]);
        Carousel::create([
            'product_name' => "Sonson",
            'image_path' => "https://image.shutterstock.com/image-photo/camera-lens-on-black-gray-260nw-2512231733.jpg"
        ]);
    }
}
