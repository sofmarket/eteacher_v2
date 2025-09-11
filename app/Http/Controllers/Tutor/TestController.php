<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Http\Resources\SlotBookingResource;
use App\Models\SlotBooking;
use App\Models\User;
use App\Events\MessageReceived;
use App\Models\ConversationMessage;
use App\Models\UserSubjectSlot;
use App\Notifications\MessageReceivedNotification;


class TestController extends Controller
{
    public function __invoke()
    {

        $monthlySessions = UserSubjectSlot::query()
            ->whereHas('subjectGroupSubject.userSubjectGroup', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->selectRaw('DATE_FORMAT(start_time, "%M") as month, COUNT(id) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->toArray();

        dd($monthlySessions);
            
        $booking = SlotBooking::query()
            ->with(['student', 'slot.subjectGroupSubject'])
            ->latest()
            ->take(5)
            ->first();
        
        return SlotBookingResource::make($booking);

        // $user = User::find(1);

        // $messages = ConversationMessage::query()
        //     ->where('sender_id', $user->id)
        //     ->orWhere('receiver_id', $user->id)
        //     ->get();

        // foreach($messages as $message) {
        //     $user->notify(new MessageReceivedNotification($message));
        // }

        dd('done');

        return inertia('Tutor/Test');
    }
}