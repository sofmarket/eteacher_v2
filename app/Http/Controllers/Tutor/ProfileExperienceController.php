<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tutor\ExperienceRequest;
use App\Models\User;
use App\Models\UserExperience;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProfileExperienceController extends Controller
{

    public function index()
    {
        $user = User::with([
            'experiences'
        ])->find(auth()->id());
        
        return Inertia::render('Tutor/Profile/Experience', [
            'user' => $user,
            'experiences' => $user->experiences()->orderBy('start_date', 'desc')->get(),
        ]);
    }

    public function store(ExperienceRequest $request)
    {
        $user = User::findOrFail(auth()->id());
        
        $user->experiences()->create($request->validated());

        return redirect()->route('tutor.profile')
            ->with('message', 'Experience record added successfully');
    }

    public function update(ExperienceRequest $request, UserExperience $experience)
    {
        // Ensure the experience belongs to the authenticated user
        if ($experience->user_id !== auth()->id()) {
            abort(403);
        }

        $experience->update($request->validated());

        return redirect()->route('tutor.profile')
            ->with('message', 'Experience record updated successfully');
    }

    public function destroy(UserExperience $experience)
    {
        // Ensure the experience belongs to the authenticated user
        if ($experience->user_id !== auth()->id()) {
            abort(403);
        }

        $experience->delete();

        return redirect()->route('tutor.profile')
            ->with('message', 'Experience record deleted successfully');
    }
} 