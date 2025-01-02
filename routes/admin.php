<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DiskonAdminController;
use App\Http\Controllers\ProductAdminController;
use App\Http\Controllers\PromosiAdminController;

Route::get('/Admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware('admin');
Route::get('/Admin/produk', [ProductAdminController::class, 'index'])->name('Admin.produk');
Route::get('/Admin/produk/search', [ProductAdminController::class, 'search'])->name('produk.search');
Route::get('/Admin/produk/pdf', [ProductAdminController::class, 'pdf'])->name('produk.pdf');
Route::get('/Admin/tambahProduk', [ProductAdminController::class, 'create'])->name('Admin.produk.create');
Route::post('/Admin/tambahProduk', [ProductAdminController::class, 'store'])->name('Admin.produk.store');
Route::get('/Admin/produk/{id}', [ProductAdminController::class, 'edit'])->name('produk.edit');
Route::put('/Admin/produk/{id}', [ProductAdminController::class, 'update'])->name('produk.update');
Route::delete('/Admin/produk/{id}', [ProductAdminController::class, 'destroy'])->name('produk.destroy');

Route::get('/Admin/diskon', [DiskonAdminController::class, 'index'])->name('Admin.diskon');
Route::get('/Admin/diskon/search', [DiskonAdminController::class, 'search'])->name('diskon.search');
Route::view('/Admin/nNewsletterDiskon', '/Admin/nNewsletterDiskon');
Route::view('/Admin/nNewsletterCustom', '/Admin/nNewsletterCustom');
Route::view('/Admin/mpengembalianSelesai', '/Admin/mpengembalianSelesai');
Route::view('/Admin/mpengembalian', '/Admin/mpengembalian');
Route::view('/Admin/mperluDikirim', '/Admin/mperluDikirim');
Route::view('/Admin/mSelesai', '/Admin/mSelesai');
Route::view('/Admin/mpengembalian', '/Admin/mpengembalian');
Route::view('/Admin/dikirim', '/Admin/dikirim');
Route::view('/Admin/voucher', '/Admin/voucher');
Route::view('/Admin/detailPesanan', '/Admin/detailPesanan');

Route::get('/Admin/mperluDikirim', [PesananController::class, 'indexPerluDikirim']);
Route::get('/Admin/mDikemas', [PesananController::class, 'indexDikemas']);
Route::get('/Admin/mDikirim', [PesananController::class, 'indexDikirim']);
Route::get('/Admin/mSelesai', [PesananController::class, 'indexSelesai']);

Route::post('/transactions/update-status/kemas', [PesananController::class, 'kemasPesanan']);
Route::post('/transactions/update-status/kirim', [PesananController::class, 'kirimPesanan']);
Route::post('/transactions/update-status/selesai', [PesananController::class, 'doneBang']);

Route::get('/user/perlukirim', [UserController::class, 'indexPerluDikirim']);
Route::get('/user/dikirim', [UserController::class, 'indexDikirim']);

Route::post('/user/loll', [PesananController::class, 'lol']);