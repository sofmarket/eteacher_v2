<?php

use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\TutorsController;
use App\Http\Controllers\Front\FaqController;
use App\Http\Controllers\Front\HowItWorksController;
use Illuminate\Support\Facades\Route;


Route::get('/', HomeController::class)->name('home');
Route::get('/about', AboutController::class)->name('about');
Route::get('/contact', ContactController::class)->name('contact');
Route::get('/faq', FaqController::class)->name('faq');
Route::get('/how-it-works', HowItWorksController::class)->name('how-it-works');


Route::prefix('/tutors')->name('tutors.')->group(function () {
    Route::get('/', [TutorsController::class, 'index'])->name('index');
    Route::get('/{tutor}', [TutorsController::class, 'show'])->name('show');
});



