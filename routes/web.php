<?php

use App\Models\Product;
use App\Models\Carousel;
use App\Models\FeaturedProduct;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\FeaturedProductController;
use App\Http\Controllers\SocialiteController;

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

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/detailProduk', function () {
    return view('detailProduk');
});

Route::get('/keranjang', function () {
    return view('keranjang');
});

Route::get('/ubahPassword', function () {
    return view('ubahPassword');
});

Route::post('/registrasi', [RegisterController::class, 'store']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::controller(SocialiteController::class)->group(function () {
    Route::get('auth/redirection/{provider}', 'providerLogin')->name('auth.redirection');

    Route::get('auth/{provider}-callback', 'providerAuthentication');
});
