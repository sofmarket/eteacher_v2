<?php

namespace App\Actions\Tutor;

use App\Models\UserSubjectGroup;
use App\Models\UserSubjectGroupSubject;

class UpsertUserSubjectAction
{
    public function handle(array $data, UserSubjectGroupSubject $userSubject = null)
    {

        // Verify the user subject group belongs to the authenticated user
        $userSubjectGroup = UserSubjectGroup::where('id', $userSubject?->user_subject_group_id ?? $data['user_subject_group_id'])
            ->where('user_id', auth()->id())
            ->firstOrFail();

        if (is_null($userSubject)) {

            // Check if subject already exists in this group
            $existingSubject = UserSubjectGroupSubject::where('user_subject_group_id', $data['user_subject_group_id'])
                ->where('subject_id', $data['subject_id'])
                ->first();

            if ($existingSubject) {
                throw new \Exception('This subject is already added to this group.');
            }

            $userSubject = UserSubjectGroupSubject::create($this->prepareData($data));


        } else {

            $userSubject->update($this->prepareData($data, $userSubject));

        }

        $this->handleImageUpload($userSubject, $data);

        return $userSubject;

    }

    protected function prepareData(array $data, UserSubjectGroupSubject $userSubject = null): array
    {

        if (is_null($userSubject)) {
            return [
                'user_subject_group_id' => $data['user_subject_group_id'],
                'subject_id' => $data['subject_id'],
                'hour_rate' => $data['hour_rate'],
                'description' => $data['description'] ?? null,
                'sort_order' => UserSubjectGroupSubject::where('user_subject_group_id', $data['user_subject_group_id'])->max('sort_order') + 1,
            ];
        } else {
            return [
                'hour_rate' => $data['hour_rate'],
                'description' => $data['description'] ?? null,
            ];
        }

    }

    protected function handleImageUpload(UserSubjectGroupSubject $userSubject, array $data): void
    {
        $file = request()->file('image');

        if ($file) {
            $userSubject->clearMediaCollection('image');
            $userSubject->addMedia($file)->toMediaCollection('image');
            $userSubject->update(['image' => $userSubject->getFirstMediaUrl('image')]);
        }
    }
}
