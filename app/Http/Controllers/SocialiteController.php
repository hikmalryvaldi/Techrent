<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function providerLogin($provider){
        return Socialite::driver($provider)->redirect();
    }
    // public function FacebookLogin(){
    //     return Socialite::driver('facebook')->redirect();
    // }

    public function providerAuthentication($provider){
        // $User = Socialite::driver('google')->user();

        // dd($User);
        try {
            if ($provider){
                $provider_user = Socialite::driver($provider)->user();
                $user = User::where('email', $provider_user->email)->first();
            if ($user){
                Auth::login($user);
                return redirect('/');
            } else {
                $new_user = User::create([
                    'nama' => ucwords($provider_user->name),
                    'email' => $provider_user->email,
                    'phone' => '0987654321',
                    'password' => 'password',
                    'confirm_password' => 'password' ,
                ]);

                Auth::login($new_user);
                return redirect('/');
            }
        } abort(404);
        } catch (\Throwable $th){
            abort(404);
        }
    }
    // public function facebookAuthentication($provider){
    //     $User = Socialite::driver($provider)->user();

    //     // dd($User);
    //     dd($provider);
    //     // try {
    //     //     $facebook_user = Socialite::driver('facebook')->user();
    //     //     $user = User::where('email', $facebook_user->email)->first();
    //     //     if ($user){
    //     //         Auth::login($user);
    //     //         return redirect('/');
    //     //     } else {
    //     //         $new_user = User::create([
    //     //             'nama' => ucwords($facebook_user->name),
    //     //             'email' => $facebook_user->email,
    //     //             'phone' => '1234567890',
    //     //             'password' => 'password',
    //     //             'confirm_password' => 'password' ,
    //     //         ]);

    //     //         Auth::login($new_user);
    //     //         return redirect('/');
    //     //     }
    //     // } catch (\Throwable $th){
    //     //     abort(404);
    //     // }
    // }
}