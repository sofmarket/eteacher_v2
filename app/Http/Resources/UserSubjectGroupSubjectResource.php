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
            'id'                            => $this->id,
            'description'                   => $this->description,
            'hour_rate'                     => $this->hour_rate,
            'image'                         => $this->image,
            'sort_order'                    => $this->sort_order,
            'name'                          => $this->subject->name,
            'status'                        => $this->subject->status,
        ];
    }
}