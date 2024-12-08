<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function googleLogin(){
        return Socialite::driver('google')->redirect();
    }

    public function googleAuthentication(){
        // $User = Socialite::driver('google')->user();

        // dd($User);
        try {
            $google_user = Socialite::driver('google')->user();
            $user = User::where('email', $google_user->email)->first();
            if ($user){
                Auth::login($user);
                return redirect('/');
            } else {
                $new_user = User::create([
                    'nama' => ucwords($google_user->name),
                    'email' => $google_user->email,
                    'phone' => '0987654321',
                    'password' => 'password',
                    'confirm_password' => 'password' ,
                ]);

                Auth::login($new_user);
                return redirect('/');
            }
        } catch (\Throwable $th){
            abort(404);
        }
    }
}