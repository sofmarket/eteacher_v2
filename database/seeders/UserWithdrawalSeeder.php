<?php

namespace Database\Seeders;

use App\Models\UserWithdrawal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserWithdrawalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserWithdrawal::factory()->count(50)->create();
    }
}
