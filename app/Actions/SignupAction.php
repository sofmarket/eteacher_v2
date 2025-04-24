<?php

namespace App\Actions;

use App\Dto\SignupData;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SignupAction
{
    public function handle(SignupData $data): User
    {
        return DB::transaction(function () use ($data) {
            // Create user
            $user = User::create([
                'email' => $data->email,
                'password' => Hash::make($data->password),
            ]);

            // Create profile
            $user->profile()->create([
                'first_name' => $data->firstName,
                'last_name' => $data->lastName,
                'phone_number' => $data->phone,
            ]);

            // Fire registered event
            event(new Registered($user));

            return $user;
        });
    }
} 