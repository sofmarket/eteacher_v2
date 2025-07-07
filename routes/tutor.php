<?php

use App\Http\Controllers\Tutor\BookingsController;
use App\Http\Controllers\Tutor\CalendarController;
use App\Http\Controllers\Tutor\ChatsController;
use App\Http\Controllers\Tutor\CouponsController;
use App\Http\Controllers\Tutor\DisputesController;
use App\Http\Controllers\Tutor\HomeController;
use App\Http\Controllers\Tutor\InvoicesController;
use App\Http\Controllers\Tutor\PayoutsController;
use App\Http\Controllers\Tutor\ProfileController;
use App\Http\Controllers\Tutor\ProfileEducationController;
use App\Http\Controllers\Tutor\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('/test', TestController::class)->name('test');

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

Route::post('/profile/education', [ProfileEducationController::class, 'store'])->name('profile.education.store');
Route::put('/profile/education/{education}', [ProfileEducationController::class, 'update'])->name('profile.education.update');
Route::delete('/profile/education/{education}', [ProfileEducationController::class, 'destroy'])->name('profile.education.destroy');

Route::get('/bookings', [BookingsController::class, 'index'])->name('bookings');

Route::get('/invoices', [InvoicesController::class, 'index'])->name('invoices');

Route::get('/chats', [ChatsController::class, 'index'])->name('chats');

Route::get('/coupons', [CouponsController::class, 'index'])->name('coupons');

Route::get('/disputes', [DisputesController::class, 'index'])->name('disputes');

Route::get('/payouts', [PayoutsController::class, 'index'])->name('payouts');
