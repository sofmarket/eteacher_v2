<?php

namespace App\Http\Resources;


use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserSubjectGroupSubjectResource extends JsonResource
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
            'description'                   => $this->whenHas('description'),
            'hour_rate'                     => $this->whenHas('hour_rate'),
            'image'                         => $this->whenHas('image'),
            'sort_order'                    => $this->whenHas('sort_order'),
            'name'                          => $this->whenLoaded('subject', function () {
                return $this->subject->name;
            }),
            'status'                        => $this->whenLoaded('subject', function () {
                return $this->subject->status;
            }),
        ];
    }
}