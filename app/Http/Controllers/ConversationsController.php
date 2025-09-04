<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\ConversationResource;
use App\Http\Resources\ConversationMessageResource;
use App\Models\Conversation;
use App\Models\ConversationMessage;
use Illuminate\Http\Request;

class ConversationsController extends Controller
{
    public function index()
    {
        $conversations = Conversation::with('sender', 'receiver')
        ->orderBy('last_time_message', 'desc')
        ->get();
        return inertia('Conversations/Index', [
            'conversations' => ConversationResource::collection($conversations),
        ]);
    }

    public function show(Conversation $conversation)
    {
        $conversation->load('messages');
        return inertia('Conversations/Show', [
            'conversation' => new ConversationResource($conversation),
        ]);
    }

    public function destroy(Conversation $conversation)
    {
        $conversation->delete();
        return redirect()->route('conversations.index')->with('success', 'Conversation deleted successfully.');
    }
    
}