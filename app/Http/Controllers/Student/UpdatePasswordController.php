<?php

namespace App\Http\Controllers\Student;

use App\Actions\Tutor\UpdatePasswordAction;
use App\Http\Requests\General\UpdatePasswordRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UpdatePasswordController extends Controller
{
    public function __construct(
        protected UpdatePasswordAction $updatePasswordAction
    ) {
    }

    /**
     * Handle the incoming request for updating account settings.
     */
    public function __invoke(UpdatePasswordRequest $request)
    {
        $validated = $request->validated();

        $this->updatePasswordAction->handle(auth()->user(), $validated['password']);

        return redirect()->route('tutor.profile')->with('message', trans('password_updated_successfully'));
    }
} 