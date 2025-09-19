<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ConversationMessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                => $this->whenHas('id'),
            'body'              => $this->whenHas('body'),
            'read'              => $this->whenHas('read'),
            'sender_id'         => $this->whenHas('sender_id'),
            'receiver_id'       => $this->whenHas('receiver_id'),
            'conversation_id'   => $this->whenHas('conversation_id'),
            'created_at'        => $this->whenHas('created_at'),
            'updated_at'        => $this->whenHas('updated_at'),
            
            // Related data
            'sender'        => $this->whenLoaded('sender', function () {
                return [
                    'id'        => $this->sender->id,
                    'name'      => $this->sender->profile?->fullName ?? $this->sender->name,
                    'avatar'    => $this->sender->profile?->image ?? 'https://ui-avatars.com/api/?name=' . ($this->sender->profile?->fullName ?? $this->sender->name),
                ];
            }),
            
            'receiver'      => $this->whenLoaded('receiver', function () {
                return [
                    'id'        => $this->receiver->id,
                    'name'      => $this->receiver->profile?->fullName ?? $this->receiver->name,
                    'avatar'    => $this->receiver->profile?->image ?? 'https://ui-avatars.com/api/?name=' . ($this->receiver->profile?->fullName ?? $this->receiver->name),
                ];
            }),
            
            // Formatted time for display
            'time'          => $this->whenHas('created_at', function () {
                return $this->created_at->format('H:i');
            }),
            'date'          => $this->whenHas('created_at', function () {
                return $this->created_at->format('Y-m-d');
            }),
            'is_sent'       => $this->whenHas('sender_id', function () {
                return $this->sender_id === auth()->id();
            }),
        
        ];
    }
}
