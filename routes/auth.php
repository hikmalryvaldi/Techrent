<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LupaPasswordController;
use App\Http\Controllers\password\UbahPasswordController;

Route::get('/auth', [RegisterController::class, 'index'])->name('auth')->middleware('guest');
Route::post('/registrasi', [RegisterController::class, 'store'])->name('register');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/ubahPassword', [UbahPasswordController::class, 'UbahPass'])->name('password.reset');
Route::post('/lupaPassword', [RegisterController::class, 'lupaPassword']);
Route::get('/ubahLupaPassword', [UbahPasswordController::class, 'UbahLupaPass']);

Route::post('/updateLupaPassword', [LupaPasswordController::class, 'updatePassword'])->name('update.password');
Route::post('/send-otp', [LupaPasswordController::class, 'sendOtp'])->name('send.otp');
Route::post('/verify-otp', [LupaPasswordController::class, 'verifyOtp'])->name('verify.otp');
