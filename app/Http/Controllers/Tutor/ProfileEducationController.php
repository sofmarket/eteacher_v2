<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tutor\EducationRequest;
use App\Models\User;
use App\Models\UserEducation;

class ProfileEducationController extends Controller
{
    public function store(EducationRequest $request)
    {
        $user = User::findOrFail(auth()->id());
        
        $user->educations()->create($request->validated());

        return redirect()->route('tutor.profile')->with('message', 'Profile updated successfully');

    }

    public function update(EducationRequest $request, UserEducation $education)
    {
        // Ensure the education belongs to the authenticated user
        if ($education->user_id !== auth()->id()) {
            abort(403);
        }

        $education->update($request->validated());

        return redirect()->route('tutor.profile')->with('message', 'Profile updated successfully');

    }

    public function destroy(UserEducation $education)
    {
        // Ensure the education belongs to the authenticated user
        if ($education->user_id !== auth()->id()) {
            abort(403);
        }

        $education->delete();

        return redirect()->route('tutor.profile.education')
            ->with('message', 'Education record deleted successfully');
    }
} 