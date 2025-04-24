<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ChatsController extends Controller
{
    /**
     * Display a listing of the chats.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return inertia('Tutor/Chats/Index', [
            'chats' => [], // TODO: Fetch actual chats data
            'filters' => request()->all(['search', 'status']),
        ]);
    }

    /**
     * Show the chat detail view.
     *
     * @param  int  $id
     * @return \Inertia\Response
     */
    public function show($id)
    {
        // TODO: Fetch actual chat data
        return inertia('Tutor/Chats/Show', [
            'chat' => [], // TODO: Fetch chat with messages
        ]);
    }

    /**
     * Send a message in a chat.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $chatId
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendMessage(Request $request, $chatId)
    {
        $validated = $request->validate([
            'message' => ['required', 'string', 'max:1000'],
            'attachments' => ['nullable', 'array'],
            'attachments.*' => ['file', 'max:10240'], // 10MB max per file
        ]);

        // TODO: Implement message sending logic
        
        return response()->json([
            'status' => 'success',
            'message' => 'Message sent successfully'
        ]);
    }

    /**
     * Mark chat messages as read.
     *
     * @param  int  $chatId
     * @return \Illuminate\Http\JsonResponse
     */
    public function markAsRead($chatId)
    {
        // TODO: Implement mark as read logic

        return response()->json([
            'status' => 'success',
            'message' => 'Messages marked as read'
        ]);
    }

    /**
     * Get chat messages with pagination.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $chatId
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMessages(Request $request, $chatId)
    {
        $validated = $request->validate([
            'page' => ['nullable', 'integer', 'min:1'],
            'per_page' => ['nullable', 'integer', 'min:1', 'max:50'],
        ]);

        // TODO: Implement message fetching logic with pagination

        return response()->json([
            'messages' => [],
            'pagination' => [
                'current_page' => 1,
                'per_page' => 20,
                'total' => 0,
            ]
        ]);
    }
} 