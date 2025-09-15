<?php

use App\Http\Controllers\Student\DisputesController;
use App\Http\Controllers\Student\HomeController;
use App\Http\Controllers\Student\InvoicesController;
use App\Http\Controllers\Student\ProfileController;
use App\Http\Controllers\Student\UpdatePasswordController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

Route::post('/profile/update-password', UpdatePasswordController::class)->name('profile.update-password');

Route::get('/invoices', [InvoicesController::class, 'index'])->name('invoices.index');

Route::get('/disputes', [DisputesController::class, 'index'])->name('disputes.index');
Route::get('/disputes/{dispute}', [DisputesController::class, 'show'])->name('disputes.show');
Route::post('/disputes', [DisputesController::class, 'store'])->name('disputes.store');
