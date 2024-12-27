<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class DiskonAdminController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search'); // Ambil query pencarian
        $categorySlug = $request->input('category', ''); // Ambil parameter kategori
        $lastDays = $request->input('last_days', null); // Ambil parameter "last days"

        // Query produk dengan relasi gambar dan kategori
        $productsQuery = Product::with(['images' => function ($query) {
            $query->select('product_id', 'image_path1', 'image_path2', 'image_path3', 'image_path4'); // Hanya kolom yang diperlukan
        }, 'category']);

        // Filter berdasarkan kategori jika slug kategori diberikan
        if (!empty($categorySlug)) {
            $productsQuery->whereHas('category', function ($query) use ($categorySlug) {
                $query->where('slug', $categorySlug);
            });
        }

        // Filter berdasarkan pencarian
        if (!empty($search)) {
            $productsQuery->where('product_name', 'like', '%' . $search . '%');
        }

        // Filter berdasarkan "last days"
        if (!empty($lastDays)) {
            $productsQuery->where('created_at', '>=', now()->subDays($lastDays));
        }

        // Dapatkan produk dengan pagination
        $products = $productsQuery->paginate(10)->appends($request->query());

        // Ambil semua kategori untuk dropdown
        $categories = Category::all();


        return view('Admin.diskon', compact('products', 'categories', 'categorySlug', 'search', 'lastDays'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search', ''); // Kata kunci pencarian
        $categorySlug = $request->input('category', ''); // Slug kategori, jika ada

        // Query produk dengan relasi gambar dan kategori
        $productsQuery = Product::with(['images' => function ($query) {
            $query->select('product_id', 'image_path1', 'image_path2', 'image_path3', 'image_path4'); // Hanya kolom yang diperlukan
        }, 'category']);

        // Filter berdasarkan kategori jika slug kategori diberikan
        if (!empty($categorySlug)) {
            $productsQuery->whereHas('category', function ($query) use ($categorySlug) {
                $query->where('slug', $categorySlug);
            });
        }

        // Filter berdasarkan kata kunci pencarian
        if (!empty($searchTerm)) {
            $productsQuery->where('product_name', 'LIKE', '%' . $searchTerm . '%');
        }

        $products = $productsQuery->paginate(10)->appends($request->query()); // Ambil data produk

        // Jika produk kosong, kembalikan pesan
        if ($products->isEmpty()) {
            $html = '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
        <td class="text-center py-4" colspan="7">Produk Tidak Ditemukan.</td>
    </tr>';
        } else {
            $categories = Category::all(); // Ambil semua kategori
            $html = view('admin/partials.partialdiskon', compact('products', 'categories'))->render();
        }

        return response()->json(['html' => $html]);
    }
}
