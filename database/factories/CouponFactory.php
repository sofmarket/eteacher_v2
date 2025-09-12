<?php

namespace Database\Factories;

use App\Models\Coupon;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupon>
 */
class CouponFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Coupon::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $isFixed = $this->faker->boolean(60); // 60% chance of being fixed amount
        $discount = $isFixed 
            ? $this->faker->randomFloat(2, 5, 100) // Fixed: $5-$100
            : $this->faker->randomFloat(2, 5, 50); // Percentage: 5%-50%

        $startDate = $this->faker->dateTimeBetween('-30 days', '+30 days');
        $expireDate = $this->faker->optional(0.8)->dateTimeBetween($startDate, '+90 days');

        return [
            'code' => $this->generateUniqueCode(),
            'name' => $this->faker->words(2, true),
            'tutor_id' => 1,
            'uses' => $this->faker->numberBetween(0, 50),
            'max_uses' => $this->faker->optional(0.7)->numberBetween(10, 200),
            'discount' => $discount,
            'is_fixed' => $isFixed,
            'budget' => $this->faker->randomFloat(2, 100, 2000),
            'start_at' => $startDate,
            'expire_at' => $expireDate,
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }

    /**
     * Generate a unique coupon code
     */
    private function generateUniqueCode(): string
    {
        do {
            $code = strtoupper($this->faker->lexify('??????') . $this->faker->numerify('##'));
        } while (Coupon::where('code', $code)->exists());

        return $code;
    }

    /**
     * Indicate that the coupon is a fixed amount discount.
     */
    public function fixed(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_fixed' => true,
            'discount' => $this->faker->randomFloat(2, 5, 100),
        ]);
    }

    /**
     * Indicate that the coupon is a percentage discount.
     */
    public function percentage(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_fixed' => false,
            'discount' => $this->faker->randomFloat(2, 5, 50),
        ]);
    }

    /**
     * Indicate that the coupon is active (not expired, within usage limits).
     */
    public function active(): static
    {
        return $this->state(fn (array $attributes) => [
            'start_at' => $this->faker->dateTimeBetween('-30 days', 'now'),
            'expire_at' => $this->faker->dateTimeBetween('now', '+30 days'),
            'uses' => $this->faker->numberBetween(0, 20),
            'max_uses' => $this->faker->numberBetween(50, 200),
            'budget' => $this->faker->randomFloat(2, 500, 2000),
        ]);
    }

    /**
     * Indicate that the coupon is expired.
     */
    public function expired(): static
    {
        return $this->state(fn (array $attributes) => [
            'start_at' => $this->faker->dateTimeBetween('-60 days', '-30 days'),
            'expire_at' => $this->faker->dateTimeBetween('-30 days', '-1 day'),
            'uses' => $this->faker->numberBetween(10, 50),
        ]);
    }

    /**
     * Indicate that the coupon has reached maximum uses.
     */
    public function maxUsesReached(): static
    {
        $maxUses = $this->faker->numberBetween(10, 50);
        return $this->state(fn (array $attributes) => [
            'uses' => $maxUses,
            'max_uses' => $maxUses,
            'start_at' => $this->faker->dateTimeBetween('-30 days', 'now'),
            'expire_at' => $this->faker->dateTimeBetween('now', '+30 days'),
        ]);
    }

    /**
     * Indicate that the coupon has exceeded its budget.
     */
    public function budgetExceeded(): static
    {
        return $this->state(fn (array $attributes) => [
            'budget' => 0,
            'uses' => $this->faker->numberBetween(20, 100),
            'start_at' => $this->faker->dateTimeBetween('-30 days', 'now'),
            'expire_at' => $this->faker->dateTimeBetween('now', '+30 days'),
        ]);
    }

    /**
     * Indicate that the coupon has no expiration date.
     */
    public function noExpiration(): static
    {
        return $this->state(fn (array $attributes) => [
            'expire_at' => null,
            'start_at' => $this->faker->dateTimeBetween('-90 days', 'now'),
        ]);
    }

    /**
     * Indicate that the coupon has no usage limit.
     */
    public function unlimitedUses(): static
    {
        return $this->state(fn (array $attributes) => [
            'max_uses' => null,
            'uses' => $this->faker->numberBetween(0, 100),
        ]);
    }

    /**
     * Indicate that the coupon starts in the future.
     */
    public function futureStart(): static
    {
        return $this->state(fn (array $attributes) => [
            'start_at' => $this->faker->dateTimeBetween('+1 day', '+30 days'),
            'expire_at' => $this->faker->dateTimeBetween('+31 days', '+60 days'),
            'uses' => 0,
        ]);
    }

    /**
     * Indicate that the coupon is high value.
     */
    public function highValue(): static
    {
        return $this->state(fn (array $attributes) => [
            'discount' => $this->faker->randomFloat(2, 50, 100),
            'max_uses' => $this->faker->numberBetween(1, 10),
            'budget' => $this->faker->randomFloat(2, 1000, 5000),
        ]);
    }

    /**
     * Indicate that the coupon is for a specific tutor.
     */
    public function forTutor(User $tutor): static
    {
        return $this->state(fn (array $attributes) => [
            'tutor_id' => $tutor->id,
        ]);
    }

    /**
     * Create a coupon with specific usage statistics.
     */
    public function withUsage(int $uses, ?int $maxUses = null): static
    {
        return $this->state(fn (array $attributes) => [
            'uses' => $uses,
            'max_uses' => $maxUses ?? $this->faker->numberBetween($uses, $uses + 50),
        ]);
    }
}
