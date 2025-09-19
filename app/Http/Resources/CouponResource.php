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
            'id' => $this->whenHas('id'),
            'code' => $this->whenHas('code'),
            'name' => $this->whenHas('name'),
            'uses' => $this->whenHas('uses'),
            'status' => $this->whenHas('status'),
            'max_uses' => $this->whenHas('max_uses'),
            'discount' => $this->whenHas('discount'),
            'is_fixed' => $this->whenHas('is_fixed'),
            'budget' => $this->whenHas('budget'),
            'start_at' => $this->whenHas('start_at', function () {
                return $this->start_at?->format('Y-m-d');
            }),
            'expire_at' => $this->whenHas('expire_at', function () {
                return $this->expire_at?->format('Y-m-d');
            }),

            // Related data
            'tutor' => $this->whenLoaded('tutor', UserResource::make($this->tutor)),
            // Usage statistics
            'usage_percentage' => $this->whenHas('max_uses', function () {
                return $this->max_uses > 0 ? round(($this->uses / $this->max_uses) * 100, 2) : 0;
            }),

            // Remaining uses
            'remaining_uses' => $this->whenHas('max_uses', function () {
                return max(0, $this->max_uses - $this->uses);
            }),
        ];
    }
}
