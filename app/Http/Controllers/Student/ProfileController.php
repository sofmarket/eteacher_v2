<?php

namespace App\Http\Controllers\Student;


use App\Http\Controllers\Controller;
use App\Http\Requests\Student\ProfileRequest;
use App\Models\City;
use App\Models\User;
use App\Actions\Student\UpdateStudentProfileAction;

class ProfileController extends Controller
{

    public function __construct(protected UpdateStudentProfileAction $updateStudentProfileAction) {}

    public function edit()
    {
        $user = User::with([
            'profile',
            'address',
            'identityVerification'
        ])->find(auth()->id());
        
        return inertia('Student/Profile/Index', [
            'user' => $user,
            'cities' => City::all(),
        ]);
    }

    public function update(ProfileRequest $request)
    {
        $user = User::findOrFail(auth()->id());
        
        $this->updateStudentProfileAction->handle(
            $user, 
            $request->all()
        );

        return redirect()->route('student.profile')->with('message', 'Profile updated successfully');
    }
}
