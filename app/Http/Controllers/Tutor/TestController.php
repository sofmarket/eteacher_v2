<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;


class TestController extends Controller
{
    public function __invoke()
    {
        return inertia('Tutor/Test');
    }
}