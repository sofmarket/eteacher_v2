<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class StudentSeeder extends Seeder
{
    public function run()
    {
        User::factory(50)->create([
            'type' => 'student',
        ]);
    }
}