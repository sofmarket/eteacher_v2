<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;

class InvoicesController extends Controller
{
    public function index()
    {
        return inertia('Tutor/Invoices/Index');
    }
}
