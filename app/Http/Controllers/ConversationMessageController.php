<?php

namespace App\Http\Controllers;

use App\Actions\CreateConversationMessageAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\ConversationMessageRequest;
use App\Http\Resources\ConversationMessageResource;
use App\Models\Conversation;
use App\Models\ConversationMessage;
use Illuminate\Http\Request;

class ConversationMessageController extends Controller
{
    public function __construct(
        protected CreateConversationMessageAction $createConversationMessageAction
    ) {
    }

    /**
     * Store a newly created message in storage.
     */
    public function store(ConversationMessageRequest $request, Conversation $conversation)
    {
        $message = $this->createConversationMessageAction->handle($request, $conversation);
        
        return new ConversationMessageResource($message);
    }
    
    /**
     * Display the specified message.
     */
    public function show(Conversation $conversation, ConversationMessage $message)
    {
        // Verify the message belongs to the conversation
        if ($message->conversation_id !== $conversation->id) {
            return response()->json(['error' => 'Message not found in this conversation'], 404);
        }
        
        // Verify the conversation belongs to the authenticated user
        if ($conversation->sender_id !== auth()->id() && $conversation->receiver_id !== auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
        
        $message->load(['sender.profile', 'receiver.profile']);
        
        return new ConversationMessageResource($message);
    }
    
    /**
     * Update the specified message.
     */
    public function update(ConversationMessageRequest $request, Conversation $conversation, ConversationMessage $message)
    {
        
        // Verify the message belongs to the conversation
        if ($message->conversation_id !== $conversation->id) {
            return response()->json(['error' => 'Message not found in this conversation'], 404);
        }
        
        // Verify the conversation belongs to the authenticated user
        if ($conversation->sender_id !== auth()->id() && $conversation->receiver_id !== auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
        
        // Only the sender can edit their message
        if ($message->sender_id !== auth()->id()) {
            return response()->json(['error' => 'You can only edit your own messages'], 403);
        }
        
        // Update the message
        $message->update([
            'body' => $request->body
        ]);
        
        $message->load(['sender.profile', 'receiver.profile']);
        
        return new ConversationMessageResource($message);
    }
    
    /**
     * Mark message as read.
     */
    public function markAsRead(Conversation $conversation, ConversationMessage $message)
    {
        // Verify the message belongs to the conversation
        if ($message->conversation_id !== $conversation->id) {
            return response()->json(['error' => 'Message not found in this conversation'], 404);
        }
        
        // Verify the conversation belongs to the authenticated user
        if ($conversation->sender_id !== auth()->id() && $conversation->receiver_id !== auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
        
        // Only the receiver can mark messages as read
        if ($message->receiver_id !== auth()->id()) {
            return response()->json(['error' => 'You can only mark messages sent to you as read'], 403);
        }
        
        $message->update(['read' => true]);
        
        return response()->json(['success' => true, 'message' => 'Message marked as read']);
    }
    
    /**
     * Remove the specified message from storage.
     */
    public function destroy(Conversation $conversation, ConversationMessage $message)
    {
        // Verify the message belongs to the conversation
        if ($message->conversation_id !== $conversation->id) {
            return response()->json(['error' => 'Message not found in this conversation'], 404);
        }
        
        // Verify the conversation belongs to the authenticated user
        if ($conversation->sender_id !== auth()->id() && $conversation->receiver_id !== auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
        
        // Only the sender can delete their message
        if ($message->sender_id !== auth()->id()) {
            return response()->json(['error' => 'You can only delete your own messages'], 403);
        }
        
        $message->delete();
        
        return response()->json(['success' => true, 'message' => 'Message deleted successfully']);
    }
    
    /**
     * Get all messages for a conversation.
     */
    public function index(Request $request, Conversation $conversation)
    {
        // Verify the conversation belongs to the authenticated user
        if ($conversation->sender_id !== auth()->id() && $conversation->receiver_id !== auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
        
        $perPage = $request->get('per_page', 20);
        $messages = $conversation->messages()
            ->with(['sender.profile', 'receiver.profile'])
            ->orderBy('created_at', 'asc')
            ->paginate($perPage);
        
        return ConversationMessageResource::collection($messages);
    }
}
