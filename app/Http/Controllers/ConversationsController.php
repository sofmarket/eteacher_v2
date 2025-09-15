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
    public function index(Request $request)
    {

        $query = Conversation::with('sender', 'receiver')
            ->orderBy('last_time_message', 'desc')
            ->where(function ($query) {
                $query->where('sender_id', auth()->id())
                    ->orWhere('receiver_id', auth()->id());
            })
            ->when($request->has('search'), function ($query) use ($request) {
                $query->search($request->search);
            });

        $conversations = ConversationResource::collection($query->paginate(20));

        if ($request->wantsJson()) {
            return $conversations;
        }

        return inertia('Conversations/Index', [
            'conversations' => $conversations,
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

    public function markAsRead(Conversation $conversation)
    {
        $conversation->messages()
            ->where('read', false)
            ->update(['read' => true]);

        return response()->json([
            'success' => true,
            'message' => 'Conversation marked as read'
        ]);
    }

}