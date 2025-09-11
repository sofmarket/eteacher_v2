<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
class SlotBookingFactory extends Factory
{
    public function definition()
    {
        return [
            'student_id' => rand(2, 10),
            'tutor_id' => 1,
            'user_subject_slot_id' => rand(2, 7),
            'session_fee' => rand(30, 200),
            'booked_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'status' => 1,
            'meta_data' => [],
        ];
    }
}