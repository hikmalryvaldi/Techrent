<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        View::composer('components.navbar', function ($view) {
            $keranjang = [];
            if (Auth::check()) {
                // Dapatkan keranjang pengguna beserta item dan produk terkait
                $keranjang = Auth::user()->cart()->with('items.product')->first();
            }
            $view->with('keranjang', $keranjang);
        });
    }
}
