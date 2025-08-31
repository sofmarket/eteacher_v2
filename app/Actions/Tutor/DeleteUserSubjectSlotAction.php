<?php

namespace App\Actions\Tutor;

use App\Models\UserSubjectSlot;

class DeleteUserSubjectSlotAction
{
    public function handle(UserSubjectSlot $userSubjectSlot): void
    {
        // Verify the slot belongs to the authenticated user
        $userSubjectSlot->load('subjectGroupSubjects.userSubjectGroup');
        
        if ($userSubjectSlot->subjectGroupSubjects->userSubjectGroup->user_id !== auth()->id()) {
            throw new \Exception('You are not authorized to delete this session.');
        }

        // Check if there are any bookings for this slot
        if ($userSubjectSlot->bookings()->exists()) {
            throw new \Exception('Cannot delete session with existing bookings. Please cancel all bookings first.');
        }

        $userSubjectSlot->delete();
    }
}
