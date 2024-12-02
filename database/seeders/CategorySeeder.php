<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create([
            'name' => 'Kamera',
            'slug' => 'kamera'
        ]);

        Category::create([
            'name' => 'Konsol',
            'slug' => 'konsol'
        ]);

        Category::create([
            'name' => 'Lensa',
            'slug' => 'lensa'
        ]);

        Category::create([
            'name' => 'Speaker',
            'slug' => 'speaker'
        ]);
    }
}

