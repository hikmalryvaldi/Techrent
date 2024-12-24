<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;


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
            $imageData['image_path1'] = '/' . $request->file('image_path1')->store('images', 'public');
        }
        if ($request->hasFile('image_path2')) {
            $imageData['image_path2'] = '/' . $request->file('image_path2')->store('images', 'public');
        }
        if ($request->hasFile('image_path3')) {
            $imageData['image_path3'] = '/' . $request->file('image_path3')->store('images', 'public');
        }
        if ($request->hasFile('image_path4')) {
            $imageData['image_path4'] = '/' . $request->file('image_path4')->store('images', 'public');
        }

        // Hubungkan gambar ke produk
        if (!empty($imageData)) {
            $product->images()->create($imageData);
        }


        return redirect()->route('Admin.produk')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit produk
     *
     * @param  mixed $id
     * @return View
     */
    public function edit($id): view
    {

        // Ambil data produk berdasarkan ID
        $products = Product::with('images')->findOrFail($id);

        // Ambil semua kategori untuk dropdown
        $categories = Category::all();

        // Tampilkan form edit produk dengan data produk dan kategori
        return view('Admin.produk', compact('products', 'categories'));
    }


    /**
     * Mengupdate data produk
     *
     * @param  Request  $request
     * @param  mixed $id
     * @return RedirectResponse
     */

    public function update(Request $request, $id)
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
            'description' => 'required|string|max:500',
        ]);

        // Cari produk berdasarkan ID
        $product = Product::with('images')->findOrFail($id);


        // Perbarui data produk
        $product->update([
            'product_name' => $request->product_name,
            'price' => $request->price,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
            'description' => $request->description,
        ]);


        $existingImages = $product->images()->first();

        if ($request->hasFile('image_path1')) {
            if ($request->oldImage1) {
                if ($request->oldImage1) {
                    if (Storage::disk('public')->exists($request->oldImage1)) {
                        Storage::disk('public')->delete($request->oldImage1);
                    }
                }
            }

            $newPath1 = $request->file('image_path1')->store('images', 'public');
            $existingImages->update(['image_path1' => $newPath1]);
        }

        if ($request->hasFile('image_path2')) {
            if ($request->oldImage2) {
                if ($request->oldImage2) {
                    if (Storage::disk('public')->exists($request->oldImage2)) {
                        Storage::disk('public')->delete($request->oldImage2);
                    }
                }
            }

            $newPath2 = $request->file('image_path2')->store('images', 'public');
            $existingImages->update(['image_path2' => $newPath2]);
        }

        if ($request->hasFile('image_path3')) {
            if ($request->oldImage3) {
                if ($request->oldImage3) {
                    if (Storage::disk('public')->exists($request->oldImage3)) {
                        Storage::disk('public')->delete($request->oldImage3);
                    }
                }
            }

            $newPath3 = $request->file('image_path3')->store('images', 'public');
            $existingImages->update(['image_path3' => $newPath3]);
        }

        if ($request->hasFile('image_path4')) {
            if ($request->oldImage4) {
                if ($request->oldImage4) {
                    if (Storage::disk('public')->exists($request->oldImage4)) {
                        Storage::disk('public')->delete($request->oldImage4);
                    }
                }
            }

            $newPath4 = $request->file('image_path1')->store('images', 'public');
            $existingImages->update(['image_path4' => $newPath4]);
        }



        return redirect()->route('Admin.produk')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $product = Product::with('images')->findOrFail($id);

        foreach ($product->images as $image) {
            if ($image->image_path1 && Storage::disk('public')->exists($image->image_path1)) {
                Storage::disk('public')->delete($image->image_path1);
            }
            if ($image->image_path2 && Storage::disk('public')->exists($image->image_path2)) {
                Storage::disk('public')->delete($image->image_path2);
            }
            if ($image->image_path3 && Storage::disk('public')->exists($image->image_path3)) {
                Storage::disk('public')->delete($image->image_path3);
            }
            if ($image->image_path4 && Storage::disk('public')->exists($image->image_path4)) {
                Storage::disk('public')->delete($image->image_path4);
            }
        }

        $product->images()->delete();
        $product->delete();

        return redirect()->route('Admin.produk')->with('success', 'Produk berhasil dihapus beserta gambar terkait.');
    }
}
