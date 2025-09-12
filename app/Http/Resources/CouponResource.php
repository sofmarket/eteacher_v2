<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CouponResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'name' => $this->name,
            'uses' => $this->uses,
            'status' => $this->status,
            'max_uses' => $this->max_uses,
            'discount' => $this->discount,
            'is_fixed' => $this->is_fixed,
            'budget' => $this->budget,
            'start_at' => $this->start_at?->format('Y-m-d'),
            'expire_at' => $this->expire_at?->format('Y-m-d'),

            // Related data
            'tutor' => $this->whenLoaded('tutor', UserResource::make($this->tutor)),
            // Usage statistics
            'usage_percentage' => $this->when($this->max_uses, function () {
                return $this->max_uses > 0 ? round(($this->uses / $this->max_uses) * 100, 2) : 0;
            }),

            // Remaining uses
            'remaining_uses' => $this->when($this->max_uses, function () {
                return max(0, $this->max_uses - $this->uses);
            }),
        ];
    }
}
