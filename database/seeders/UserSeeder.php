<?php

namespace Database\Seeders;

use App\Models\UserSubjectSlot;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            TutorSeeder::class,
            StudentSeeder::class,
        ]);
    }
}