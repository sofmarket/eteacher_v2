<?php

namespace App\Http\Controllers\Tutor;

use App\Actions\Tutor\DeleteUserSubjectAction;
use App\Actions\Tutor\UpsertUserSubjectAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tutor\UserSubjectRequest;
use App\Models\UserSubjectGroupSubject;

class UserSubjectController extends Controller
{

    public function __construct(
        protected UpsertUserSubjectAction $upsertUserSubjectAction,
        protected DeleteUserSubjectAction $deleteUserSubjectAction
    ) {
    }

    public function store(UserSubjectRequest $request)
    {
        try {
            $this->upsertUserSubjectAction->handle($request->validated());

            return back()->with('success', 'Subject added successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['subject_id' => $e->getMessage()]);
        }
    }

    public function update(UserSubjectRequest $request, UserSubjectGroupSubject $subject)
    {

        $this->upsertUserSubjectAction->handle($request->validated(), $subject);

        return back()->with('success', 'Subject updated successfully.');
    }

    public function destroy(UserSubjectGroupSubject $subject)
    {
        $this->deleteUserSubjectAction->handle($subject);

        return back()->with('success', 'Subject removed successfully.');
    }
}
