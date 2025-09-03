<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserSubjectSlotResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                                    => $this->id,
            'date'                                  => $this->start_time->format('Y-m-d'),
            'time'                                  => $this->start_time->format('H:i'),
            'end_time'                              => $this->end_time,
            'spaces'                                => $this->spaces,
            'duration'                              => $this->duration,
            'total_booked'                          => $this->total_booked,
            'session_fee'                           => $this->session_fee,
            'type'                                  => $this->type,
            'description'                           => $this->description,
            'available_spaces'                      => $this->spaces - $this->total_booked,
            
            // Related data
            'subject'                               => $this->whenLoaded('subjectGroupSubjects.subject', function () {
                return [
                    'id'    => $this->subjectGroupSubjects->subject->id,
                    'name'  => $this->subjectGroupSubjects->subject->name,
                    'status' => $this->subjectGroupSubjects->subject->status,
                ];
            }),
            
            // 'user_subject_group'                    => $this->whenLoaded('subjectGroupSubjects.userSubjectGroup', function () {
            //     return [
            //         'id'            => $this->subjectGroupSubjects->userSubjectGroup->id,
            //         'sort_order'    => $this->subjectGroupSubjects->userSubjectGroup->sort_order,
            //     ];
            // }),
            
            // 'subject_group'                         => $this->whenLoaded('subjectGroupSubjects.userSubjectGroup.subjectGroup', function () {
            //     return [
            //         'id'          => $this->subjectGroupSubjects->userSubjectGroup->subjectGroup->id,
            //         'name'        => $this->subjectGroupSubjects->userSubjectGroup->subjectGroup->name,
            //         'description' => $this->subjectGroupSubjects->userSubjectGroup->subjectGroup->description,
            //         'status'      => $this->subjectGroupSubjects->userSubjectGroup->subjectGroup->status,
            //     ];
            // }),
            
        ];
    }
}
