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
            'id'                            => $this->whenHas('id'),
            'name'                          => $this->whenHas('name'),
            'description'                   => $this->whenHas('description'),
            'status'                        => $this->whenHas('status'),
            'subject_group_id'              => $this->whenHas('subject_group_id'),
            'sort_order'                    => $this->whenHas('sort_order'),
            'subjects'                      => $this->whenLoaded('subjects', UserSubjectGroupSubjectResource::collection($this->subjects)),
        ];
    }
}
