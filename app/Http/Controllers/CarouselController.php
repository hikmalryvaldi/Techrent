<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Carousel;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    public function carousel()
    {
        return view('home', [
            'title' => 'Home',
            'carousels' => Carousel::all(),
            'topProduct' => Product::orderBy('rental_count', 'desc')->take(5)->get(), // Menampilkan 3 produk dengan rental_count tertinggi
        ]);
    }
}
