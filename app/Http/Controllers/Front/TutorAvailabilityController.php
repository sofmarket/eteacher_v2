<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class TutorAvailabilityController extends Controller
{
    public function index($slug)
    {
        $tutor = User::query()
            ->whereHas('profile', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })
            ->firstOrFail();
        
        return inertia('Front/Tutor/Availability/Index', [
            'tutor' => $tutor,
        ]);
    }

    public function store(Request $request)
    {
        return back()->with('message', 'Availability saved successfully');
    }
}
