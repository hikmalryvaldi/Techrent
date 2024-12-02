<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FeaturedProductController extends Controller
{
    public function index()
    {
        // Ambil 3 produk dengan rental_count tertinggi
        $topProducts = Product::orderBy('rental_count', 'desc')
            ->take(3)
            ->get();

        // Kirim data ke view home
        return view('home', compact('topProducts'));
    }
}
