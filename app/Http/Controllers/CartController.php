<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        return view('keranjang');
    }

    public function add($productId)
    {
        $product = Product::findOrFail($productId);

        // Ambil keranjang yang sudah ada, atau buat yang baru jika belum ada
        $keranjang = Cart::firstOrCreate([
            'user_id' => Auth::id(),  // Gunakan ID pengguna yang sedang login
        ]);

        // Cek jika produk sudah ada di keranjang
        $keranjangItem = $keranjang->items()->where('product_id', $product->id)->first();

        if ($keranjangItem) {
            // Jika produk sudah ada, update quantity-nya
            $keranjangItem->quantity += 1;
            $keranjangItem->save();
        } else {
            // Jika produk belum ada di keranjang, tambahkan item baru
            $keranjang->items()->create([
                'product_id' => $product->id,
                'quantity' => 1,
                'price' => $product->price,  // Simpan harga produk saat ditambahkan
            ]);
        }

        session()->flash('added_to_cart', $product);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function getCartItems()
    {
        // Ambil produk yang ada di dalam keranjang berdasarkan pengguna yang sedang login
        $cartItems = CartItem::with('product')->where('user_id', auth()->id())->get();

        // Format data untuk dikirim ke view
        $produkDalamKeranjang = $cartItems->items->map(function ($item) {
            return $item->product; // Mengakses relasi product dari CartItem
        });
    
        // Kirim data ke view
        return view('components.navbar', compact('items'));
    }
    


    
}
