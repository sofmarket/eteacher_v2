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

        $tutors->withMin('subjects as min_price', 'hour_rate')
            ->withAvg('reviews as avg_rating', 'rating')
            ->withCount('reviews as total_reviews')
            ->withCount([
                'bookingSlots as active_students' => function ($query) {
                    $query->whereStatus('active');
                }
            ]);

        $tutors->when(request()->has('session_type'), function ($query) {
            $query->whereHas('subjects.slots', function ($slot) {
                if (request()->session_type == 'private') {
                    $slot->where('spaces', '=', 1);
                } else {
                    $slot->where('spaces', '>', 1);
                }
            });
        });

        $tutors->when(request()->has('max_price'), function ($query) {
            $query->whereHas('subjects', function ($query) {
                $query->where('hour_rate', '<=', request()->max_price);
            });
        });

        $tutors->when(request()->has('subject_id'), function ($query) {
            $query->whereHas('subjects', function ($query) {
                $query->where('subject_id', request()->subject_id);
            });
        });
        $tutors->when(request()->has('group_id'), function ($query) {
            $query->whereHas('subjectGroups', function ($query) {
                $query->where('subject_group_id', request()->group_id);
            });
        });

        $tutors->when(request()->has('keyword'), function ($query) {
            $query->where(function ($query) {

                $keyword = '%' . request()->keyword . '%';

                $query->whereHas('profile', function ($query) use ($keyword) {
                    $query->where('first_name', 'like', $keyword)
                        ->orWhere('last_name', 'like', $keyword);
                });

                // todo: tobe tested and uncommented
                // $query->orWhereHas('subjects.subject', function ($query) use ($keyword) {
                //     $query->where('name', 'like', $keyword);
                // });

                // $query->orWhereHas('groups.group', function ($query) use ($keyword) {
                //     $query->where('name', 'like', $keyword);
                // });

            });
        });

        $tutors->when(request()->has('city'), function ($query) {
            $query->whereHas('address', function ($address) {
                $address->where('city', 'like', '%' . request()->city . '%');
            });
        });

        $tutors->when(request()->has('rating'), function ($query) {
            $query->whereHas('reviews', function ($query) {
                $query->select('user_id');
                $query->groupBy('user_id');
                $query->havingRaw('avg(rating) >= ?', (array) request()->rating);
            });
        });

        $tutors->when(request()->has('sort_by'), function ($query) {
            switch (request()->sort_by) {
                case 'newest':
                    $query->orderBy('created_at', 'desc');
                    break;
                case 'oldest':
                    $query->orderBy('created_at', 'asc');
                    break;
                case 'asc':
                    $query->join('profiles', 'profiles.user_id', '=', 'users.id')->orderBy('first_name', 'asc');
                    break;
                case 'desc':
                    $query->join('profiles', 'profiles.user_id', '=', 'users.id')->orderBy('first_name', 'desc');
                    break;
            }
        }, function ($query) {
            $query->orderBy('avg_rating', 'desc');
            $query->orderBy('created_at', 'desc');
        });

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
        ])
            ->whereHas('profile', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })
            ->firstOrFail();

        return inertia('Front/Tutors/Show/Index', [
            'tutor'         => TutorResource::make($tutor),
        ]);

    }
}
