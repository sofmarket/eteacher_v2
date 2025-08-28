<?php

namespace App\Actions\Tutor;

use App\Models\UserSubjectGroup;

class UpsertUserSubjectGroupAction
{
    public function handle(array $data, UserSubjectGroup $userSubjectGroup = null)
    {
        // Check if user already has this subject group
        $existingGroup = UserSubjectGroup::where('user_id', auth()->id())
            ->where('subject_group_id', $data['subject_group_id'])
            ->first();

        if ($existingGroup && (!$userSubjectGroup || $existingGroup->id !== $userSubjectGroup->id)) {
            throw new \Exception('You already have this subject group.');
        }

        if ($userSubjectGroup) {
            // Update existing group
            $userSubjectGroup->update($this->prepareData($data));
            return $userSubjectGroup;
        } else {
            // Create new group
            $userSubjectGroup = UserSubjectGroup::create($this->prepareData($data));
            return $userSubjectGroup;
        }
    }

    protected function prepareData(array $data, UserSubjectGroup $userSubjectGroup = null): array
    {
        $preparedData = [
            'user_id' => auth()->id(),
            'subject_group_id' => $data['subject_group_id'],
        ];

        if (!$userSubjectGroup) {
            // Set sort order for new groups
            $preparedData['sort_order'] = UserSubjectGroup::where('user_id', auth()->id())->max('sort_order') + 1;
        }

        return $preparedData;
    }
}
