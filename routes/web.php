<?php

use App\Http\Controllers\CarouselController;
use App\Http\Controllers\CartController;
use App\Models\Product;
use App\Models\Carousel;
use App\Models\FeaturedProduct;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\FeaturedProductController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\UserController;


Route::get('/search', [HomeController::class, 'search']);  // AJAX Search route
Route::get('/produk/{id}', [HomeController::class, 'show'])->name('produk.show');  // Halaman detail produk


Route::get('/', [CarouselController::class, 'carousel']);
Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/detailProduk', [ProdukController::class, 'detailProduk']);
Route::get('/profile', [UserController::class, 'index'])->name('profile');
Route::get('/keranjang', [CartController::class, 'index']);

Route::get('/auth', [RegisterController::class, 'index'])->name('auth')->middleware('guest');
Route::post('/registrasi', [RegisterController::class, 'store'])->name('register');

Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/logout', [LoginController::class, 'logout']);

Route::controller(SocialiteController::class)->group(function () {
    Route::get('auth/redirection/{provider}', 'providerLogin')->name('auth.redirection');

    Route::get('auth/{provider}-callback', 'providerAuthentication');
});
