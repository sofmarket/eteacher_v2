<?php

use App\Http\Controllers\Common\ChangeLocaleController;
use App\Http\Controllers\Common\ConversationsController;
use App\Http\Controllers\Common\ConversationMessageController;
use App\Http\Controllers\Common\IdentityVerificationController;
use Illuminate\Support\Facades\Route;

Route::post('/profile/identity_verification', IdentityVerificationController::class)->name('profile.identity_verification');

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