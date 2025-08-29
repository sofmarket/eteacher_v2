<?php

namespace App\Http\Controllers\Tutor;

use App\Actions\Tutor\DeleteUserSubjectGroupAction;
use App\Actions\Tutor\UpdateUserSubjectGroupsAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tutor\UserSubjectGroupRequest;
use App\Models\UserSubjectGroup;

class UserSubjectGroupController extends Controller
{
    public function __construct(
        protected UpdateUserSubjectGroupsAction $updateUserSubjectGroupsAction,
        protected DeleteUserSubjectGroupAction $deleteUserSubjectGroupAction
    ) {
    }

    public function store(UserSubjectGroupRequest $request)
    {
        try {
            $this->updateUserSubjectGroupsAction->handle($request->validated());
            return back()->with('message', 'Subject group added successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['subject_groups' => $e->getMessage()]);
        }
    }

    public function destroy(UserSubjectGroup $group)
    {
        try {
            $this->deleteUserSubjectGroupAction->handle($group);
            return back()->with('message', 'Subject group removed successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
