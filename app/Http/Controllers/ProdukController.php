<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProdukController extends Controller
{

// Menampilkan halaman produk
public function index(Request $request)
{

    $search = $request->input('search'); // Ambil query pencarian
    $categorySlug = $request->input('category'); // Ambil parameter kategori dari URL

    // Query dasar produk
    $productsQuery = Product::with(['images' => function ($query) {
        $query->select('product_id', 'image_path1', 'image_path2', 'image_path3', 'image_path4');
    }]);

    // Filter berdasarkan kategori
    if ($categorySlug) {
        $category = Category::where('slug', $categorySlug)->first();

        if ($category) {
            $productsQuery->where('category_id', $category->id);
        }
    }

    // Filter berdasarkan pencarian dalam lingkup kategori
    if ($search) {
        $productsQuery->where('product_name', 'like', '%' . $search . '%');
    }

    // Ambil hasil query
    $products = $productsQuery->latest()->get();

    return view('produk.index', [
        'title' => 'Produk Kami',
        'products' => $products,
        'currentCategory' => $categorySlug,
        'search' => $search,
    ]);
}

public function search(Request $request)
    {

        if ($request->ajax()) {
            $search = $request->input('search');
            $categorySlug = $request->input('category'); // Ambil parameter kategori dari request

            // Query dasar produk
            $productsQuery = Product::with('images');

            // Filter berdasarkan kategori jika tersedia
            if ($categorySlug) {
                $category = Category::where('slug', $categorySlug)->first();
                if ($category) {
                    $productsQuery->where('category_id', $category->id);
                }
            }

            // Filter berdasarkan nama produk
            if ($search) {
                $productsQuery->where('product_name', 'like', '%' . $search . '%');
            }

            // Ambil hasil query
            $products = $productsQuery->get();

            // Jika produk tidak ditemukan
            if ($products->isEmpty()) {
                return '<p class="text-gray-600">Produk tidak ditemukan.</p>';
            }

            // Generate output HTML langsung sesuai kode Blade Anda
            $output = '';
            foreach ($products as $product) {
                $output .= '
                <div class="bg-white shadow-md rounded-lg overflow-hidden">';

                // Menampilkan gambar produk
                foreach ($product->images as $image) {
                    if ($image->image_path1 && file_exists(public_path(ltrim($image->image_path1, '/')))) {
                        // Gambar dari Seeder
                        $output .= '
                        <img src="' . asset(ltrim($image->image_path1, '/')) . '" 
                             alt="' . $product->product_name . '" 
                             class="w-full h-64 object-cover">';
                    } else {
                        // Gambar dari Storage
                        $output .= '
                        <img src="' . asset('storage/' . $image->image_path1) . '" 
                             alt="' . $product->product_name . '" 
                             class="w-full h-64 object-cover">';
                    }
                    break; // Tampilkan hanya 1 gambar pertama
                }

                $output .= '
                    <div class="p-4">
                        <h2 class="text-xl font-semibold">' . $product->product_name . '</h2>
                        <p class="text-gray-600 mt-2">' . $product->description . '</p>
                        <p class="text-lg font-semibold text-green-600 mt-2">Rp '
                    . number_format($product->price) . '/hari</p>
                        <a href="/detailProduk/' . $product->id . '" 
                           class="inline-block mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                            Sewa Sekarang
                        </a>
                    </div>
                </div>';
            }

            return $output;
        }
    }

    // public function detailProduk()
    // {
    //     return view('produk.detailProduk');
    // }
}
