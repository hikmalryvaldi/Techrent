<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function keranjangCheckout(Request $request)
    {
        // Ambil user yang sedang login
        $user = auth()->user();

        // Ambil cart milik user
        $cart = $user->cart; // Mengambil cart milik user

        if (!$cart) {
            return redirect()->back()->with('error', 'Cart tidak ditemukan.');
        }

        // Ambil semua cartItems yang ada pada cart
        $cartItems = $cart->items()->with('product')->get(); // Memastikan untuk memuat relasi 'product'

        // Map data untuk dikirim ke view
        $items = $cartItems->map(function ($cartItem) {
            return [
                'name' => $cartItem->product->name, // Mengambil nama produk
                'price' => $cartItem->product->price, // Mengambil harga produk
                'quantity' => $cartItem->quantity, // Mengambil jumlah produk dalam keranjang
            ];
        });

        // Hitung total harga
        $totalPrice = $items->sum(function ($item) {
            return $item['price'] * $item['quantity']; // Menghitung total harga
        });

        // Kirim data ke view
        return view('keranjang', [
            'cartItems' => $cartItems, // Kirim data cartItems ke view
            'totalPrice' => $totalPrice, // Kirim total harga ke view
        ]);
    }


        public function calculateGrossAmount(Request $request)
    {
        // Ambil data keranjang dari input
        $selectedProductIds = $request->input('product_ids', []);
        $quantities = $request->input('quantities', []);

        // Ambil produk dari database
        $products = Product::whereIn('id', $selectedProductIds)->get();

        // Bangun struktur $items
        $items = $products->map(function ($product) use ($quantities) {
            return [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantities[$product->id] ?? 1, // Default quantity 1 jika tidak dikirim
            ];
        })->toArray();

        // Hitung total harga
        $totalPrice = array_reduce($items, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        // Diskon (contoh 10%)
        $discount = 0.1 * $totalPrice;

        // Ongkir tetap
        $shippingFee = 15000;

        // Gross amount = total harga - diskon + ongkir
        $grossAmount = $totalPrice - $discount + $shippingFee;

        return response()->json([
            'gross_amount' => $grossAmount,
            'items' => $items,
            'total_price' => $totalPrice,
            'discount' => $discount,
            'shipping_fee' => $shippingFee,
        ]);
    }
}
