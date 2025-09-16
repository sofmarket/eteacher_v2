<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Http\Requests\Common\IdentityVerificationRequest;
use App\Models\User;
use App\Actions\Common\CreateIdentityVerificationAction;

class IdentityVerificationController extends Controller
{

    public function __construct(
        protected CreateIdentityVerificationAction $createIdentityVerificationAction
    ) {
    }

    public function __invoke(IdentityVerificationRequest $request)
    {

        $user = User::findOrFail(auth()->id());

        $this->createIdentityVerificationAction->handle(
            $user,
            $request->all()
        );

        return redirect()->route('tutor.profile')->with('message', 'Verification request created successfully');
    }

}