<?php

use Illuminate\Support\Facades\Route;

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
Route::middleware('auth')->prefix('/dashboard')->name('admin.')->group(function () {
    require __DIR__ . '/admin.php';
});

require __DIR__ . '/common.php';