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
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\DiskonAdminController;
use App\Http\Controllers\detailProdukController;
use App\Http\Controllers\LupaPasswordController;
use App\Http\Controllers\ProductAdminController;

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'homeFeatures');
    Route::get('/search', 'search');  // AJAX Search route
    Route::get('/produk/{id}', 'show')->name('produk.show');
});

Route::get('/profile', [UserController::class, 'index'])->name('profile');
Route::get('/keranjang', [CartController::class, 'index']);

Route::get('/Admin/promosi', function () {
    return view('/Admin/promosi');
});

require __DIR__ . '/produk.php';
require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';


Route::controller(SocialiteController::class)->group(function () {
    Route::get('auth/redirection/{provider}', 'providerLogin')->name('auth.redirection');
    Route::get('auth/{provider}-callback', 'providerAuthentication');
});

Route::post('/addemail', [NewsletterController::class, 'subscribe']);
Route::post('/send-custom-email', [NewsletterController::class, 'newsletter']);
Route::post('/keranjang/tambah/{product}', [CartController::class, 'add'])->name('keranjang.add');
Route::get('/navbar/cart', [CartController::class, 'getCartItems'])->name('navbar.cart');
Route::get('/keranjang/checkout', [CheckoutController::class, 'keranjangCheckout']);
Route::post('/payment', [PaymentController::class, 'createTransaction']);
Route::post('/calculate-gross-amount', [CheckoutController::class, 'calculateGrossAmount']);

Route::controller(DiskonAdminController::class)->group(function () {
    Route::get('/searchh', 'searchProduct')->name('diskon.search');
    Route::post('/apply-discount', 'store')->name('discount.store');
    Route::post('/update-discount', 'update')->name('discount.update');
});