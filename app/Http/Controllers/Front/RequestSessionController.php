<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;


class RequestSessionController extends Controller
{
    public function __invoke()
    {
        return back()->with('message', 'Session requested successfully');
    }
}