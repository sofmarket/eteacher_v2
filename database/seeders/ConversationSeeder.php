<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Conversation;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ConversationSeeder extends Seeder
{
    public function run()
    {
        $tutor = User::where('type', 'tutor')->first();
        $users = User::where('type', 'student')->get();
        foreach ($users as $user) {
            Conversation::create([
                'sender_id' => $tutor->id,
                'receiver_id' => $user->id,
                'last_time_message' => now(),
            ]);
        }
    }
}