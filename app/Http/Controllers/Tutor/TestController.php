<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Events\MessageReceived;
use App\Models\ConversationMessage;
use App\Notifications\MessageReceivedNotification;


class TestController extends Controller
{
    public function __invoke()
    {
        $user = User::find(1);

        $messages = ConversationMessage::query()
            ->where('sender_id', $user->id)
            ->orWhere('receiver_id', $user->id)
            ->get();

        foreach($messages as $message) {
            $user->notify(new MessageReceivedNotification($message));
        }

        dd('done');

        return inertia('Tutor/Test');
    }
}