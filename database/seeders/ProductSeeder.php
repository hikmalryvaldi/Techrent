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
            'category_id' => 1,
            'description' => 'Kamera DSLR dengan fitur unggulan untuk fotografi pemula hingga profesional.',
            'rental_count' => 15,
        ]);

        // Menambahkan gambar ke tabel 'images'
        $product->images()->create([
            'image_path1' => '/img/halamanhome/barangunggulan/sony.png',
            'image_path2' => '/img/halamanhome/barangunggulan/sony.png',
            'image_path3' => '/img/halamanhome/barangunggulan/sony.png',
            'image_path4' => '/img/halamanhome/barangunggulan/sony.png',
        ]);

        $product2 = Product::create([
            'product_name' => 'Playstation 5',
            'brand' => 'sony',
            'price' => 85000,
            'stock' => 12,
            'category_id' => 2,
            'description' => 'Konsol game terbaru dari Sony, Playstation 5 dengan kualitas grafis luar biasa.',
            'rental_count' => 10,
        ]);

        $product2->images()->create([
            'image_path1' => '/img/halamanhome/barangunggulan/ps5.png',
            'image_path2' => '/img/halamanhome/barangunggulan/ps5.png',
            'image_path3' => '/img/halamanhome/barangunggulan/ps5.png',
            'image_path4' => '/img/halamanhome/barangunggulan/ps5.png',
        ]);

        $product3 = Product::create([
            'product_name' => 'Saramonic Blink 500',
            'brand' => 'Saramonic',
            'price' => 250000,
            'stock' => 13,
            'category_id' => 4,
            'description' => 'Saramonic dengan suara jernih dan bass yang powerful, cocok untuk musik dan party.',
            'rental_count' => 11,
        ]);

        $product3->images()->create([
            'image_path1' => '/img/soun/SaramonicBlink500B1WirelessLavalierMicrophone/satu.jpg',
            'image_path2' => '/img/soun/SaramonicBlink500B1WirelessLavalierMicrophone/dua.jpg',
            'image_path3' => '/img/soun/SaramonicBlink500B1WirelessLavalierMicrophone/tiga.jpg',
            'image_path4' => '/img/soun/SaramonicBlink500B1WirelessLavalierMicrophone/empat.jpg',
        ]);

        $product4 = Product::create([
            'product_name' => 'Lensa Nikon',
            'brand' => 'Nikkon',
            'price' => 50000,
            'stock' => 12,
            'category_id' => 3,
            'description' => 'Lensa dengan keluaran terbaru',
            'rental_count' => 11,
        ]);

        $product4->images()->create([
            'image_path1' => '/img/halamanhome/kategori/Lensa.jpg',
            'image_path2' => '/img/halamanhome/kategori/Lensa.jpg',
            'image_path3' => '/img/halamanhome/kategori/Lensa.jpg',
            'image_path4' => '/img/halamanhome/kategori/Lensa.jpg',
        ]);

        $product5 = Product::create([
            'product_name' => 'Canon 5D',
            'brand' => 'Canon',
            'price' => 30000,
            'stock' => 12,
            'category_id' => 1,
            'description' => 'Kamera DSLR dengan fitur unggulan untuk fotografi pemula hingga profesional.',
            'rental_count' => 11,
        ]);

        $product5->images()->create([
            'image_path1' => '/img/kamera/canon5D/depan.png',
            'image_path2' => '/img/kamera/canon5D/atas.png',
            'image_path3' => '/img/kamera/canon5D/samping.png',
            'image_path4' => '/img/kamera/canon5D/belakang.png',
        ]);

        $product6 = Product::create([
            'product_name' => 'Canon 700D',
            'brand' => 'Canon',
            'price' => 30000,
            'stock' => 12,
            'category_id' => 1,
            'description' => 'Kamera DSLR dengan fitur unggulan untuk fotografi pemula hingga profesional.',
            'rental_count' => 11,
        ]);

        $product6->images()->create([
            'image_path1' => '/img/kamera/canon700D/depan.png',
            'image_path2' => '/img/kamera/canon700D/atas.png',
            'image_path3' => '/img/kamera/canon700D/belakangFull.png',
            'image_path4' => '/img/kamera/canon700D/belakang.png',
        ]);

        $product7 = Product::create([
            'product_name' => 'Canon EF 50 mm',
            'brand' => 'Canon',
            'price' => 50000,
            'stock' => 12,
            'category_id' => 3,
            'description' => 'Lensa dengan keluaran terbaru',
            'rental_count' => 11,
        ]);

        $product7->images()->create([
            'image_path1' => '/img/lensa/CanonEF50mm/Atas.png',
            'image_path2' => '/img/lensa/CanonEF50mm/Depan.png',
            'image_path3' => '/img/lensa/CanonEF50mm/Samping.png',
            'image_path4' => '/img/lensa/CanonEF50mm/Samping.png',
        ]);

        $product8 = Product::create([
            'product_name' => 'Canon EF 85mm',
            'brand' => 'Canon',
            'price' => 50000,
            'stock' => 12,
            'category_id' => 3,
            'description' => 'Lensa dengan keluaran terbaru',
            'rental_count' => 11,
        ]);

        $product8->images()->create([
            'image_path1' => '/img/lensa/CanonEF85mm/Atas.jpg',
            'image_path2' => '/img/lensa/CanonEF85mm/Menyamping.jpg',
            'image_path3' => '/img/lensa/CanonEF85mm/Samping.jpg',
            'image_path4' => '/img/lensa/CanonEF85mm/Samping.jpg',
        ]);

        $product9 = Product::create([
            'product_name' => 'Fujifilm XF 35mm',
            'brand' => 'Fujifilm',
            'price' => 50000,
            'stock' => 12,
            'category_id' => 3,
            'description' => 'Lensa dengan keluaran terbaru',
            'rental_count' => 11,
        ]);

        $product9->images()->create([
            'image_path1' => '/img/lensa/FujifilmXF35mm/Atas.jpg',
            'image_path2' => '/img/lensa/FujifilmXF35mm/Atas.jpg',
            'image_path3' => '/img/lensa/FujifilmXF35mm/Samping.jpg',
            'image_path4' => '/img/lensa/FujifilmXF35mm/Samping.jpg',
        ]);

        $product10 = Product::create([
            'product_name' => 'Sony FE 35mm',
            'brand' => 'Sony',
            'price' => 50000,
            'stock' => 12,
            'category_id' => 3,
            'description' => 'Lensa dengan keluaran terbaru',
            'rental_count' => 11,
        ]);

        $product10->images()->create([
            'image_path1' => '/img/lensa/SonyFE35mm/Menyamping.jpg',
            'image_path2' => '/img/lensa/SonyFE35mm/Samping Tutup.jpg',
            'image_path3' => '/img/lensa/SonyFE35mm/Samping.jpg',
            'image_path4' => '/img/lensa/SonyFE35mm/SampingAtas.jpg',
        ]);

        $product11 = Product::create([
            'product_name' => 'Fujifilm',
            'brand' => 'FujiFIlm',
            'price' => 150000,
            'stock' => 12,
            'category_id' => 1,
            'description' => 'Kamera dengan fitur unggulan untuk fotografi pemula hingga profesional.',
            'rental_count' => 11,
        ]);

        $product11->images()->create([
            'image_path1' => '/img/kamera/fujifilm/Depan.jpg',
            'image_path2' => '/img/kamera/fujifilm/Samping.jpg',
            'image_path3' => '/img/kamera/fujifilm/BelakangPlip.jpg',
            'image_path4' => '/img/kamera/fujifilm/Belakang.jpg',
        ]);

        $product12 = Product::create([
            'product_name' => 'Sony Alpha 7C II',
            'brand' => 'Sony',
            'price' => 150000,
            'stock' => 12,
            'category_id' => 1,
            'description' => 'Kamera dengan fitur unggulan untuk fotografi pemula hingga profesional.',
            'rental_count' => 11,
        ]);

        $product12->images()->create([
            'image_path1' => '/img/kamera/SonyAlphaa7CII/Depan.jpg',
            'image_path2' => '/img/kamera/SonyAlphaa7CII/Samping.jpg',
            'image_path3' => '/img/kamera/SonyAlphaa7CII/DepanPlip.jpg',
            'image_path4' => '/img/kamera/SonyAlphaa7CII/Belakang.jpg',
        ]);

        $product13 = Product::create([
            'product_name' => 'Sony Alpha 7S Mark II',
            'brand' => 'Sony',
            'price' => 150000,
            'stock' => 12,
            'category_id' => 1,
            'description' => 'Kamera dengan fitur unggulan untuk fotografi pemula hingga profesional.',
            'rental_count' => 11,
        ]);

        $product13->images()->create([
            'image_path1' => '/img/kamera/SonyAlphaa7SMarkII/Depan.jpg',
            'image_path2' => '/img/kamera/SonyAlphaa7SMarkII/Atas.jpg',
            'image_path3' => '/img/kamera/SonyAlphaa7SMarkII/SampingKanan.jpg',
            'image_path4' => '/img/kamera/SonyAlphaa7SMarkII/SampingKiri.jpg',
        ]);

        $product14 = Product::create([
            'product_name' => 'Nintendo',
            'brand' => 'Nintendo',
            'price' => 85000,
            'stock' => 12,
            'category_id' => 2,
            'description' => 'Konsol game terbaru dari Nintendo',
            'rental_count' => 10,
        ]);

        $product14->images()->create([
            'image_path1' => '/img/konsol/Nintendo/Satu.jpg',
            'image_path2' => '/img/konsol/Nintendo/Dua.jpg',
            'image_path3' => '/img/konsol/Nintendo/Tiga.jpg',
            'image_path4' => '/img/konsol/Nintendo/Empat.jpg',
        ]);

        $product15 = Product::create([
            'product_name' => 'Playstation 2',
            'brand' => 'Sony',
            'price' => 85000,
            'stock' => 12,
            'category_id' => 2,
            'description' => 'Playstation 2 dengan kualitas luar biasa.',
            'rental_count' => 10,
        ]);

        $product15->images()->create([
            'image_path1' => '/img/konsol/Ps2/Satu.jpg',
            'image_path2' => '/img/konsol/Ps2/Dua.jpg',
            'image_path3' => '/img/konsol/Ps2/Satu.jpg',
            'image_path4' => '/img/konsol/Ps2/Dua.jpg',
        ]);

        $product16 = Product::create([
            'product_name' => 'Playstation 4',
            'brand' => 'Sony',
            'price' => 85000,
            'stock' => 12,
            'category_id' => 2,
            'description' => 'Playstation 4 dengan kualitas luar biasa.',
            'rental_count' => 10,
        ]);

        $product16->images()->create([
            'image_path1' => '/img/konsol/Ps4/Satu.jpg',
            'image_path2' => '/img/konsol/Ps4/Dua.jpg',
            'image_path3' => '/img/konsol/Ps4/Tiga.jpg',
            'image_path4' => '/img/konsol/Ps4/Empat.jpg',
        ]);

        $product17 = Product::create([
            'product_name' => 'Hollyland Lark',
            'brand' => 'Hollyland',
            'price' => 250000,
            'stock' => 13,
            'category_id' => 4,
            'description' => 'Hollyland dengan suara jernih dan bass yang powerful, cocok untuk musik dan party.',
            'rental_count' => 11,
        ]);

        $product17->images()->create([
            'image_path1' => '/img/soun/HollylandLarkM2ComboWirelessMiniMicrophone/Satu.jpg',
            'image_path2' => '/img/soun/HollylandLarkM2ComboWirelessMiniMicrophone/Dua.jpg',
            'image_path3' => '/img/soun/HollylandLarkM2ComboWirelessMiniMicrophone/Tiga.jpg',
            'image_path4' => '/img/soun/HollylandLarkM2ComboWirelessMiniMicrophone/Empat.jpg',
        ]);
    }
}
