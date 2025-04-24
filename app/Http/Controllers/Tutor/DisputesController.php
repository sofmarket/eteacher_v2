<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DisputesController extends Controller
{
    /**
     * Display a listing of the disputes.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return inertia('Tutor/Disputes/Index', [
            'disputes' => [],
        ]);
    }

    /**
     * Show the dispute details.
     *
     * @param  int  $id
     * @return \Inertia\Response
     */
    public function show($id)
    {
        return inertia('Tutor/Disputes/Show', [
            'dispute' => [], // TODO: Fetch dispute with messages/details
        ]);
    }

    /**
     * Add a message to a dispute.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $disputeId
     * @return \Illuminate\Http\JsonResponse
     */
    public function addMessage(Request $request, $disputeId)
    {
        $validated = $request->validate([
            'message' => ['required', 'string', 'max:2000'],
            'attachments' => ['nullable', 'array'],
            'attachments.*' => ['file', 'max:10240'], // 10MB max per file
        ]);

        // TODO: Add message to dispute logic

        return response()->json([
            'status' => 'success',
            'message' => 'Message added to dispute successfully'
        ]);
    }

    /**
     * Resolve a dispute.
     *
     * @param  int  $disputeId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function resolve($disputeId)
    {
        // TODO: Implement dispute resolution logic

        return redirect()->route('tutor.disputes.show', $disputeId)
            ->with('success', 'Dispute resolved successfully.');
    }

    /**
     * Escalate a dispute to support.
     *
     * @param  int  $disputeId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function escalate($disputeId)
    {
        // TODO: Implement dispute escalation logic

        return redirect()->route('tutor.disputes.show', $disputeId)
            ->with('success', 'Dispute escalated to support.');
    }
} 