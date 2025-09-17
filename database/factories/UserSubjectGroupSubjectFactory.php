<?php

namespace Database\Factories;

use App\Models\Subject;
use App\Models\UserSubjectGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserSubjectGroupSubject>
 */
class UserSubjectGroupSubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userSubjectGroup = UserSubjectGroup::inRandomOrder()->first();
        return [
            'user_subject_group_id' => $userSubjectGroup->id,
            'subject_id' => $userSubjectGroup->subjects()->inRandomOrder()->first()->id,
            'hour_rate' => $this->faker->numberBetween(10, 100),
            'description' => $this->faker->sentence(),
            'sort_order' => $userSubjectGroup->subjects()->max('sort_order') + 1,
        ];
    }
}
