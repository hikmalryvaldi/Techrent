<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DiskonAdminController extends Controller
{
    public function show()
    {
        $products = Product::whereNotNull('discount')->with('category')->with('images')->get();

        return view('Admin.diskon', compact('products'));
    }
}
