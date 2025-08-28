<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Models\UserSubjectGroupSubject;
use Illuminate\Http\Request;

class UserSubjectSortOrderController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'group_id' => 'required|integer|exists:user_subject_groups,id',
            'subjects' => 'required|array',
            'subjects.*.id' => 'required|integer|exists:user_subject_group_subjects,id',
            'subjects.*.sort_order' => 'required|integer|min:1',
        ]);

        try {

            $groupId = $request->input('group_id');
            $subjects = $request->input('subjects');

            // Verify that all subjects belong to the specified group
            $subjectIds = collect($subjects)->pluck('id');
            $validSubjects = UserSubjectGroupSubject::where('user_subject_group_id', $groupId)
                ->whereIn('id', $subjectIds)
                ->get();

            if ($validSubjects->count() !== count($subjects)) {
                return back()->withErrors(['error' => 'Some subjects do not belong to the specified group']);
            }

            // Update sort order for each subject
            foreach ($subjects as $subjectData) {
                UserSubjectGroupSubject::where('id', $subjectData['id'])
                    ->update(['sort_order' => $subjectData['sort_order']]);
            }

            return back()->with('success', 'Sort order updated successfully');


        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to update sort order: ' . $e->getMessage()]);

        }
    }
}
