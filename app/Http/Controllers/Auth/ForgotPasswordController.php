<?php

namespace App\Http\Controllers\Auth;

use App\Actions\ForgotPasswordAction;
use App\Dto\ForgotPasswordData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgotPasswordRequest;

// forgot password controller with inertia
class ForgotPasswordController extends Controller
{

    public function __construct(
        private ForgotPasswordAction $action,
    ) {}

    public function create()
    {
        return inertia('Auth/ForgotPassword');
    }

    public function store(ForgotPasswordRequest $request)
    {
        $data = ForgotPasswordData::fromRequest($request->all());

        $this->action->handle($data);

        return redirect()->route('login')->with('success', 'Password reset link sent to your email');
    }
}