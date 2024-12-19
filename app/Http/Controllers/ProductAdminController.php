<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;


class ProductAdminController extends Controller
{


    public function index()
    {
        // Mengambil semua data produk dari database
        $products = Product::with(['images' => function ($query) {
            $query->select('product_id', 'image_path1', 'image_path2', 'image_path3', 'image_path4'); // Hanya ambil kolom yang diperlukan
        }])->get();
        // Ambil semua kategori untuk dropdown
        $categories = Category::all();


        // Mengirim data produk ke view 'Admin.produk'
        return view('Admin.produk', compact('products', 'categories'));
    }



    // Menampilkan form tambah produk
    // public function create()
    // {
    //     return view('Admin.tambahProduk');
    // }

    public function create()
    {
        $categories = Category::all(); // Mengambil semua kategori
        return view('Admin.tambahProduk', compact('categories'));
    }


    // Menyimpan data produk ke database
    public function store(Request $request)
    {

        $request->validate([
            'image_path1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_path2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_path3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_path4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'product_name' => 'required|string|max:50',
            'price' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'stock' => 'required|integer|min:0',
            'description' => 'required|string|max:500'
        ]);

        // Simpan produk ke dalam database
        $product = Product::create([
            'product_name' => $request->product_name,
            'price' => $request->price,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
            'description' => $request->description,
        ]);

        // Simpan gambar ke tabel `images`
        $imageData = [];
        if ($request->hasFile('image_path1')) {
            $imageData['image_path1'] = $request->file('image_path1')->store('images', 'public');
        }
        if ($request->hasFile('image_path2')) {
            $imageData['image_path2'] = $request->file('image_path2')->store('images', 'public');
        }
        if ($request->hasFile('image_path3')) {
            $imageData['image_path3'] = $request->file('image_path3')->store('images', 'public');
        }
        if ($request->hasFile('image_path4')) {
            $imageData['image_path4'] = $request->file('image_path4')->store('images', 'public');
        }

        // Hubungkan gambar ke produk
        if (!empty($imageData)) {
            $product->images()->create($imageData);
        }


        return redirect()->route('Admin.produk')->with('success', 'Produk berhasil ditambahkan.');
    }
}
