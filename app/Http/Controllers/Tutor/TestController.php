<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Models\User;


class TestController extends Controller
{
    public function __invoke()
    {

        $user = User::find(1);

        $user->profile()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'gender' => 'male',
            ]
        );

        dd($user->profile);

        return inertia('Tutor/Test');
    }
}