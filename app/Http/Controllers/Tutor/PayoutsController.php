<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PayoutsController extends Controller
{
    /**
     * Display a listing of the payouts.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return inertia('Tutor/Payouts/Index', [
            'payouts' => [],
            'payout_methods' => [], // TODO: Fetch configured payout methods
        ]);
    }

    /**
     * Show the payout details.
     *
     * @param  int  $id
     * @return \Inertia\Response
     */
    public function show($id)
    {
        return inertia('Tutor/Payouts/Show', [
            'payout' => [], // TODO: Fetch payout details
        ]);
    }

    /**
     * Initiate a payout request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function requestPayout(Request $request)
    {
        $validated = $request->validate([
            'amount' => ['required', 'numeric', 'min:1'], // Example: Minimum payout amount
            'payout_method_id' => ['required', 'exists:payout_methods,id'], // Assuming a payout_methods table
        ]);

        // TODO: Check available balance
        // TODO: Create payout record and initiate process

        return redirect()->route('tutor.payouts.index')
            ->with('success', 'Payout requested successfully.');
    }

    /**
     * Cancel a pending payout request.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cancelPayout($id)
    {
        // TODO: Check if payout is cancellable (status is pending)
        // TODO: Cancel the payout request

        return redirect()->route('tutor.payouts.index')
            ->with('success', 'Payout request cancelled.');
    }

    /**
     * Setup or update payout method (e.g., Stripe Connect onboarding).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response | \Illuminate\Http\RedirectResponse
     */
    public function setupPayoutMethod(Request $request)
    {
        // TODO: Handle payout method setup (e.g., redirect to Stripe, save details)

        return redirect()->route('tutor.payouts.index')
            ->with('success', 'Payout method updated successfully.');
    }

    /**
     * Get the tutor's configured payout methods.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPayoutMethods()
    {
        // TODO: Fetch payout methods for the authenticated tutor
        $methods = [];

        return response()->json($methods);
    }
} 