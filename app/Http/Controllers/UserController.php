<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'phone' => 'required|numeric|unique:users,phone,' . auth()->id(),
            'address' => 'string|max:255',
            'latitude' => 'string|max:255',
            'longitude' => 'string|max:255',
        ]);

        $user = auth()->user(); // Ambil user yang sedang login
        $user->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return redirect()->route('profile')->with('success', 'Profile berhasil diperbarui.');
    }

    public function indexPerluDikirim()
    {
        // Mengambil data user dengan relasi transaksi dan item
        $transactions = Transaction::with(['user', 'transactionItems' => function ($query) {
            $query->with('product:id,product_name,price');  // Memuat relasi dengan produk hanya dengan 'id', 'product_name', dan 'price'
        }])
        ->where('user_id', Auth::id())  // Filter transaksi berdasarkan user yang sedang login
        ->where('status_pengiriman', 'Menunggu konfirmasi')  // Filter transaksi berdasarkan user yang sedang login
        ->where('status', 'success')  // Filter transaksi berdasarkan user yang sedang login
        ->get();

        foreach ($transactions as $transaction) {
            $transaction->total_price = $transaction->transactionItems->sum(function ($item) {
                // Menghitung harga total per item: price * quantity
                return $item->product->price * $item->quantity;
            });
        }

        // Return ke view dengan data
        return view('user.profile2', compact('transactions'));
    }

    public function indexDikirim()
    {
        // Mengambil data user dengan relasi transaksi dan item
        $transactions = Transaction::with(['user' => function ($query) {
            $query->select('id', 'latitude', 'longitude');  // Selecting only 'id', 'latitude', 'longitude' from the user
        }, 'transactionItems' => function ($query) {
            $query->with('product:id,product_name,price');  // Loading product relationship with 'id', 'product_name', 'price'
        }])
        ->where('user_id', Auth::id())  // Filter transaksi berdasarkan user yang sedang login
        ->where('status_pengiriman', 'Menunggu konfirmasi')  // Filter transaksi berdasarkan status pengiriman
        ->where('status', 'success')  // Filter transaksi berdasarkan status
        ->get();

        foreach ($transactions as $transaction) {
            $transaction->total_price = $transaction->transactionItems->sum(function ($item) {
                // Menghitung harga total per item: price * quantity
                return $item->product->price * $item->quantity;
            });
        }

        // Return ke view dengan data
        return view('user.profile3', compact('transactions'));
    }
}
