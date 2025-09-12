<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;
use App\Models\Conversation;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class ConversationSeeder extends Seeder
{
    public function run()
    {
        $tutor = User::where('type', 'tutor')->first();
        $users = User::where('type', 'student')->get();
        $faker = Faker::create();
        foreach ($users as $user) {

            $profile = Profile::where('user_id', $user->id)->first();
            if (!$profile) {
                $profile = Profile::create([
                    'user_id' => $user->id,
                    'first_name' => $faker->firstName,
                    'last_name' => $faker->lastName,
                    'gender' => $faker->randomElement([1, 2]),
                    'phone_number' => $faker->phoneNumber,
                    'description' => $faker->sentence,
                    'tagline' => $faker->sentence,
                    'keywords' => $faker->sentence,
                    'native_language' => 'arabic',
                    'intro_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                ]);
            } else {
                $profile->update([
                    'first_name' => $faker->firstName,
                    'last_name' => $faker->lastName,
                    'intro_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                ]);
            }

            Conversation::updateOrCreate(
                [
                    'sender_id' => $tutor->id,
                    'receiver_id' => $user->id,
                ],
                [
                    'last_time_message' => now(),
                ]
            );
        }
    }
}