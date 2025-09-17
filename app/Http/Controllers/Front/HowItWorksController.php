<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class HowItWorksController extends Controller
{
    public function __invoke()
    {
        return inertia('Front/HowItWorks/Index');
    }
}
