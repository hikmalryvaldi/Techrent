<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function index()
    {
        return view('auth.index');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nama' => 'required|max:255',
                'email' => 'required|email|unique:users',
                'phone' => 'required|numeric|unique:users',
                'password' => 'required|min:5|max:255',
                'confirm_password' => 'required|same:password'
            ]);

            // Create the user record
            User::create($validatedData);

            return to_route('auth')->with('success', 'Registration successful! Please login.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return to_route('auth')->with("registrasiError", "Registrasi gagal. Coba lagi.")->withErrors($e->errors())->withInput();
        }
    }

    public function lupaPassword(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required|min:5|max:255',
            'confirm_newpassword' => 'required|same:newpassword',
        ]);

        $user = Auth::user();

        // Periksa apakah password lama cocok
        if (!Hash::check($validatedData['oldpassword'], $user->password)) {
            return back()->withErrors(['oldpassword' => 'Password yang lama salah.'])->withInput();
        }

        // Update password baru
        $user->password = Hash::make($validatedData['newpassword']);
        $user->save();

        return back()->with('success', 'Password berhasil diperbarui.');
    }
}
