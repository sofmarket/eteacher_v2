<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\UserSubjectGroupSubject;
use App\Models\UserSubjectSlot;
use Illuminate\Database\Eloquent\Factories\Factory;
class SlotBookingFactory extends Factory
{
    public function definition()
    {
        $tutorId = User::tutor()->has('subjectSlots')->inRandomOrder()->first()->id;
        return [
            'student_id' => User::student()->inRandomOrder()->first()->id,
            'tutor_id' => $tutorId,
            'user_subject_slot_id' => UserSubjectSlot::where('tutor_id', $tutorId)->inRandomOrder()->first()->id,
            'session_fee' => rand(30, 200),
            'booked_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'status' => 1,
            'meta_data' => [],
        ];
    }
}