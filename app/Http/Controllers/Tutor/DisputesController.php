<?php

namespace App\Http\Controllers\Tutor;

use App\Casts\DisputeStatus;
use App\Enums\DisputeStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Resources\DisputeResource;
use App\Models\Dispute;
use App\Models\SlotBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Inertia\Inertia;

class DisputesController extends Controller
{
    /**
     * Display a listing of the disputes.
     *
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        $perPage = $request->get('per_page', env('PAGINATION_LIMIT', 5));

        $query = Dispute::with([
            'disputable',
            'creatorBy.profile',
            'responsibleBy.profile',
            'favourTo.profile',
            'resolvedBy.profile',
            'disputeConversations' => function ($query) {
                $query->latest()->limit(1);
            }
        ])->where(function ($q) use ($user) {
            $q->where('creator_by', $user->id)
                ->orWhere('responsible_by', $user->id);
        });

        // Filter by status
        if ($request->has('status') && $request->status !== 'all' && array_key_exists($request->status, DisputeStatus::$statuses)) {
            $query->where('status', DisputeStatus::$statuses[$request->status]);
        }

        // Filter by type (booking disputes)
        if ($request->has('type') && $request->type === 'booking') {
            $query->where('disputable_type', SlotBooking::class);
        }

        $disputes = $query->latest()->paginate($perPage);

        if ($request->wantsJson()) {
            return DisputeResource::collection($disputes);
        }

        $statisticsQuery = Dispute::query()->where(function ($q) use ($user) {
            $q->where('creator_by', $user->id)
                ->orWhere('responsible_by', $user->id);
        });

        $statistics = [
            'total_disputes' => (clone $statisticsQuery)->count(),
            'total_disputes_closed' => (clone $statisticsQuery)->where('status', DisputeStatusEnum::CLOSED->value)->count(),
            'total_disputes_pending' => (clone $statisticsQuery)->where('status', DisputeStatusEnum::PENDING->value)->count(),
        ];

        return inertia('Tutor/Disputes/Index', [
            'statistics' => $statistics,
            'disputes' => DisputeResource::collection($disputes),
            'statuses' => DisputeStatusEnum::forDropdown(),
            'status' => request()->get('status', 'all'),
        ]);
    }

    /**
     * Show the dispute details.
     *
     * @param  Dispute  $dispute
     * @return \Inertia\Response
     */
    public function show(Dispute $dispute)
    {
        $user = Auth::user();

        // Ensure user has access to this dispute
        if ($dispute->creator_by !== $user->id && $dispute->responsible_by !== $user->id) {
            abort(403, 'Unauthorized access to dispute.');
        }

        $dispute->load([
            'disputable',
            'creatorBy.profile',
            'responsibleBy.profile',
            'favourTo.profile',
            'resolvedBy.profile',
            'disputeConversations.user.profile'
        ]);

        return inertia('Tutor/Disputes/Show', [
            'dispute' => DisputeResource::make($dispute),
        ]);
    }

    /**
     * Create a new dispute.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'disputable_type' => ['required', 'string'],
            'disputable_id' => ['required', 'integer'],
            'dispute_reason' => ['required', 'string', 'max:255'],
            'dispute_detail' => ['required', 'string', 'max:2000'],
        ]);

        $user = Auth::user();

        // Get the disputable model
        $disputable = $validated['disputable_type']::findOrFail($validated['disputable_id']);

        // Determine responsible party (opposite of creator)
        $responsibleBy = null;
        if ($disputable instanceof SlotBooking) {
            $responsibleBy = $user->id === $disputable->student_id ? $disputable->tutor_id : $disputable->student_id;
        }

        $dispute = Dispute::create([
            'uuid' => Str::uuid(),
            'disputable_type' => $validated['disputable_type'],
            'disputable_id' => $validated['disputable_id'],
            'responsible_by' => $responsibleBy,
            'creator_by' => $user->id,
            'dispute_reason' => $validated['dispute_reason'],
            'dispute_detail' => $validated['dispute_detail'],
            'status' => 'pending',
        ]);

        return redirect()->route('tutor.disputes.show', $dispute)
            ->with('success', 'Dispute created successfully.');
    }
}