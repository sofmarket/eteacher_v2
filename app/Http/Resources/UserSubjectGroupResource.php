<?php

namespace App\Http\Resources;


use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserSubjectGroupResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                            => $this->id,
            'name'                          => $this->group->name,
            'description'                   => $this->group->description,
            'status'                        => $this->group->status,
            'subject_group_id'              => $this->subject_group_id,
            'sort_order'                    => $this->sort_order,
            'subjects'                      => $this->whenLoaded('subjects', fn() => UserSubjectGroupSubjectResource::collection($this->subjects)),
        ];
    }
}
