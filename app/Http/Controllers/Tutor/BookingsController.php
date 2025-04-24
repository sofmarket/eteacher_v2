<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;

class BookingsController extends Controller
{
    public function index()
    {
        return inertia('Tutor/Bookings/Index');
    }
}
