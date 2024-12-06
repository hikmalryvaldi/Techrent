<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function store(Request $request){
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        User::create($validatedData);

        return redirect('/registrasi')->with('success', 'Registrasi berhasil, silahkan login');
    }
}
