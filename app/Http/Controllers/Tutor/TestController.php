<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Events\MessageReceived;


class TestController extends Controller
{
    public function __invoke()
    {
        return inertia('Tutor/Test');
    }
}