<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardContorller extends Controller
{
    public function index()
    {
        $users = User::query()->first()->get();
        return view("/Admin/users", compact("users"));
    }
}
