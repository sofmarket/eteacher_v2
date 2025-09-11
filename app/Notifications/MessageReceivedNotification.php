<?php

namespace App\Notifications;

use App\Models\ConversationMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Channels\DatabaseChannel;
use Illuminate\Notifications\Notification;


class MessageReceivedNotification extends Notification implements ShouldQueue
{
    use Queueable;
    
    public $conversationMessage;

    /**
     * Create a new notification instance.
     */
    public function __construct(ConversationMessage $conversationMessage)
    {
        $this->conversationMessage = $conversationMessage;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return [DatabaseChannel::class];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {       
        $this->conversationMessage->load('sender.profile');
        return [
            'id' => $this->conversationMessage->id,
            'type' => 'conversation.message.received',
            'title' => 'New Message Received',
            'message' => $this->conversationMessage->body,
            'conversation_id' => $this->conversationMessage->conversation_id,
            'date' => $this->conversationMessage->created_at->format('d-m-Y H:i'),
            'actor' => $this->conversationMessage->sender->name,
        ];
    }

}
