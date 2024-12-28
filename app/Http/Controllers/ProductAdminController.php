<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;


class ProductAdminController extends Controller
{


    public function index(Request $request)
    {
        $search = $request->input('search'); // Ambil query pencarian
        $categorySlug = $request->input('category', ''); // Ambil parameter kategori


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

        // Filter berdasarkan pencarian dalam lingkup kategori
        if ($search) {
            $productsQuery->where('product_name', 'like', '%' . $search . '%');
        }


        $products = $productsQuery->paginate(10)->appends($request->query());

        // Ambil semua kategori untuk dropdown
        $categories = Category::all();

        return view('Admin.produk', compact('products', 'categories', 'categorySlug', 'search'));
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
            $html = view('Admin/partials.partialproduk', compact('products', 'categories'))->render();
        }

        return response()->json(['html' => $html]);
    }

    function pdf()
    {
        $mpdf = new \Mpdf\Mpdf();

        // Query produk dengan relasi gambar dan kategori
        $products = Product::with(['images', 'category'])->get();

        // Generate HTML secara langsung
        $html = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Daftar Produk</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 0;
                    padding: 20px;
                    background-color: #f9f9f9;
                }
                h1 {
                    text-align: center;
                    color: #333;
                    margin-bottom: 20px;
                }
                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin: 0 auto;
                    background-color: #fff;
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                }
                th, td {
                    border: 1px solid #ddd;
                    padding: 10px;
                    text-align: center;
                    font-size: 14px;
                }
                th {
                    background-color: #424242;
                    color: white;
                    font-weight: bold;
                }
                td img {
                    width: 80px;
                    height: 80px;
                    object-fit: cover;
                    border-radius: 5px;
                }
                tr:nth-child(even) {
                    background-color: #f2f2f2;
                }
                tr:hover {
                    background-color: #ddd;
                }
            </style>
        </head>
        <body>
            <h1>Daftar Produk</h1>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Image</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>';

        foreach ($products as $index => $product) {
            $html .= '<tr>
                    <td>' . ($index + 1) . '</td>
                    <td>';
            foreach ($product->images as $image) {
                $html .= '<img src="' . public_path('storage/' . $image->image_path1) . '" alt="Product Image">';
            }
            $html .= '</td>
                    <td>' . $product->product_name . '</td>
                    <td>' . ($product->category->name ?? 'N/A') . '</td>
                    <td>Rp ' . number_format($product->price, 0, ',', '.') . '</td>
                    <td>' . $product->stock . '</td>
                </tr>';
        }

        $html .= '</tbody>
            </table>
        </body>
        </html>';

        // Generate PDF
        $mpdf->WriteHTML($html);
        $mpdf->Output('daftar-produk-techrent.pdf', \Mpdf\Output\Destination::INLINE);
    }
}
