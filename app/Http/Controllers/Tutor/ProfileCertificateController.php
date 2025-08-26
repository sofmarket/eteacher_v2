<?php

namespace App\Http\Controllers\Tutor;

use App\Actions\Tutor\UpsertTutorCertificateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tutor\CertificateRequest;
use App\Models\User;
use App\Models\UserCertificate;

class ProfileCertificateController extends Controller
{
    public function __construct(
        protected UpsertTutorCertificateAction $upsertTutorCertificateAction
    ) {
    }

    public function store(CertificateRequest $request)
    {

        $user = User::findOrFail(auth()->id());

        $this->upsertTutorCertificateAction->handle($user, $request->all());

        return redirect()->route('tutor.profile')->with('message', 'Certificate created successfully');

    }

    public function update(CertificateRequest $request, UserCertificate $certificate)
    {
        // Ensure the certificate belongs to the authenticated user
        if ($certificate->user_id !== auth()->id()) {
            abort(403);
        }

        $user = User::findOrFail(auth()->id());

        $this->upsertTutorCertificateAction->handle($user, $request->all(), $certificate);

        return redirect()->route('tutor.profile')->with('message', 'Certificate updated successfully');
    }

    public function destroy(UserCertificate $certificate)
    {
        // Ensure the certificate belongs to the authenticated user
        if ($certificate->user_id !== auth()->id()) {
            abort(403);
        }

        $certificate->delete();

        return redirect()->route('tutor.profile')->with('message', 'Certificate deleted successfully');
    }
}