<?php

namespace Database\Factories;

use App\Models\Language;
use App\Models\Subject;
use App\Models\SubjectGroup;
use App\Models\User;
use App\Models\UserSubjectGroupSubject;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'type' => $this->faker->randomElement(['student', 'tutor']),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (User $user) {

            $profileData = [
                'first_name' => $this->faker->firstName(),
                'last_name' => $this->faker->lastName(),
                'gender' => $this->faker->randomElement([1, 2]),
                'phone_number' => $this->faker->phoneNumber(),
                'description' => $this->faker->sentence(),
                'slug' => Str::slug($this->faker->firstName()),
            ];

            if ($user->type === 'tutor') {
                array_merge($profileData, [
                    'slug' => Str::slug($this->faker->firstName()),
                    'tagline' => $this->faker->sentence(),
                    'keywords' => $this->faker->sentence(),
                    'native_language' => 'arabic',
                    'intro_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ'
                ]);
            }

            $user->profile()->create($profileData);

            if ($user->type === 'tutor') {
                
                $user->languages()->attach(Language::inRandomOrder()->limit(2)->pluck('id'));
                
                $user->educations()->create([
                    'institute_name' => $this->faker->company(),
                    'course_title' => $this->faker->jobTitle(),
                    'start_date' => $this->faker->date(),
                    'end_date' => $this->faker->date(),
                    'description' => $this->faker->sentence(),
                    'ongoing' => 0,
                    'city' => $this->faker->city(),
                ]);
                
                $user->experiences()->create([
                    'company' => $this->faker->company(),
                    'title' => $this->faker->jobTitle(),
                    'start_date' => $this->faker->date(),
                    'end_date' => $this->faker->date(),
                    'description' => $this->faker->sentence(),
                    'is_current' => 0,
                    'location' => $this->faker->randomElement(['onsite', 'remote', 'hybrid']),
                    'city' => $this->faker->city(),
                    'employment_type' => $this->faker->randomElement([1, 2, 3, 4]),
                ]);
                
                $user->certificates()->create([
                    'title' => $this->faker->company(),
                    'institute_name' => $this->faker->company(),
                    'description' => $this->faker->sentence(),
                    'issue_date' => $this->faker->date(),
                    'expiry_date' => $this->faker->date(),
                ]);

                $subjectGroup = SubjectGroup::inRandomOrder()->first();

                $group = $user->subjectGroups()->create([
                    'subject_group_id' => $subjectGroup->id,
                    'sort_order' => $this->faker->numberBetween(1, 100),
                ]);

                UserSubjectGroupSubject::create([
                    'user_subject_group_id' => $group->id,
                    'subject_id' => Subject::inRandomOrder()->first()->id,
                    'hour_rate' => $this->faker->numberBetween(10, 100),
                    'description' => $this->faker->sentence(),
                    'sort_order' => $this->faker->numberBetween(1, 100),
                ]);

            }

        });
    }
}
