<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use App\Models\Category;
use App\Models\FeaturedProduct;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    //   public function run(): void
    //   {
    // User::factory(10)->create();

    // User::factory()->create([
    //     'name' => 'Test User',
    //     'email' => 'test@example.com',
    // ]);



    // Category::create([
    //     'name' => 'Kamera',
    //     'slug' => 'kamera',
    // ]);

    // Category::create([
    //     'name' => 'Konsol',
    //     'slug' => 'konsol',
    // ]);

    // Category::create([
    //     'name' => 'Lensa',
    //     'slug' => 'lensa',
    // ]);

    // Category::create([
    //     'name' => 'Speaker',
    //     'slug' => 'speaker',
    // ]);


    //    }

    public function run(): void
    {
        // Pertama, panggil CategorySeeder
        $this->call(CategorySeeder::class);

        // Kemudian panggil ProductSeeder
        $this->call(ProductSeeder::class);

        $this->call(FeaturedProductSeeder::class);
    }
}
