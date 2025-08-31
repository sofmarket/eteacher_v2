<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserSubjectGroupResource;
use App\Models\UserSubjectGroup;

class SlotBookingsController extends Controller
{
    public function index()
    {

        // $userSubjectGroups = UserSubjectGroup::query()
        //     ->where('user_id', auth()->id())
        //     ->orderBy('sort_order')
        //     ->get();

        return inertia('Tutor/Bookings/UpcomingBookings/Index', [
            // 'userSubjectGroups' => UserSubjectGroupResource::collection($userSubjectGroups),
        ]);
    
    }
}
