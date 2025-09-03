<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            User::factory()->create([
                'email' => "student$i@test.com",
                'password' => 'password',
                'type' => 'student',
            ]);
        }
    }
}