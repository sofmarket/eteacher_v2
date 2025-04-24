<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\SignupController;
use Illuminate\Support\Facades\Route;

// login
Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login');

// forgot password
Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])->name('forgot-password');
Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->name('forgot-password');

// signup
Route::get('/signup', [SignupController::class, 'create'])->name('signup');
Route::post('/signup', [SignupController::class, 'store'])->name('signup');

// logout

Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('/logout', LogoutController::class)->name('logout');
});
