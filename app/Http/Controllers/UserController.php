<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\UserRequest;


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
}
