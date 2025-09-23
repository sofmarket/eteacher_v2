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

class TutorController extends Controller
{
    public function index()
    {
        if (request()->wantsJson()) {
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
            return TutorResource::collection($tutors->paginate($this->perPage()));
        }

        return inertia('Front/Tutor/Index/Index', [
            'cities' => CityResource::collection(City::all()),
            'subjects' => SubjectResource::collection(Subject::all()),
            'subjectGroups' => SubjectGroupResource::collection(SubjectGroup::all()),
            'filters' => [
                'group_id' => request()->get('group_id', null),
                'subject_id' => request()->get('subject_id', null),
                'city' => request()->get('city', null),
                'max_price' => request()->get('max_price', null),
                'session_type' => request()->get('session_type', 'all'),
            ],
            'keyword' => request()->get('keyword', ''),
            'sort_by' => request()->get('sort_by', 'newest'),
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

        return inertia('Front/Tutor/Show/Index', [
            'tutor' => TutorResource::make($tutor),
        ]);

    }
}
