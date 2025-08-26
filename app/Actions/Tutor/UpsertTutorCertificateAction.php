<?php

namespace App\Actions\Tutor;

use App\Models\Address;
use App\Models\User;
use App\Models\UserCertificate;
use Illuminate\Support\Facades\DB;

class UpsertTutorCertificateAction
{
    public function handle(User $user, array $data, UserCertificate $certificate = null)
    {
        if (is_null($certificate)) {
            $certificate = $user->certificates()->create($this->prepareData($data));
        } else {
            $certificate->update($this->prepareData($data));
        }

        $this->handlePhotoUpload($certificate);
    }

    protected function handlePhotoUpload(UserCertificate $certificate): void
    {

        $file = request()->file('photo');

        if ($file) {
            $certificate->clearMediaCollection('photo');
            $certificate->addMedia($file)->toMediaCollection('photo');
        }

    }

    protected function prepareData(array $data): array
    {
        return [
            'title' => $data['title'] ?? null,
            'institute_name' => $data['institute_name'] ?? null,
            'issue_date' => $data['issue_date'] ?? null,
            'expiry_date' => $data['expiry_date'] ?? null,
            'description' => $data['description'] ?? null,
        ];
    }
}