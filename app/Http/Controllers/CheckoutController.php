<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{



    public function postCheckout(Request $request)
    {
        // Ambil cart milik user
        $cart = Cart::where('user_id', auth()->id())->with(['items'])->first();

        if ($cart) {
            // Ambil ID produk yang di-checkout
            $productIds = explode(',', $request->input('product_ids'));

            // Buat transaksi baru dengan status "success"
            $transaction = new Transaction();
            $transaction->user_id = auth()->id();
            $transaction->transaction_id = uniqid(); // ID transaksi unik dari Midtrans (atau sesuaikan dengan ID dari Midtrans)
            $transaction->gross_amount = $request->input('gross_amount'); // Total pembayaran
            $transaction->status = 'success';
            $transaction->status_pengiriman = 'Menunggu konfirmasi';
            $transaction->save();

            // Simpan detail transaksi dan hapus item dari keranjang
            foreach ($productIds as $productId) {
                $item = $cart->items()->where('product_id', $productId)->first();
                if ($item) {
                    $transactionItem = new TransactionItem();
                    $transactionItem->transaction_id = $transaction->id;
                    $transactionItem->product_id = $productId;
                    $transactionItem->quantity = $item->quantity;
                    $transactionItem->price = $item->price;
                    $transactionItem->total_price = $item->price * $item->quantity;
                    $transactionItem->save();

                    // Hapus item dari keranjang
                    $item->delete();
                }
            }
        }

        // Redirect ke halaman home
        return redirect('/')->with('success', 'Checkout berhasil, produk akan segera dikirim.');
    }


    public function checkout(Request $request)
    {
        // Ambil ID produk yang dicentang dari request
        $productIds = $request->input('product_ids', []);

        // Validasi jika tidak ada produk yang dipilih
        if (empty($productIds)) {
            return redirect('/keranjang')->with('error', 'Tidak ada produk yang dipilih');
        }

        // Ambil cart milik user
        $cart = Cart::where('user_id', auth()->id())->with(['items.product'])->first();

        // Ambil produk berdasarkan ID yang dipilih dan gabungkan dengan quantity
        $produkYangDipilih = Product::whereIn('id', $productIds)->get();

        // Gabungkan produk dengan quantity yang ada di dalam CartItem
        foreach ($produkYangDipilih as $produk) {
            // Cari CartItem yang sesuai dengan produk ini dalam Cart
            $cartItem = $cart->items->firstWhere('product_id', $produk->id);

            // Jika CartItem ditemukan, tambahkan quantity ke produk
            if ($cartItem) {
                $produk->quantity = $cartItem->quantity;
            } else {
                $produk->quantity = 0; // Jika produk tidak ditemukan di Cart, set quantity ke 0
            }
        }

        // Panggil function calculateGrossAmount untuk menghitung gross_amount dan total_payment
        $grossAmountData = $this->calculateGrossAmount($request, $cart);

        // Kirim data produk yang dipilih dan gross_amount ke view
        return view('keranjang', [
            'produkYangDipilih' => $produkYangDipilih,
            'gross_amount' => $grossAmountData['gross_amount'], // Kirim gross_amount ke view
            'cartItems' => $cart->items, // Kirim cartItems ke view untuk ditampilkan
            'totalPayment' => $grossAmountData['total_payment'], // Kirim total_payment ke view
        ]);
    }



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


    public function calculateGrossAmount(Request $request, $cart)
    {
        $selectedProductIds = $request->input('product_ids', []);

        // Ambil produk berdasarkan ID yang dipilih
        $products = Product::whereIn('id', $selectedProductIds)->get();

        // Gabungkan produk dengan quantity yang ada di dalam CartItem
        $items = $products->map(function ($product) use ($cart) {
            // Cari CartItem yang sesuai dengan produk ini dalam Cart
            $cartItem = $cart->items->firstWhere('product_id', $product->id);

            // Jika CartItem ditemukan, tambahkan quantity ke produk
            $quantity = $cartItem ? $cartItem->quantity : 0;

            return [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
            ];
        })->toArray();

        // Hitung total price
        $totalPrice = array_reduce($items, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        // Diskon 10%
        $discount = 0 * $totalPrice;

        // Ongkos kirim
        $shippingFee = 15000;

        // Hitung gross amount
        $grossAmount = $totalPrice - $discount;

        // Hitung total payment (gross amount + shipping fee)
        $totalPayment = $grossAmount + $shippingFee;

        // Kembalikan data ke controller checkout
        return [
            'gross_amount' => $grossAmount,
            'items' => $items,
            'total_price' => $totalPrice,
            'discount' => $discount,
            'shipping_fee' => $shippingFee,
            'total_payment' => $totalPayment,
        ];
    }
}
