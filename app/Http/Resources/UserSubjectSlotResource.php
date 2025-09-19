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
            'id'                                    => $this->whenHas('id'),
            'end_time'                              => $this->whenHas('end_time'),
            'spaces'                                => $this->whenHas('spaces'),
            'duration'                              => $this->whenHas('duration'),
            'total_booked'                          => $this->whenHas('total_booked'),
            'session_fee'                           => $this->whenHas('session_fee'),
            'type'                                  => $this->whenHas('type'),
            'description'                           => $this->whenHas('description'),
            'available_spaces'                      => $this->whenHas('spaces') - $this->whenHas('total_booked'),
            
            'date'                                  => $this->whenHas('start_time', function () {
                return $this->start_time->format('Y-m-d');
            }),
            'time'                                  => $this->whenHas('start_time', function () {
                return $this->start_time->format('H:i');
            }),
            
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
