<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function providerLogin($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    // public function FacebookLogin(){
    //     return Socialite::driver('facebook')->redirect();
    // }

    public function providerAuthentication($provider)
    {
        // Mengambil data user dari provider (misalnya, Google)
        $user = Socialite::driver($provider)->user();

        // Cek apakah email sudah terdaftar di database
        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            // Jika email sudah terdaftar dan provider_id terisi (not null)
            if ($existingUser->id_provider == $user->id) {
                Auth::login($existingUser);
                return redirect()->intended('/');
            } else {
                // Mengarahkan ke rute /register dengan session emailTerdaftar
                return to_route('auth')->with('emailTerdaftar', 'Email sudah terdaftar dengan metode login lain');
            }

            // Jika email terdaftar tapi belum menggunakan metode login lain (misalnya, belum ada provider_id)
            // Proses login biasa, bisa diarahkan ke halaman dashboard atau lainnya
            Auth::login($existingUser);
            return redirect()->intended('/');
        }

        // Jika email belum terdaftar, buat user baru
        $newUser = User::create([
            'nama' => $user->name,
            'email' => $user->email,
            // 'phone' => '0987654321',
            'id_provider' => $user->getId(),
            'password' => bcrypt(Str::random(10)),
            // kolom lain yang diperlukan seperti 'password' jika dibutuhkan
        ]);

        // Login otomatis setelah registrasi
        auth::login($newUser);

        return redirect()->intended('/');
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
