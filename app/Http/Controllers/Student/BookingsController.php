<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;

class BookingsController extends Controller
{
    public function index()
    {
        return inertia('Student/Bookings/Index');
    }
}
