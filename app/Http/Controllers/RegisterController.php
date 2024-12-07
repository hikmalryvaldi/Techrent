<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\RegistrasiRequest;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function store(RegistrasiRequest $request)
    {
        User::create($request->validated());

        return redirect("/registrasi")->with("success", "Registrasi berhasil, silahkan login");
    }
}
