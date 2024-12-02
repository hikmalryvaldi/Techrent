<?php

namespace Database\Seeders;

use App\Models\FeaturedProduct;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FeaturedProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        FeaturedProduct::create([
            'product_id' => 1,
            'rental_count' => 50
        ]);

        FeaturedProduct::create([
            'product_id' => 2,
            'rental_count' => 30
        ]);

        FeaturedProduct::create([
            'product_id' => 3,
            'rental_count' => 20
        ]);
    }
}
