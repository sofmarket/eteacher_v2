<?php

namespace App\Http\Controllers\Tutor;

use App\Actions\Tutor\DeleteUserSubjectGroupAction;
use App\Actions\Tutor\UpsertUserSubjectGroupAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tutor\UserSubjectGroupRequest;
use App\Models\UserSubjectGroup;

class UserSubjectGroupController extends Controller
{
    public function __construct(
        protected UpsertUserSubjectGroupAction $upsertUserSubjectGroupAction,
        protected DeleteUserSubjectGroupAction $deleteUserSubjectGroupAction
    ) {
    }

    public function store(UserSubjectGroupRequest $request)
    {
        try {
            $this->upsertUserSubjectGroupAction->handle($request->validated());

            return back()->with('success', 'Subject group added successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['subject_group_id' => $e->getMessage()]);
        }
    }

    public function update(UserSubjectGroupRequest $request, UserSubjectGroup $group)
    {
        try {
            // Verify the group belongs to the current user
            if ($group->user_id !== auth()->id()) {
                return back()->withErrors(['subject_group_id' => 'Unauthorized to update this subject group.']);
            }

            $this->upsertUserSubjectGroupAction->handle($request->validated(), $group);

            return back()->with('success', 'Subject group updated successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['subject_group_id' => $e->getMessage()]);
        }
    }

    public function destroy(UserSubjectGroup $group)
    {
        try {
            $this->deleteUserSubjectGroupAction->handle($group);

            return back()->with('success', 'Subject group removed successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
