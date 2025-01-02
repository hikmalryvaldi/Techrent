<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Product;
use Midtrans\Notification;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionItem;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function lol(Request $request){
        dd($request);
    }
    
public function createTransaction(Request $request)
{
    // Set konfigurasi Midtrans
    Config::$serverKey = config('services.midtrans.server_key');
    Config::$clientKey = config('services.midtrans.client_key');
    Config::$isProduction = false;

    // Ambil data dari request (dari form atau frontend)
    $grossAmount = $request->gross_amount;
    $firstName = $request->first_name;
    $lastName = $request->last_name;
    $email = $request->email;
    $phone = $request->phone;
    $paymentType = $request->payment_type; 
    
    // Ambil user_id dari Auth
    $userId = Auth::user()->id;

    // Data Dummy Produk (ID produk, harga, nama)
    $dummyProducts = [
        1 => ['name' => 'Product A', 'price' => 50000], // Product ID 1
        2 => ['name' => 'Product B', 'price' => 30000], // Product ID 2
    ];


    // Data Dummy untuk ID produk yang dibeli dan kuantitas
    // Misal, pengguna membeli Product ID 1 sebanyak 2 dan Product ID 2 sebanyak 3
    $productIds = [1, 2];     
    $quantities = [2, 3];       // Jumlah produk yang dibeli

    // Hitung gross amount (jumlah total dari produk * quantity)
    $grossAmount = $request->gross_amount;


    // Buat transaksi di database
    $transaction = new Transaction();
    $transaction->transaction_id = 'order-' . time(); // ID transaksi yang unik
    $transaction->user_id = $userId; // Relasikan transaksi dengan user yang sedang login
    $transaction->gross_amount = $grossAmount;
    $transaction->status = 'pending'; // Status awal adalah pending
    $transaction->status_pengiriman = 'Menunggu konfirmasi'; // Status awal adalah pending
    $transaction->save(); // Simpan transaksi ke database

    // Data transaksi yang akan dikirim ke Midtrans
    $transactionData = [
        'transaction_details' => [
            'order_id' => $transaction->transaction_id,
            'gross_amount' => $transaction->gross_amount,
        ],
        'customer_details' => [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
            'phone' => $phone,
            'user_id' => $userId, // Mengirim user_id
        ],
    ];

    if ($paymentType) {
        $transaction['payment_type'] = $paymentType;
    }

    try {
        // Mendapatkan Snap Token dari Midtrans
        $snapToken = Snap::getSnapToken($transactionData);

        // Menyimpan item transaksi ke tabel transaction_items
        foreach ($productIds as $index => $productId) {
            // Ambil produk berdasarkan ID dari data dummy
            $product = $dummyProducts[$productId] ?? null;

            if ($product) {
                $price = $product['price'];
                $quantity = $quantities[$index]; // Jumlah produk yang dibeli
                $totalPrice = $price * $quantity; // Total harga produk

                // Menambahkan data item transaksi ke tabel transaction_items
                TransactionItem::create([
                    'transaction_id' => $transaction->id, // Menghubungkan dengan transaksi
                    'product_id' => $productId,            // ID produk yang dibeli
                    'quantity' => $quantity,               // Jumlah produk yang dibeli
                    'price' => $price,                     // Harga per unit produk
                    'total_price' => $totalPrice,          // Total harga (quantity * price)
                ]);
            }
        }

        // Kembalikan snap token ke frontend
        return response()->json(['snap_token' => $snapToken, 'order_id' => $transaction->transaction_id]);
    } catch (\Exception $e) {
        // Jika terjadi error
        return response()->json(['error' => $e->getMessage()]);
    }
}



    public function handleMidtransNotification(Request $request)
    {
        // Ambil data dari request notifikasi yang dikirimkan oleh Midtrans
        $orderId = $request->order_id;

        $statusCode = $request->status_code;
        $grossAmount = $request->gross_amount;
        $paymentType = $request->payment_type;

        // Ambil transaksi berdasarkan order_id
        $transaction = Transaction::where('transaction_id', $orderId)->first();

        // Cek apakah transaksi ditemukan
        if ($transaction) {
            // Menangani status berdasarkan status code
            if ($statusCode == 200) {
                // Transaksi sukses (settlement)
                $transaction->status = 'success';
            } elseif ($statusCode == 201) {
                // Transaksi pending (belum selesai)
                $transaction->status = 'pending';
            } elseif ($statusCode == 202) {
                // Transaksi ditolak
                $transaction->status = 'failed';
            } else {
                // Jika status tidak dikenali, mark sebagai error
                $transaction->status = 'error';
            }

            // Update informasi lain yang diterima dari Midtrans
            $transaction->gross_amount = $grossAmount;
            $transaction->payment_type = $paymentType;

            // Simpan perubahan status transaksi ke database
            $transaction->save();

            // Log untuk debugging atau verifikasi
            Log::info('Transaction status updated', [
                'order_id' => $orderId,
                'new_status' => $transaction->status,
                'transaction_id' => $transaction->transaction_id,
            ]);

            // Mengirimkan response sukses jika transaksi berhasil diproses
            return response()->json(['status' => 'success']);
        } else {
            // Jika transaksi tidak ditemukan
            return response()->json(['status' => 'error', 'message' => 'Transaction not found']);
        }
    }
}