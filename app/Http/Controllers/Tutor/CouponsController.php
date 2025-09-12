<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Http\Resources\CouponResource;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class CouponsController extends Controller
{
    /**
     * Display a listing of the tutor's coupons.
     */
    public function index(Request $request): Response
    {
        $userId = auth()->id();
        
        $query = Coupon::query()
            ->where('tutor_id', $userId)
            ->when($request->has('search'), function ($query) use ($request) {
                $query->search($request->search);
            })
            ->when($request->has('status'), function ($query) use ($request) {
                $query->where('status', $request->status);
            })
            ->orderBy('created_at', 'desc');

        $coupons = $query->paginate(15);

        return Inertia::render('Tutor/Coupons/Index', [
            'coupons' => CouponResource::collection($coupons),
            'filters' => $request->only(['search', 'status']),
        ]);
    }

    /**
     * Show the form for creating a new coupon.
     */
    public function create(): Response
    {
        return Inertia::render('Tutor/Coupons/Create');
    }

    /**
     * Store a newly created coupon.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'code' => ['required', 'string', 'max:20', 'unique:coupons,code'],
            'name' => ['required', 'string', 'max:255'],
            'discount' => ['required', 'numeric', 'min:0'],
            'is_fixed' => ['required', 'boolean'],
            'max_uses' => ['nullable', 'integer', 'min:1'],
            'budget' => ['nullable', 'numeric', 'min:0'],
            'start_at' => ['required', 'date'],
            'expire_at' => ['nullable', 'date', 'after:start_at'],
        ]);

        // Validate percentage discount
        if (!$validated['is_fixed'] && $validated['discount'] > 100) {
            return back()->withErrors(['discount' => 'Percentage discount cannot exceed 100%.']);
        }

        $coupon = Coupon::create([
            ...$validated,
            'tutor_id' => auth()->id(),
        ]);

        return redirect()->route('tutor.coupons.index')
            ->with('success', 'Coupon created successfully.');
    }

    /**
     * Display the specified coupon.
     */
    public function show(Coupon $coupon): Response
    {
        $this->authorize('view', $coupon);

        return Inertia::render('Tutor/Coupons/Show', [
            'coupon' => new CouponResource($coupon->load('tutor')),
        ]);
    }

    /**
     * Show the form for editing the specified coupon.
     */
    public function edit(Coupon $coupon): Response
    {
        $this->authorize('update', $coupon);

        return Inertia::render('Tutor/Coupons/Edit', [
            'coupon' => new CouponResource($coupon),
        ]);
    }

    /**
     * Update the specified coupon.
     */
    public function update(Request $request, Coupon $coupon): RedirectResponse
    {
        $this->authorize('update', $coupon);

        $validated = $request->validate([
            'code' => ['required', 'string', 'max:20', 'unique:coupons,code,' . $coupon->id],
            'name' => ['required', 'string', 'max:255'],
            'discount' => ['required', 'numeric', 'min:0'],
            'is_fixed' => ['required', 'boolean'],
            'max_uses' => ['nullable', 'integer', 'min:1'],
            'budget' => ['nullable', 'numeric', 'min:0'],
            'start_at' => ['required', 'date'],
            'expire_at' => ['nullable', 'date', 'after:start_at'],
        ]);

        // Validate percentage discount
        if (!$validated['is_fixed'] && $validated['discount'] > 100) {
            return back()->withErrors(['discount' => 'Percentage discount cannot exceed 100%.']);
        }

        $coupon->update($validated);

        return redirect()->route('tutor.coupons.index')
            ->with('success', 'Coupon updated successfully.');
    }

    /**
     * Remove the specified coupon.
     */
    public function destroy(Coupon $coupon): RedirectResponse
    {
        $this->authorize('delete', $coupon);

        $coupon->delete();

        return redirect()->route('tutor.coupons.index')
            ->with('success', 'Coupon deleted successfully.');
    }

    /**
     * Validate a coupon code for a specific amount.
     */
    public function validate(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'code' => ['required', 'string'],
            'amount' => ['required', 'numeric', 'min:0'],
        ]);

        $coupon = Coupon::byCode($validated['code'])->first();

        if (!$coupon) {
            return response()->json([
                'valid' => false,
                'message' => 'Invalid coupon code.',
            ], 404);
        }

        $isValid = $coupon->isValid($validated['amount']);

        if (!$isValid) {
            $message = 'Coupon is not valid.';
            
            if ($coupon->isExpired()) {
                $message = 'Coupon has expired.';
            } elseif ($coupon->isOverMaxUses()) {
                $message = 'Coupon has reached maximum usage limit.';
            } elseif ($coupon->isOverBudget()) {
                $message = 'Coupon budget has been exceeded.';
            } elseif (!$coupon->isValidAmount($validated['amount'])) {
                $message = 'Coupon is not valid for this amount.';
            }

            return response()->json([
                'valid' => false,
                'message' => $message,
            ], 400);
        }

        $discountAmount = $coupon->discount($validated['amount']);

        return response()->json([
            'valid' => true,
            'coupon' => new CouponResource($coupon),
            'discount' => [
                'type' => $coupon->is_fixed ? 'fixed' : 'percentage',
                'value' => $coupon->discount,
                'amount' => $discountAmount,
                'final_amount' => $validated['amount'] - $discountAmount,
            ],
        ]);
    }

    /**
     * Get coupon statistics for the tutor.
     */
    public function stats(): JsonResponse
    {
        $userId = auth()->id();
        
        $stats = [
            'total_coupons' => Coupon::where('tutor_id', $userId)->count(),
            'active_coupons' => Coupon::where('tutor_id', $userId)->valid()->count(),
            'expired_coupons' => Coupon::where('tutor_id', $userId)
                ->where('expire_at', '<', now())
                ->count(),
            'total_uses' => Coupon::where('tutor_id', $userId)->sum('uses'),
            'total_budget_used' => Coupon::where('tutor_id', $userId)
                ->whereNotNull('budget')
                ->get()
                ->sum(function ($coupon) {
                    return $coupon->budget - max(0, $coupon->budget);
                }),
        ];

        return response()->json($stats);
    }

    /**
     * Duplicate an existing coupon.
     */
    public function duplicate(Coupon $coupon): RedirectResponse
    {
        $this->authorize('view', $coupon);

        $newCoupon = $coupon->replicate([
            'code',
            'uses',
            'created_at',
            'updated_at',
        ]);

        $newCoupon->code = $coupon->code . '_copy_' . time();
        $newCoupon->name = $coupon->name . ' (Copy)';
        $newCoupon->uses = 0;
        $newCoupon->save();

        return redirect()->route('tutor.coupons.index')
            ->with('success', 'Coupon duplicated successfully.');
    }
} 