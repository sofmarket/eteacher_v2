<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Http\Resources\InvoiceResource;
use App\Models\Invoice;

class InvoicesController extends Controller
{
    public function index()
    {


        $perPage = request()->per_page ?? 5;
        $invoices = Invoice::query()
            ->with('invoiceable', 'student')
            ->where('tutor_id', auth()->id())
            ->latest()
            ->paginate($perPage);

        return inertia('Tutor/Invoices/Index', [
            'invoices' => InvoiceResource::collection($invoices),
            'per_page' => $perPage,
        ]);
    }
}
