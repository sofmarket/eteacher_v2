<?php

namespace App\Http\Controllers;

abstract class Controller
{
    protected function perPage()
    {
        return request()->get('per_page', env('PAGINATION_LIMIT', 5));
    }
}
