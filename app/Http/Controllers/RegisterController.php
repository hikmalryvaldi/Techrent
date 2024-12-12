<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
}
