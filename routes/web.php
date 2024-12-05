<?php

use App\Http\Controllers\FeaturedProductController;
use App\Models\Product;
use App\Models\Carousel;
use App\Models\FeaturedProduct;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'title' => 'Home',
        'carousels' => Carousel::all(),
        'topProduct' => Product::orderBy('rental_count', 'desc')->take(5)->get(), // Menampilkan 3 produk dengan rental_count tertinggi
    ]);
});

Route::get('/registrasi', function () {
    return view('registrasi');
});


