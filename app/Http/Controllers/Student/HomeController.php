<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Show the student dashboard.
     */
    public function __invoke()
    {
        return inertia('Student/Home/Index', [
        ]);
    }
}