<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil jumlah data dari tabel
        $produkCount = Product::count();
        $userCount = User::count();

        // Mengirim data ke view
        return view('Admin.dashboard', compact('produkCount', 'userCount'));
    }
}
