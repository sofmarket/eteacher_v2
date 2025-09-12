<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SlotBookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            
            'id'                    => $this->id,
            'status'                => $this->status,
            'session_fee'           => formatCurrency($this->session_fee),
            'booked_at'             => $this->booked_at,
            'meta_data'             => $this->meta_data,
            
            // Related data
            'student'               => $this->whenLoaded('student', function () {
                return [
                    'id'        => $this->student->id,
                    'email'     => $this->student->email,
                    'name'      => $this->student->profile?->fullName,
                    'avatar'    => $this->student->profile?->image ?? 'https://ui-avatars.com/api/?name=' . $this->student->profile?->fullName,
                ];
            }),

            'subject'                  => $this->whenLoaded('slot', function () {
                return [
                    'name'      => $this->slot->subjectGroupSubject->subject->name,
                    'status'    => $this->slot->subjectGroupSubject->subject->status,
                ];
            }),
            
        ];
    }
}
