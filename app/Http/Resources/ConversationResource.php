<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ConversationResource extends JsonResource
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
            'last_time_message'             => $this->whenHas('last_time_message'),
            'created_at'                    => $this->whenHas('created_at'),
            'updated_at'                    => $this->whenHas('updated_at'),
            
            // Related data
            'sender'                        => $this->whenLoaded('sender', UserResource::make($this->sender)),
            'receiver'                      => $this->whenLoaded('receiver', UserResource::make($this->receiver)),
            'messages'                      => $this->whenLoaded('messages', ConversationMessageResource::collection($this->messages)),
            
            'unread_count'                  => $this->whenLoaded('messages', function () {
                return $this->messages->where('receiver_id', auth()->id())->where('read', false)->count();
            }, function() {
                return $this->messages()->where('receiver_id', auth()->id())->where('read', false)->count();
            }),
            
            'latest_message'                => $this->whenLoaded('messages', function () {
                return $this->getLatestMessage(
                    $this->messages->where('receiver_id', auth()->id())->sortByDesc('created_at')->first()
                );
            }, function() {
                return $this->getLatestMessage(
                    $this->messages()->where('receiver_id', auth()->id())->orderBy('created_at', 'desc')->first()
                );
            }),

        ];
    }

    private function getLatestMessage($latestMessage)
    {
        return $latestMessage ? [
            'body'       => $latestMessage->body,
            'created_at' => $latestMessage->created_at,
            'sender_id'  => $latestMessage->sender_id,
        ] : [
            'body'       => 'no messages yet',
            'created_at' => now(),
            'sender_id'  => null,
        ];
    }
}
