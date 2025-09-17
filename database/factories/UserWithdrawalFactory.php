<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserWithdrawal>
 */
class UserWithdrawalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $payoutMethods = ['wafacash', 'cashpuls', 'bank'];
        $statuses = ['pending', 'declined', 'paid'];
        $payoutMethod = $this->faker->randomElement($payoutMethods);
        
        // Generate details based on payout method
        $details = match($payoutMethod) {
            'wafacash' => [
                'phone_number' => $this->faker->phoneNumber(),
                'account_name' => $this->faker->name(),
            ],
            'cashpuls' => [
                'phone_number' => $this->faker->phoneNumber(),
                'account_name' => $this->faker->name(),
            ],
            'bank' => [
                'account_number' => $this->faker->bankAccountNumber(),
                'account_name' => $this->faker->name(),
                'bank_name' => $this->faker->randomElement(['Bank of America', 'Chase', 'Wells Fargo', 'Citibank']),
                'routing_number' => $this->faker->numerify('########'),
            ],
            default => []
        };

        return [
            'user_id' => User::tutor()->inRandomOrder()->first()->id,
            'amount' => $this->faker->randomFloat(2, 50, 2000), // Between $50 and $2000
            'payout_method' => $payoutMethod,
            'status' => $this->faker->randomElement($statuses),
            'details' => $details,
        ];
    }
}
