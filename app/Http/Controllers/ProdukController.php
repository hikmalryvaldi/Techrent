<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProdukController extends Controller
{
    public function index()
    {
        return view('produk.index');
    }

    public function detailProduk()
    {
        return view('produk.detail-produk');
    }
}
