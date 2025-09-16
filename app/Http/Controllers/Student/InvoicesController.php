<?php

namespace App\Http\Controllers\Student;

use App\Enums\InvoiceStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Resources\InvoiceResource;
use App\Models\Invoice;

class InvoicesController extends Controller
{
    public function index()
    {
        $invoices = Invoice::query()
            ->with('invoiceable', 'student')
            ->where('student_id', auth()->id())
            ->when(request()->has('status') && request()->status !== 'all', function ($query) {
                $query->where('status', request()->status);
            })
            ->latest()
            ->paginate($this->perPage());

        return inertia('Student/Invoices/Index', [
            'invoices' => InvoiceResource::collection($invoices),
            'statuses' => InvoiceStatusEnum::forDropdown(),
            'status' => request()->get('status', 'all'),
        ]);
    }
}
