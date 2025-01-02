<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\CartItem;

class PesananController extends Controller
{
    public function indexPerluDikirim()
    {
        // Mengambil data user dengan relasi transaksi dan item
        $transactions = Transaction::with(['user', 'transactionItems' => function($query) {
            $query->with('product:id,product_name,price');  // Memuat relasi dengan produk hanya dengan 'id' dan 'name'
        }])
        ->whereHas('transactionItems')  // Memastikan hanya transaksi yang memiliki item yang diambil
        ->where('status', 'success')  // Hanya transaksi yang berstatus "success"
        ->where('status_pengiriman', 'Menunggu konfirmasi')
        ->get();

        foreach ($transactions as $transaction) {
            $transaction->total_price = $transaction->transactionItems->sum(function($item) {
                // Menghitung harga total per item: price * quantity
                return $item->product->price * $item->quantity;
            });
        }

        // Return ke view dengan data
        return view('Admin.mperluDikirim', compact('transactions'));
    }

    public function indexDikemas()
    {
        // Mengambil data user dengan relasi transaksi dan item
        $transactions = Transaction::with(['user', 'transactionItems' => function($query) {
            $query->with('product:id,product_name,price');  // Memuat relasi dengan produk hanya dengan 'id' dan 'name'
        }])
        ->whereHas('transactionItems')  // Memastikan hanya transaksi yang memiliki item yang diambil
        ->where('status', 'success')  // Hanya transaksi yang berstatus "success"
        ->where('status_pengiriman', 'Dikemas')
        ->get();

        foreach ($transactions as $transaction) {
            $transaction->total_price = $transaction->transactionItems->sum(function($item) {
                // Menghitung harga total per item: price * quantity
                return $item->product->price * $item->quantity;
            });
        }

        // Return ke view dengan data
        return view('Admin.mDikemas', compact('transactions'));
    }

    public function indexDikirim()
    {
        // Mengambil data user dengan relasi transaksi dan item
        $transactions = Transaction::with(['user', 'transactionItems' => function($query) {
            $query->with('product:id,product_name,price');  // Memuat relasi dengan produk hanya dengan 'id' dan 'name'
        }])
        ->whereHas('transactionItems')  // Memastikan hanya transaksi yang memiliki item yang diambil
        ->where('status', 'success')  // Hanya transaksi yang berstatus "success"
        ->where('status_pengiriman', 'Dikirim')
        ->get();

        foreach ($transactions as $transaction) {
            $transaction->total_price = $transaction->transactionItems->sum(function($item) {
                // Menghitung harga total per item: price * quantity
                return $item->product->price * $item->quantity;
            });
        }

        // Return ke view dengan data
        return view('Admin.mDikirim', compact('transactions'));
    }

    public function kemasPesanan(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required|exists:transactions,transaction_id',
        ]);
    
        $transaction = Transaction::where('transaction_id', $request->transaction_id)->firstOrFail();
        $transaction->status_pengiriman = 'Dikemas';
        $transaction->save();
    
        return redirect()->back()->with('success', 'Status berhasil diperbarui ke "Dikemas".');
    }

    public function kirimPesanan(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required|exists:transactions,transaction_id',
        ]);
    
        $transaction = Transaction::where('transaction_id', $request->transaction_id)->firstOrFail();
        $transaction->status_pengiriman = 'Dikirim';
        $transaction->save();
    
        return redirect()->back()->with('success', 'Status berhasil diperbarui ke "Dikirim".');
    }
    
}
