<?php

namespace App\Http\Controllers\Tutor;

use App\Enums\InvoiceStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Resources\InvoiceResource;
use App\Models\Invoice;

class InvoicesController extends Controller
{
    public function index()
    {
        $perPage = request()->get('per_page', env('PAGINATION_LIMIT', 5));
        $invoices = Invoice::query()
            ->with('invoiceable', 'student')
            ->where('tutor_id', auth()->id())
            ->when(request()->has('status') && request()->status !== 'all', function ($query) {
                $query->where('status', request()->status);
            })
            ->latest()
            ->paginate($perPage);

        return inertia('Tutor/Invoices/Index', [
            'invoices' => InvoiceResource::collection($invoices),
            'statuses' => InvoiceStatusEnum::forDropdown(),
            'status' => request()->get('status', 'all'),
        ]);
    }
}
