<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;

class CalendarController extends Controller
{
    public function __invoke()
    {
        return inertia('Tutor/Calendar/Index');
    }
}
