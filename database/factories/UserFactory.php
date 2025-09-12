<?php

namespace Database\Factories;

use App\Models\User;
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
            // Perform actions after a User is created
            // For example, create a related profile for the user
            $user->profile()->create([
                'first_name' => $this->faker->firstName(),
                'last_name' => $this->faker->lastName(),
                'gender' => $this->faker->randomElement([1, 2]),
                'phone_number' => $this->faker->phoneNumber(),
                'description' => $this->faker->sentence(),
                'slug' => Str::slug($this->faker->firstName()),
                'tagline' => $this->faker->sentence(),
                'keywords' => $this->faker->sentence(),
                'native_language' => 'arabic',
                'intro_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            ]);
        });
    }
}
