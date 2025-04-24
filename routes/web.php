<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationsController;

Route::get('/', function () {
    return view('welcome');
});

require __DIR__ . '/auth.php';

// Tutor routes
Route::middleware('auth')->prefix('/tutor')->name('tutor.')->group(function () {
    require __DIR__ . '/tutor.php';
});

// Student routes
Route::middleware('auth')->prefix('/student')->name('student.')->group(function () {
    require __DIR__ . '/student.php';
});

// Dashboard routes
Route::middleware('auth')->prefix('/dashboard')->name('dashboard.')->group(function () {
    require __DIR__ . '/dashboard.php';
});

// Notifications
Route::middleware('auth')->prefix('/notifications')->name('notifications.')->group(function () {
    Route::get('/', [NotificationsController::class, 'index'])->name('index');
    Route::post('/{id}/read', [NotificationsController::class, 'markAsRead'])->name('read');
    Route::post('/read-all', [NotificationsController::class, 'markAllAsRead'])->name('read-all');
    Route::delete('/{id}', [NotificationsController::class, 'destroy'])->name('destroy');
    Route::delete('/', [NotificationsController::class, 'destroyAll'])->name('destroy-all');
    Route::get('/unread-count', [NotificationsController::class, 'unreadCount'])->name('unread-count');
});