<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function __invoke()
    {
        return inertia('Front/Contact/Index');
    }
}
