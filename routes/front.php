<?php

use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\FaqController;
use App\Http\Controllers\Front\TutorController;
use App\Http\Controllers\Front\TutorAvailabilityController;
use App\Http\Controllers\Front\HowItWorksController;
use Illuminate\Support\Facades\Route;


Route::get('/', HomeController::class)->name('home');
Route::get('/about', AboutController::class)->name('about');
Route::get('/contact', ContactController::class)->name('contact');
Route::get('/faq', FaqController::class)->name('faq');
Route::get('/how-it-works', HowItWorksController::class)->name('how-it-works');


Route::prefix('/tutors')->name('tutors.')->group(function () {
    Route::get('/', [TutorController::class, 'index'])->name('index');
    Route::get('/{slug}', [TutorController::class, 'show'])->name('show');
    Route::get('/{slug}/availability', [TutorAvailabilityController::class, 'index'])->name('availability');
    Route::post('/{slug}/availability', [TutorAvailabilityController::class, 'store'])->name('availability');
});



