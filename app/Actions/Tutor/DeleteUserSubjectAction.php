<?php

namespace App\Actions\Tutor;

use App\Models\UserSubjectGroup;
use App\Models\UserSubjectGroupSubject;

class DeleteUserSubjectAction
{
    public function handle(UserSubjectGroupSubject $userSubject)
    {
        // Verify the subject belongs to the authenticated user
        $userSubjectGroup = UserSubjectGroup::where('id', $userSubject->user_subject_group_id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $userSubject->delete();

        return true;
    }
}
