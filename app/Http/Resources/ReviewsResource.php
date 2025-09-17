<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                 => $this->whenHas('id'),
            'name'               => $this->whenHas('name'),
            'description'        => $this->whenHas('description'),
            'status'             => $this->whenHas('status'),
            'deleted_at'         => $this->whenHas('deleted_at'),
            'created_at'         => $this->whenHas('created_at'),
            'updated_at'         => $this->whenHas('updated_at'),
        ];
    }
}
