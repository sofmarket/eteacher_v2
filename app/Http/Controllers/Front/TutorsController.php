<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;

class TutorsController extends Controller
{
    public function index()
    {
        $tutors = User::where('type', 'tutor')->paginate(15);
        return inertia('Front/Tutors/Index', [
            'tutors' => UserResource::collection($tutors),
        ]);
    }

    public function show(User $tutor)
    {
        $tutor->load([
            'profile',
            'socialProfiles',
            'educations',
            'experiences',
            'certificates',
        ]);
        return inertia('Front/Tutors/Show', [
            'tutor' => UserResource::make($tutor),
        ]);
    }
}
