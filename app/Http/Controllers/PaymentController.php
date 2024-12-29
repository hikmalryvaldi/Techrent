<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;

class PaymentController extends Controller
{
    public function createTransaction(Request $request)
    {
        Config::$serverKey = 'SB-Mid-server-Rqanz3cJrqC9pslQVdmXY7tT';
        Config::$clientKey = 'SB-Mid-client-Hvs6JvDsHpoAs8kG';
        Config::$isProduction = false;

        // Ambil data dari request
        $grossAmount = $request->gross_amount;
        $firstName = $request->first_name;
        $lastName = $request->last_name;
        $email = $request->email;
        $phone = $request->phone;
    
        // Buat transaksi
        $transaction = [
            'transaction_details' => [
                'order_id' => 'order-' . time(),
                'gross_amount' => $grossAmount,
            ],
            'customer_details' => [
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email' => $email,
                'phone' => $phone,
            ],
        ];
    
        try {
            // Mendapatkan Snap Token
            $snapToken = Snap::getSnapToken($transaction);
            return response()->json(['snap_token' => $snapToken]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}