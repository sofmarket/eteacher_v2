<?php

namespace Database\Seeders;

use App\Models\UserSubjectSlot;
use Illuminate\Database\Seeder;
use App\Models\User;

class TutorSeeder extends Seeder
{
    public function run()
    {
        User::factory()->create([
            'email' => 'tutor@test.com',
            'type' => 'tutor',
        ]);

        User::factory(50)->create([
            'type' => 'tutor',
        ]);

        UserSubjectSlot::factory(100)->create();
    }
}