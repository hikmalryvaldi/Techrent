<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\Carousel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Method untuk pencarian produk
    public function search(Request $request)
    {
        $search = $request->input('search');

        // Jika pencarian kosong, kembalikan response kosong
        if (empty($search)) {
            return response()->json([]);
        }

        // Melakukan pencarian produk berdasarkan nama produk
        $products = Product::where('product_name', 'like', '%' . $search . '%')
            ->limit(5)  // Menampilkan 5 produk teratas
            ->get();

        return response()->json($products);  // Mengembalikan data produk dalam format JSON
    }

    public function show($id)
    {
        // Mengambil produk berdasarkan ID
        $product = Product::findOrFail($id);

        // Mengembalikan view produk detail
        return view('produk.detailProduk', compact('product'));
    }

    public function homeFeatures()
    {
        // Produk Unggulan
        $topProducts = Product::with('images')
            ->orderBy('rental_count', 'desc')
            ->take(3)
            ->get();

        // Carousels
        return view('home', [
            'title' => 'Home',
            'carousels' => Carousel::all(),
            'topProducts' => $topProducts,
        ]);
    }
}
