<?php


namespace Database\Factories;

use App\Models\User;
use App\Models\UserSubjectSlot;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserSubjectSlotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::tutor()->has('subjectGroups')->inRandomOrder()->first();
        return [
            'user_subject_group_subject_id' => $user->subjectGroups()->inRandomOrder()->first()->subjects()->inRandomOrder()->first()->id,
            'tutor_id' => $user->id,
            'start_time' => $this->faker->dateTimeBetween('-15 days', 'now'),
            'end_time' => $this->faker->dateTimeBetween('now', '+15 days'),
            'meta_data' => [],
            'duration' => $this->faker->numberBetween(30, 120),
            'spaces' => $this->faker->numberBetween(1, 10),
            'session_fee' => $this->faker->numberBetween(10, 100),
            'type' => 1,
            'description' => $this->faker->sentence(),
            'total_booked' => $this->faker->numberBetween(0, 5),
        ];
    }
}
