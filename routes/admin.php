<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function() {
    dd('admin home');
})->name('home');
