<?php

namespace App\Actions\Tutor;

use App\Models\UserSubjectSlot;
use Carbon\Carbon;

class CreateUserSubjectSlotAction
{
    public function handle(array $data): void
    {
        $userSubjectSlot = UserSubjectSlot::create($this->prepareData($data));
    }


    private function prepareData(array $data): array
    {
        // Concatenate start_date with start_time using Carbon
        $startDateTime = Carbon::parse($data['start_date'] . ' ' . $data['start_time']);
        $endDateTime = Carbon::parse($data['end_date'] . ' ' . $data['start_time']);

        return [
            'user_subject_group_subject_id' => $data['user_subject_group_subject_id'],
            'start_time' => $startDateTime,
            'end_time' => $endDateTime,
            'spaces' => $data['spaces'],
            'duration' => intval($data['duration']),
            'session_fee' => $data['session_fee'],
            'type' => 0,
            'description' => $data['description'],
        ];
    }
}
