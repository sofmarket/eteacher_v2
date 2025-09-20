<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Http\Resources\SubjectGroupResource;
use App\Http\Resources\SubjectResource;
use App\Http\Resources\TutorResource;
use App\Models\City;
use App\Models\Subject;
use App\Models\SubjectGroup;
use App\Models\User;

class TutorsController extends Controller
{
    public function index()
    {

        $tutors = User::tutor()->has('subjectSlots');

        $tutors->with([
            'subjects' => function ($query) {
                $query->withCount(['slots as sessions' => fn($query) => $query->where('end_time', '>=', now())]);
                $query->with('subject:id,name');
            },
            'languages:id,name',
            'address',
        ]);

        $tutors->withWhereHas('profile', function ($query) {
            // $query->whereNotNull('verified_at');
            $query->select('id', 'verified_at', 'user_id', 'first_name', 'last_name', 'image', 'gender', 'tagline', 'description', 'slug', 'intro_video');
        });

        $tutors->withStats();

        $tutors->byRating() 
            ->bySessionType()
            ->byKeyword()
            ->bySubjectGroup()
            ->bySubject()
            ->byCity()
            ->sortBy();

        if(request()->wantsJson()) {
            return TutorResource::collection($tutors->paginate($this->perPage()));
        }

        return inertia('Front/Tutors/Index/Index', [
            'tutors' => TutorResource::collection($tutors->paginate($this->perPage())),
            'cities'        => CityResource::collection(City::all()),
            'subjects'      => SubjectResource::collection(Subject::all()),
            'subjectGroups' => SubjectGroupResource::collection(SubjectGroup::all()),
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
            'subjects' => function ($query) {
                $query->withCount(['slots as sessions' => fn($query) => $query->where('end_time', '>=', now())]);
                $query->with('subject:id,name');
            },
            'languages:id,name',
            'address',
        ])
        ->withStats()
            ->whereHas('profile', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })
            ->firstOrFail();

        return inertia('Front/Tutors/Show/Index', [
            'tutor'         => TutorResource::make($tutor),
        ]);

    }
}
