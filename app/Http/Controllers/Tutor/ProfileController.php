<?php

namespace App\Http\Controllers\Tutor;

use App\Enums\EmploymentLocation;
use App\Enums\EmploymentType;
use App\Enums\SocialPlatforms;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tutor\ProfileRequest;
use App\Models\City;
use App\Models\Language;
use App\Models\User;
use App\Actions\Tutor\UpdateTutorProfileAction;

class ProfileController extends Controller
{

    public function __construct(
        protected UpdateTutorProfileAction $updateTutorProfileAction
    ) {
    }

    public function edit()
    {
        $user = User::with([
            'profile',
            'socialProfiles',
            'educations',
            'experiences',
            'certificates',
            'languages',
            'address',
            'identityVerification'
        ])->find(auth()->id());
        
        return inertia('Tutor/Profile/Index', [
            'user' => $user,
            'cities' => City::all(),
            'languages' => Language::active()->get(),
            'socialPlatforms' => SocialPlatforms::values(),
            'employmentTypes' => EmploymentType::toArray(),
            'employmentLocations' => EmploymentLocation::toArray(),
        ]);
    }

    public function update(ProfileRequest $request)
    {

        $user = User::findOrFail(auth()->id());

        $this->updateTutorProfileAction->handle(
            $user, 
            $request->all()
        );

        return redirect()->route('tutor.profile')->with('message', 'Profile updated successfully');
    }
}
