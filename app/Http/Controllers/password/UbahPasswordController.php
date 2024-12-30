<?php

namespace App\Http\Controllers\password;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UbahPasswordController extends Controller
{
    public function UbahPass()
    {
        return view('ubahPassword');
    }
    public function UbahLupaPass()
    {
        return view('auth.ubahLupaPassword');
    }
}
