<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DetailProdukController extends Controller
{
    public function show(Product $product){
        $product->load('images');

        return view('produk.detailProduk', ['product' => $product]);
    }
}
