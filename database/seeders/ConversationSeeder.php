<?php

namespace Database\Seeders;

use App\Models\ConversationMessage;
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
        $faker = Faker::create();
        
        $tutor = User::where('type', 'tutor')->first();
        $users = User::where('type', 'student')->get();
        
        foreach ($users as $user) {
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

        $conversation = Conversation::first();

        for ($i = 0; $i < 150; $i++) {
            ConversationMessage::create([
                'conversation_id' => $conversation->id,
                'sender_id' => $conversation->sender_id,
                'receiver_id' => $conversation->receiver_id,
                'body' => $faker->sentence,
            ]);
        }

    }
}