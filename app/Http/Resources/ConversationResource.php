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
            'id'                            => $this->id,
            'last_time_message'             => $this->last_time_message,
            'created_at'                    => $this->created_at,
            'updated_at'                    => $this->updated_at,
            
            // Related data
            'sender'                        => $this->whenLoaded('sender', function () {
                return [
                    'id'        => $this->sender->id,
                    'email'     => $this->sender->email,
                    'name'      => $this->sender->profile?->fullName,
                    'avatar'    => $this->sender->profile?->image ?? 'https://ui-avatars.com/api/?name=' . $this->sender->profile?->fullName,
                ];
            }),
            
            'receiver'                      => $this->whenLoaded('receiver', function () {
                return [
                    'id'        => $this->receiver->id,
                    'email'     => $this->receiver->email,
                    'name'      => $this->receiver->profile?->fullName,
                    'avatar'    => $this->receiver->profile?->image ?? 'https://ui-avatars.com/api/?name=' . $this->receiver->profile?->fullName,
                ];
            }),
            
            'messages'                      => $this->whenLoaded('messages', function () {
                return $this->messages->map(function ($message) {
                    return [
                        'id'            => $message->id,
                        'sender_id'     => $message->sender_id,
                        'receiver_id'   => $message->receiver_id,
                        'body'          => $message->body,
                        'read'          => $message->read,
                        'created_at'    => $message->created_at,
                    ];
                });
            }),
            
            'unread_count'                  => $this->whenLoaded('messages', function () {
                return $this->messages->where('read', false)->count();
            }),
            
            'latest_message'                => $this->whenLoaded('messages', function () {
                $latest = $this->messages->sortByDesc('created_at')->first();
                return $latest ? [
                    'body'       => $latest->body,
                    'created_at' => $latest->created_at,
                    'sender_id'  => $latest->sender_id,
                ] : null;
            }, function() {
                $latest = $this->messages()->orderBy('created_at', 'desc')->first();
                return $latest ? [
                    'body'       => $latest->body,
                    'created_at' => $latest->created_at,
                    'sender_id'  => $latest->sender_id,
                ] : null;
            }),
        ];
    }
}
