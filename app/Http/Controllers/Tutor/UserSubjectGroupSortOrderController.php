<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Models\UserSubjectGroup;
use Illuminate\Http\Request;

class UserSubjectGroupSortOrderController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'groups' => 'required|array',
            'groups.*.id' => 'required|integer|exists:user_subject_groups,id',
            'groups.*.sort_order' => 'required|integer|min:1',
        ]);

        try {
            $groups = $request->input('groups');

            // Verify that all groups belong to the current user
            $groupIds = collect($groups)->pluck('id');
            $validGroups = UserSubjectGroup::where('user_id', auth()->id())
                ->whereIn('id', $groupIds)
                ->get();

            if ($validGroups->count() !== count($groups)) {
                return back()->withErrors(['error' => 'Some groups do not belong to the current user']);
            }

            // Update sort order for each group
            foreach ($groups as $groupData) {
                UserSubjectGroup::where('id', $groupData['id'])
                    ->update(['sort_order' => $groupData['sort_order']]);
            }

            return back()->with('success', 'Group sort order updated successfully');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to update group sort order: ' . $e->getMessage()]);
        }
    }
}
