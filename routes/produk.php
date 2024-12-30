<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\detailProdukController;
use App\Http\Controllers\ProdukController;

Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/index/search', [ProdukController::class, 'search'])->name('produk.search');
Route::get('/produk/detailProduk', [ProdukController::class, 'detailProduk']);
Route::get('/produk/detail', function () {
  return view('/produk/detail');
});
Route::get('/detailProduk/{product:id}', [detailProdukController::class, 'show']);
