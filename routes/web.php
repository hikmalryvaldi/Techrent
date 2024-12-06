<?php

use App\Models\Product;
use App\Models\Carousel;
use App\Models\FeaturedProduct;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\FeaturedProductController;

Route::get('/', function () {
    return view('home', [
        'title' => 'Home',
        'carousels' => Carousel::all(),
        'topProduct' => Product::orderBy('rental_count', 'desc')->take(5)->get(), // Menampilkan 3 produk dengan rental_count tertinggi
    ]);
});

Route::get('/registrasi', function () {
    return view('registrasi');
})->middleware('guest');

Route::get('/produk', function () {
    return view('produk');
});

Route::post('/registrasi', [RegisterController::class, 'store']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);