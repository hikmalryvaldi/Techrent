<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\LupaPasswordOtp;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class LupaPasswordController extends Controller
{
    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        // Generate OTP
        $otp = random_int(100000, 999999);

        // Simpan OTP ke database
        $user = User::where('email', $request->email)->first();
        $user->update([
            'otp' => $otp,
            'otp_expires_at' => now()->addMinutes(10), // OTP berlaku 10 menit
        ]);

        // Kirim OTP ke email
        Mail::to($user->email)->send(new LupaPasswordOtp($otp));

        return back()->with('success', 'OTP berhasil dikirim ke email Anda.')->withInput();
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'otp' => 'required|numeric',
        ]);

        $user = User::where('email', $request->email)->first();

        // Validasi OTP
        if (!$user || $user->otp !== $request->otp || now()->greaterThan($user->otp_expires_at)) {
            return back()->with('otpSalah', 'Kode OTP salah atau sudah kadaluarsa.');
        }

        // Reset OTP
        $user->update([
            'otp' => null,
            'otp_expires_at' => null,
        ]);

        session(['email' => $user->email]);
        // Redirect ke halaman ubah password
        return redirect('/ubahLupaPassword');
    }

    public function updatePassword(Request $request)
    {
        // Validasi form
        $validator = $request->validate([
            'email' => 'required|email|exists:users,email',
            'newpassword' => 'required|min:6', // Konfirmasi password
            'confirm_newpassword' => 'required|same:newpassword',
        ]);

        // Ambil user berdasarkan email
        $user = User::where('email', session('email'))->first();

        if (!$user) {
            return back()->with('error', 'User tidak ditemukan.');
        }

        // Update password
        $user->update([
            'password' => Hash::make($request->newpassword), // Hash password baru
        ]);

        // Bersihkan session email
        session()->forget('email');

        // Redirect ke halaman login atau halaman sukses
        return redirect()->route('auth')->with('success', 'Password berhasil diubah.');
    }
}
