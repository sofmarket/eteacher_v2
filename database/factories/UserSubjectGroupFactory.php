<?php

namespace Database\Factories;

use App\Models\SubjectGroup;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserSubjectGroup>
 */
class UserSubjectGroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $attempts = 0;
        $maxAttempts = 100; // Prevent infinite loops
        
        do {
            $userId = User::tutor()->inRandomOrder()->first()?->id;
            $subjectGroupId = SubjectGroup::inRandomOrder()->first()?->id;
            $attempts++;
            
            // If we can't find valid IDs or have tried too many times, throw an exception
            if (!$userId || !$subjectGroupId || $attempts >= $maxAttempts) {
                throw new \Exception('Unable to create unique UserSubjectGroup combination after ' . $maxAttempts . ' attempts');
            }
        } while (\App\Models\UserSubjectGroup::where('user_id', $userId)
            ->where('subject_group_id', $subjectGroupId)
            ->exists());
        
        return [
            'user_id' => $userId,
            'subject_group_id' => $subjectGroupId,
            'sort_order' => $this->faker->numberBetween(1, 100),
        ];
    }
}
