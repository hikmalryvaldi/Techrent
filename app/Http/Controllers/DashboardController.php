<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil jumlah data dari tabel
        $produkCount = Product::count();
        $userCount = User::count();
        $completedOrders = Transaction::where('status_pengiriman', 'Selesai')->count();

        // Mengirim data ke view
        return view('Admin.dashboard', compact('produkCount', 'userCount', 'completedOrders'));
    }
}
