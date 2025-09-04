<?php

namespace App\Actions;

use App\Http\Requests\ConversationMessageRequest;
use App\Models\Conversation;
use App\Models\ConversationMessage;

class CreateConversationMessageAction
{
    /**
     * Create a new conversation message.
     *
     * @param ConversationMessageRequest $request
     * @param Conversation $conversation
     * @return ConversationMessage
     */
    public function handle(ConversationMessageRequest $request, Conversation $conversation): ConversationMessage
    {
        // Create the message
        $message = ConversationMessage::create([
            'conversation_id' => $conversation->id,
            'sender_id' => auth()->id(),
            'receiver_id' => $request->receiver_id,
            'body' => $request->body,
            'read' => false
        ]);
        
        // Update conversation's last message time
        $conversation->update([
            'last_time_message' => now()
        ]);
        
        // Load relationships for the response
        $message->load(['sender.profile', 'receiver.profile']);
        
        return $message;
    }
}
