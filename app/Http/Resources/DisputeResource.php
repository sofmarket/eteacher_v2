<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DisputeResource extends JsonResource
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
            'ref' => '#' . pad($this->id, 8),
            'status' => $this->status,
            'dispute_reason' => $this->dispute_reason,
            'dispute_detail' => $this->dispute_detail,
            'created_at' => $this->created_at?->format('Y-m-d'),

            // Related data
            'creatorBy' => $this->whenLoaded('creatorBy', UserResource::make($this->creatorBy)),
            'responsibleBy' => $this->whenLoaded('responsibleBy', UserResource::make($this->responsibleBy)),
            'favourTo' => $this->whenLoaded('favourTo', UserResource::make($this->favourTo)),
            'resolvedBy' => $this->whenLoaded('resolvedBy', UserResource::make($this->resolvedBy)),
            // 'disputeConversations' => $this->whenLoaded('disputeConversations', DisputeConversationResource::collection($this->disputeConversations)),
        ];

    }
}
