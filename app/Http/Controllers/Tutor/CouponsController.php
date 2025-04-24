<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CouponsController extends Controller
{
    /**
     * Display a listing of coupons.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return inertia('Tutor/Coupons/Index', [
            'coupons' => [],
        ]);
    }

    /**
     * Show the form for creating a new coupon.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return inertia('Tutor/Coupons/Create', [
            'subjects' => [],
        ]);
    }

    /**
     * Store a newly created coupon.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => ['required', 'string', 'max:20', 'unique:coupons,code'],
            'type' => ['required', 'string', 'in:percentage,fixed'],
            'value' => ['required', 'numeric', 'min:0'],
            'max_uses' => ['nullable', 'integer', 'min:1'],
            'starts_at' => ['required', 'date'],
            'expires_at' => ['required', 'date', 'after:starts_at'],
            'description' => ['nullable', 'string', 'max:255'],
            'subjects' => ['nullable', 'array'],
            'subjects.*' => ['exists:subjects,id'],
            'minimum_amount' => ['nullable', 'numeric', 'min:0'],
            'maximum_discount' => ['nullable', 'numeric', 'min:0'],
        ]);

        // TODO: Create coupon logic

        return redirect()->route('tutor.coupons.index')
            ->with('success', 'Coupon created successfully.');
    }

    /**
     * Show the coupon details.
     *
     * @param  int  $id
     * @return \Inertia\Response
     */
    public function show($id)
    {
        return inertia('Tutor/Coupons/Show', [
            'coupon' => [],
        ]);
    }

    /**
     * Show the form for editing a coupon.
     *
     * @param  int  $id
     * @return \Inertia\Response
     */
    public function edit($id)
    {
        return inertia('Tutor/Coupons/Edit', [
            'coupon' => [],
            'subjects' => [],
        ]);
    }

    /**
     * Update the specified coupon.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'code' => ['required', 'string', 'max:20', 'unique:coupons,code,'.$id],
            'type' => ['required', 'string', 'in:percentage,fixed'],
            'value' => ['required', 'numeric', 'min:0'],
            'max_uses' => ['nullable', 'integer', 'min:1'],
            'starts_at' => ['required', 'date'],
            'expires_at' => ['required', 'date', 'after:starts_at'],
            'description' => ['nullable', 'string', 'max:255'],
            'subjects' => ['nullable', 'array'],
            'subjects.*' => ['exists:subjects,id'],
            'minimum_amount' => ['nullable', 'numeric', 'min:0'],
            'maximum_discount' => ['nullable', 'numeric', 'min:0'],
            'is_active' => ['required', 'boolean'],
        ]);

        // TODO: Update coupon logic

        return redirect()->route('tutor.coupons.index')
            ->with('success', 'Coupon updated successfully.');
    }

    /**
     * Toggle the coupon's active status.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function toggleStatus($id)
    {
        // TODO: Toggle coupon status logic

        return response()->json([
            'status' => 'success',
            'message' => 'Coupon status updated successfully'
        ]);
    }

    /**
     * Remove the specified coupon.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // TODO: Delete coupon logic

        return redirect()->route('tutor.coupons.index')
            ->with('success', 'Coupon deleted successfully.');
    }

    /**
     * Validate a coupon code.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function validate(Request $request)
    {
        $validated = $request->validate([
            'code' => ['required', 'string', 'exists:coupons,code'],
            'amount' => ['required', 'numeric', 'min:0'],
            'subject_id' => ['required', 'exists:subjects,id'],
        ]);

        // TODO: Implement coupon validation logic

        return response()->json([
            'status' => 'success',
            'valid' => true,
            'discount' => [
                'type' => 'percentage',
                'value' => 0,
                'amount' => 0,
            ],
        ]);
    }
} 