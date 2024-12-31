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

    public function add(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
    
        // Ambil keranjang yang sudah ada, atau buat yang baru jika belum ada
        $keranjang = Cart::firstOrCreate([
            'user_id' => Auth::id(),  // Gunakan ID pengguna yang sedang login
        ]);
    
        // Ambil data dari request (quantity dan rental_duration)
        $quantity = $request->input('quantity'); // Default ke 1 jika tidak ada input quantity
        $rentalDuration = $request->input('rental_duration'); // Default ke 1 hari jika tidak ada pilihan
    
        // Cek jika produk sudah ada di keranjang
        $keranjangItem = $keranjang->items()->where('product_id', $product->id)->first();
    
        if ($keranjangItem) {
            // Jika produk sudah ada, update quantity-nya
            $keranjangItem->quantity += $quantity;
            $keranjangItem->save();
        } else {
            // Jika produk belum ada di keranjang, tambahkan item baru
            $keranjang->items()->create([
                'product_id' => $product->id,
                'quantity' => $quantity,
                'price' => $product->price,  // Simpan harga produk saat ditambahkan
                'rental_duration' => $rentalDuration, // Simpan durasi peminjaman
            ]);
        }
    
        session()->flash('added_to_cart', $product);
    
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function drop(Request $request)
    {
        $productIds = $request->input('product_ids');  // Ambil ID produk yang dipilih
        $keranjang = Cart::where('user_id', Auth::id())->first();
        
        // Menghapus produk berdasarkan ID
        $keranjang->items()->whereIn('product_id', $productIds)->delete();

        return redirect()->back()->with('successDelete', 'Produk berhasil dihapus dari keranjang!');
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
