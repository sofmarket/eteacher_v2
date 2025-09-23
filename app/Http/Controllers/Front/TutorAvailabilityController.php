<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserSubjectSlotResource;
use App\Models\User;
use Carbon\Carbon;
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

        if(request()->wantsJson()) {
            
            request()->validate([
                'first_day' => 'required|date',
                'last_day' => 'required|date',
            ]);

            $firstDay = Carbon::parse(request()->get('first_day'));
            $lastDay = Carbon::parse(request()->get('last_day'));
            
            $slots = $tutor->subjectSlots()->whereBetween('start_time', [$firstDay, $lastDay])->get();
        
            return response()->json([
                'slots' => UserSubjectSlotResource::collection($slots),
            ]);
        
        }
        
        return inertia('Front/Tutor/Availability/Index', [
            'tutor' => $tutor,
            'slug' => $slug,
        ]);
    }

    public function store(Request $request)
    {
        return back()->with('message', 'Availability saved successfully');
    }
}
