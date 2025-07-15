<?php

namespace App\Actions\Tutor;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordAction
{
    /**
     * Update the user's password.
     *
     * @param  User   $user
     * @param  string $newPassword
     * @return void
     */
    public function handle(User $user, string $newPassword): void
    {
        $user->password = Hash::make($newPassword);
        $user->save();
    }
} 