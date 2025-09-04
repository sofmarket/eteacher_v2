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
            'id'            => $this->id,
            'body'          => $this->body,
            'read'          => $this->read,
            'sender_id'     => $this->sender_id,
            'receiver_id'   => $this->receiver_id,
            'conversation_id' => $this->conversation_id,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
            
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
            'time'          => $this->created_at->format('H:i'),
            'date'          => $this->created_at->format('Y-m-d'),
            'is_sent'       => $this->sender_id === auth()->id(),
        ];
    }
}
