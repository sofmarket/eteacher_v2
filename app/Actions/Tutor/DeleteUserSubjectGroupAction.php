<?php

namespace App\Actions\Tutor;

use App\Models\UserSubjectGroup;

class DeleteUserSubjectGroupAction
{
    public function handle(UserSubjectGroup $userSubjectGroup)
    {
        // Verify the group belongs to the current user
        if ($userSubjectGroup->user_id !== auth()->id()) {
            throw new \Exception('Unauthorized to delete this subject group.');
        }

        // Delete all subjects in this group first
        $userSubjectGroup->subjects()->delete();

        // Delete the group
        $userSubjectGroup->delete();
    }
}
