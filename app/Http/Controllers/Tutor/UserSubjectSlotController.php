<?php

namespace App\Http\Controllers\Tutor;

use App\Actions\Tutor\DeleteUserSubjectSlotAction;
use App\Actions\Tutor\CreateUserSubjectSlotAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tutor\UserSubjectSlotRequest;
use App\Models\UserSubjectSlot;
use Illuminate\Http\Request;

class UserSubjectSlotController extends Controller
{
    public function __construct(
        protected CreateUserSubjectSlotAction $createUserSubjectSlotAction,
        protected DeleteUserSubjectSlotAction $deleteUserSubjectSlotAction
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slots = UserSubjectSlot::whereHas('subjectGroupSubjects.userSubjectGroup', function ($query) {
            $query->where('user_id', auth()->id());
        })
        ->with(['subjectGroupSubjects.subject', 'subjectGroupSubjects.userSubjectGroup.subjectGroup'])
        ->orderBy('start_time', 'desc')
        ->paginate(15);

        return view('tutor.slots.index', compact('slots'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserSubjectSlotRequest $request)
    {
        try {
            $this->createUserSubjectSlotAction->handle($request->validated());
            return back()->with('message', 'Session created successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(UserSubjectSlot $slot)
    {
        // Verify the slot belongs to the authenticated user
        $slot->load(['subjectGroupSubjects.subject', 'subjectGroupSubjects.userSubjectGroup.subjectGroup', 'bookings.student']);
        
        if ($slot->subjectGroupSubjects->userSubjectGroup->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access.');
        }

        return view('tutor.slots.show', compact('slot'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserSubjectSlot $slot)
    {
        // Verify the slot belongs to the authenticated user
        $slot->load(['subjectGroupSubjects.subject', 'subjectGroupSubjects.userSubjectGroup.subjectGroup']);
        
        if ($slot->subjectGroupSubjects->userSubjectGroup->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access.');
        }

        return view('tutor.slots.edit', compact('slot'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserSubjectSlotRequest $request, UserSubjectSlot $slot)
    {
        try {
            // Verify the slot belongs to the authenticated user
            $slot->load('subjectGroupSubjects.userSubjectGroup');
            
            if ($slot->subjectGroupSubjects->userSubjectGroup->user_id !== auth()->id()) {
                throw new \Exception('You are not authorized to update this session.');
            }

            // $this->upsertUserSubjectSlotAction->handle($request->validated(), $slot);
            return back()->with('message', 'Session updated successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserSubjectSlot $slot)
    {
        try {
            $this->deleteUserSubjectSlotAction->handle($slot);
            return back()->with('message', 'Session deleted successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Get slots for a specific subject group subject.
     */
    public function getSlotsBySubject(Request $request)
    {
        $request->validate([
            'user_subject_group_subject_id' => 'required|exists:user_subject_group_subjects,id'
        ]);

        $slots = UserSubjectSlot::where('user_subject_group_subject_id', $request->user_subject_group_subject_id)
            ->whereHas('subjectGroupSubjects.userSubjectGroup', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->with(['subjectGroupSubjects.subject'])
            ->orderBy('start_time', 'asc')
            ->get();

        return response()->json($slots);
    }
}
