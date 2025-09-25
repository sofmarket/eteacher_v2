<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExperienceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                    => $this->whenHas('id'),
            'title'                 => $this->whenHas('title'),
            'company'               => $this->whenHas('company'),
            'location'              => $this->whenHas('location'),
            'city'                  => $this->whenHas('city'),
            'is_current'            => $this->whenHas('is_current'),
            'description'           => $this->whenHas('description'),
            'employment_type'       => $this->whenHas('employment_type', function () {
                return $this->employment_type->label();
            }),
            'start_date'            => $this->whenHas('start_date', function () {
                return \Carbon\Carbon::parse($this->start_date)->format('M d, Y');
            }),
            'end_date'              => $this->whenHas('end_date', function () {
                return \Carbon\Carbon::parse($this->end_date)->format('M d, Y');
            }),
        ];
    }
}
