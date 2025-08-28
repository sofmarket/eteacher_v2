<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Http\Resources\SubjectGroupResource;
use App\Http\Resources\SubjectResource;
use App\Http\Resources\UserSubjectGroupResource;
use App\Models\Subject;
use App\Models\SubjectGroup;
use App\Models\UserSubjectGroup;

class BookingsController extends Controller
{
    public function index()
    {

        $userSubjectGroups = UserSubjectGroup::query()
            ->where('user_id', auth()->id())
            ->orderBy('sort_order')
            ->get();

        $subjectGroups = SubjectGroup::where('status', 'active')->get();

        $subjects = Subject::where('status', 'active')->get();

        return inertia('Tutor/Bookings/Index', [
            'userSubjectGroups' => UserSubjectGroupResource::collection($userSubjectGroups),
            'subjectGroups' => SubjectGroupResource::collection($subjectGroups),
            'subjects' => SubjectResource::collection($subjects),
        ]);
    
    }
}
