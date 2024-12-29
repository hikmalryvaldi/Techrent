<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function keranjangCheckout(Request $request)
    {
        $user = auth()->user();

        $cart = $user->cart; // Mengambil cart milik user

        if (!$cart) {
            return redirect()->back()->with('error', 'Cart tidak ditemukan.');
        }

        $cartItems = $cart->items()->with('product')->get();

        $items = $cartItems->map(function ($cartItem) {
            return [
                'name' => $cartItem->product->name,
                'price' => $cartItem->product->price,
                'quantity' => $cartItem->quantity,
            ];
        });

        $totalPrice = $items->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        return view('keranjang', [
            'cartItems' => $cartItems,
            'totalPrice' => $totalPrice,
        ]);
    }


        public function calculateGrossAmount(Request $request)
    {
        $selectedProductIds = $request->input('product_ids', []);
        $quantities = $request->input('quantities', []);

        $products = Product::whereIn('id', $selectedProductIds)->get();

        $items = $products->map(function ($product) use ($quantities) {
            return [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantities[$product->id] ?? 1,
            ];
        })->toArray();

        $totalPrice = array_reduce($items, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        $discount = 0.1 * $totalPrice;

        $shippingFee = 15000;

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
