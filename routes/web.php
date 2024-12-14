<?php

use App\Models\Product;
use App\Models\Carousel;
use App\Models\FeaturedProduct;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Router;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\ProductAdminController;
use App\Http\Controllers\FeaturedProductController;

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

// admin
Route::get('/Admin/dashboard', function () {
    return view('/Admin/dashboard');
})->name('admin.dashboard')->middleware('admin');

Route::get('/Admin/produk', function () {
    return view('/Admin/produk');
});

Route::get('/Admin/tambahProduk', function () {
    return view('/Admin/tambahProduk');
});

Route::get('/Admin/produk', [ProductAdminController::class, 'index'])->name('Admin.produk');

Route::get('/Admin/tambahProduk', [ProductAdminController::class, 'create'])->name('Admin.produk.create');

// Menyimpan produk
Route::post('/Admin/tambahProduk', [ProductAdminController::class, 'store'])->name('Admin.produk.store');

Route::get('/ubahPassword', function () {
    return view('ubahPassword');
});

Route::get('/Admin/users', function () {
    return view('/Admin/users');
});

// 

Route::controller(SocialiteController::class)->group(function () {
    Route::get('auth/redirection/{provider}', 'providerLogin')->name('auth.redirection');

    Route::get('auth/{provider}-callback', 'providerAuthentication');
});
