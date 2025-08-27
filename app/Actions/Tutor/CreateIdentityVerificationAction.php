<?php

namespace App\Actions\Tutor;

use App\Models\User;

class CreateIdentityVerificationAction
{
    /**
     * Update the user's password.
     *
     * @param  User   $user
     * @param  string $newPassword
     * @return void
     */
    public function handle(User $user, Array $data)
    {
        
        // todo : verify if user has already pending verification  
        
        $verification = $user->identityVerifications()->create($this->prepareData($data));

        $verification->addMedia(request()->file('photo'))->toMediaCollection('photo');
        
        $verification->addMedia(request()->file('cin'))->toMediaCollection('cin');

    }

    private function prepareData(array $data) {
        return [
            'fullname' => $data['fullname'],
            'dob' => $data['dob'],
            'city' => $data['city'],
            'zipcode' => $data['zipcode'],
        ];
    }

} 