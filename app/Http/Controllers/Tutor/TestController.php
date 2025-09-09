<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Events\MessageReceived;


class TestController extends Controller
{
    public function __invoke()
    {

        // $invoices = \App\Models\Invoice::get();

        // $statuses = ['pending', 'paid', 'refunded'];

        // foreach ($invoices as $invoice) {
        //     $invoice->update([
        //         'status' => $statuses[array_rand($statuses)],
        //     ]);
        // }

        dd('test');

        // $message = \App\Models\ConversationMessage::find(1);
        // broadcast(new MessageReceived($message))->toOthers();

        // dd($message);

        $user = User::find(1);

        $user->profile()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'gender' => 'male',
            ]
        );

        dd($user->profile);

        return inertia('Tutor/Test');
    }
}