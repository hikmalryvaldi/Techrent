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
        $products = Product::all();

        // Mengirim data produk ke view 'Admin.produk'
        return view('Admin.produk', compact('products'));
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
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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

        // Menyimpan gambar di tabel 'images' satu per satu
        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $index => $image) {
                $imagePath = $image->storeAs('public/images', 'image_' . time() . '_' . $index . '.' . $image->getClientOriginalExtension());
                $imagePaths['image_path' . ($index + 1)] = $imagePath;
            }

            // Menyimpan gambar ke dalam tabel 'images' sesuai dengan produk
            $product->images()->create($imagePaths);
        }

        return redirect()->route('Admin.produk')->with('success', 'Produk berhasil ditambahkan.');
    }
}
