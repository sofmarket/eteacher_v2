<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Http\Resources\SlotBookingResource;
use App\Models\MonthlyTarget;
use App\Models\SlotBooking;
use App\Models\User;
use App\Models\UserSubjectSlot;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the tutor dashboard.
     */
    public function __invoke()
    {

        $userId = auth()->id();

        $stats = [
            'total_bookings' => SlotBooking::where('tutor_id', $userId)->count(),
            'total_students' => User::where('type', 'student')->count(), // TODO: check if the student has a booking with the tutor
            'total_revenue' => formatCurrency(SlotBooking::where('tutor_id', $userId)->sum('session_fee')),
            'today_revenue' => formatCurrency(SlotBooking::where('tutor_id', $userId)->whereDate('booked_at', now()->today())->sum('session_fee')),
        ];

        $recentBookings = SlotBooking::query()
            ->with(['student', 'slot.subjectGroupSubject'])
            ->where('tutor_id', $userId)
            ->latest()
            ->take(5)
            ->get();


        $monthlySessions = UserSubjectSlot::query()
            ->whereHas('subjectGroupSubject.userSubjectGroup', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->selectRaw('DATE_FORMAT(start_time, "%M") as month, COUNT(id) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->toArray();


        $monthlyRevenue = SlotBooking::query()
            ->where('tutor_id', $userId)
            ->selectRaw('DATE_FORMAT(booked_at, "%M-%Y") as month, SUM(session_fee) as revenue, COUNT(id) as bookings_count')
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->toArray();

        $monthlyTarget = MonthlyTarget::where('tutor_id', $userId)->first()?->target ?? 0;

        $thisMonthRevenue = SlotBooking::query()
            ->where('tutor_id', $userId)
            ->whereMonth('booked_at', now()->month)
            ->sum('session_fee');

        $percentage =  $thisMonthRevenue > $monthlyTarget ? 100 : ($thisMonthRevenue / $monthlyTarget) * 100;

        return inertia('Tutor/Home/Home', [
            'stats' => $stats,
            'recentBookings' => SlotBookingResource::collection($recentBookings),
            'monthlySessions' => $monthlySessions,
            'monthlyTarget' => $monthlyTarget,
            'thisMonthRevenue' => formatCurrency($thisMonthRevenue),
            'targetPercentage' => $percentage,
            'monthlyRevenue' => $monthlyRevenue,
        ]);
    }
}