<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Mail\Newsletter;
use App\Models\Discount;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Mail\NewsletterSubscription;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    public function newsletter(Request $request)
    {

        $request->validate(['message' => 'required|string', 'subject' => 'required|string',]);
        $subscribers = Subscriber::all(); // Kirim email ke setiap subscriber
        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)->send(new Newsletter($request->subject, $request->message));
        }
        return redirect('/Admin/nNewsletterCustom')->with('success', 'Email berhasil dikirim!');
        // $request->validate([
        //     'message' => 'required|string',
        // ]);

        // $subscribers = Subscriber::all();

        // // Kirim email ke setiap subscriber
        // foreach ($subscribers as $subscriber) {
        //     Mail::to($subscriber->email)->send(new Newsletter($request->subject, $request->message));
        // }
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

        $discountedProducts = Discount::whereHas('product', function ($query) use ($search) {
            $query->where('product_name', 'like', '%' . $search . '%');
        })
            ->where('discount_value', '>', 0) // Pastikan ada nilai diskon yang valid
            ->with(['product:id,product_name', 'product.images:id,product_id,image_path1']) // Tambahkan relasi gambar
            ->select(['product_id', 'discount_value'])
            ->limit(5)
            ->get();

        $formattedProducts = $discountedProducts->map(function ($discount) {
            $images = $discount->product->images->map(function ($image) {
                return ['image_url' => asset('storage/' . $image->image_path1)];
            });
            return [
                'id' => $discount->product_id,
                'product_name' => $discount->product->product_name,
                'discount_value' => $discount->discount_value,
                'images' => $images
            ];
        });

        return response()->json($formattedProducts);
    }


    public function sendCustomEmail(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_name = $request->input('product_name');
        $discount_value = $request->input('discount_value');
        $images = json_decode($request->input('images'), true);

        $subscribers = Subscriber::all();

        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)->send(new Newsletter(
                $request->subject,
                $product_name,
                $discount_value,
                $images
            ));
        }

        return redirect('/Admin/nNewsletterDiskon')->with('success', 'Email berhasil dikirim!');
    }
}
