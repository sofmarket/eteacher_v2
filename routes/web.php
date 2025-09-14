<?php

use App\Http\Controllers\Common\ChangeLocaleController;
use App\Http\Controllers\ConversationsController;
use App\Http\Controllers\ConversationMessageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationsController;

Route::prefix('/')->name('front.')->group(function () {
    require __DIR__ . '/front.php';
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
    // Notifications
    Route::get('/', [NotificationsController::class, 'index'])->name('index');
    Route::post('/{id}/read', [NotificationsController::class, 'markAsRead'])->name('read');
    Route::post('/read-all', [NotificationsController::class, 'markAllAsRead'])->name('read-all');
    Route::delete('/{id}', [NotificationsController::class, 'destroy'])->name('destroy');
    Route::delete('/', [NotificationsController::class, 'destroyAll'])->name('destroy-all');
    Route::get('/unread-count', [NotificationsController::class, 'unreadCount'])->name('unread-count');    
});

// Conversations
Route::middleware('auth')->prefix('/conversations')->name('conversations.')->group(function () {
    
    Route::get('/', [ConversationsController::class, 'index'])->name('index');
    Route::get('/{conversation}', [ConversationsController::class, 'show'])->name('show');
    Route::delete('/{conversation}', [ConversationsController::class, 'destroy'])->name('destroy');
    Route::patch('/{conversation}/read', [ConversationsController::class, 'markAsRead'])->name('read');

    
    // Message routes
    Route::prefix('/{conversation}/messages')->name('messages.')->group(function () {
        Route::get('/', [ConversationMessageController::class, 'index'])->name('index');
        Route::post('/', [ConversationMessageController::class, 'store'])->name('store');
        Route::get('/{message}', [ConversationMessageController::class, 'show'])->name('show');
        Route::put('/{message}', [ConversationMessageController::class, 'update'])->name('update');
        Route::delete('/{message}', [ConversationMessageController::class, 'destroy'])->name('destroy');
        Route::patch('/{message}/read', [ConversationMessageController::class, 'markAsRead'])->name('read');
    });

});

// Common routes
Route::get('/change-locale', ChangeLocaleController::class)->name('change-locale');