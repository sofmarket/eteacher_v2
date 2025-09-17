<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;

class TutorsController extends Controller
{
    public function index()
    {
        $tutors = User::tutor()->has('subjectSlots')->paginate(15);
        return inertia('Front/Tutors/Index', [
            'tutors' => UserResource::collection($tutors),
        ]);
    }

    public function show($slug)
    {
        
        $tutor = User::with([
            'profile',
            'socialProfiles',
            'educations',
            'experiences',
            'certificates',
        ])
        ->whereHas('profile', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })
        ->firstOrFail();

        return inertia('Front/Tutors/Show', [
            'tutor' => UserResource::make($tutor),
        ]);

    }
}
