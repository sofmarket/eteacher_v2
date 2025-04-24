<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the tutor dashboard.
     */
    public function __invoke()
    {
        return inertia('Tutor/Home/Home');
    }
}