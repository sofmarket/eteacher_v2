<?php

namespace App\Actions\Tutor;

use App\Models\UserSubjectGroup;
use App\Models\User;

class UpdateUserSubjectGroupsAction
{
    public function handle(array $data)
    {
        $subjectGroupIds = $data['subject_groups'];

        $user = User::find(auth()->id());

        $user->subjectGroups()->whereNotIn('subject_group_id', $subjectGroupIds)->delete();

        foreach ($subjectGroupIds as $index => $subjectGroupId) {
            $user->subjectGroups()->updateOrCreate([
                'subject_group_id' => $subjectGroupId,
            ], [
                'sort_order' => $index + 1,
            ]);
        }

        return $user->subjectGroups;
    }
}
