<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Mail\Newsletter;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Mail\NewsletterSubscription;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    public function newsletter(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $subscribers = Subscriber::all();

        // Kirim email ke setiap subscriber
        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)->send(new Newsletter($request->subject, $request->message));
        }
    }

    public function subscribe(Request $request)
    {

        $request->validate([
            'email' => 'required|email'
        ]);

        // Simpan produk ke dalam database
        Subscriber::create([
            'email' => $request->email,
        ]);

        // Redirect ke halaman utama
        return redirect('/')->with('success', 'Email berhasil dikirim!');
    }

    public function search(Request $request)
    {

        $search = $request->input('search');

        if (empty($search)) {
            return response()->json([]);
        }

        // Cari produk berdasarkan nama
        $products = Product::where('product_name', 'like', '%' . $search . '%')
            ->limit(5)
            ->get();

        return response()->json($products);
    }
}
