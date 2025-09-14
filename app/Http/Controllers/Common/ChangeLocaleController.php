<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ChangeLocaleController extends Controller
{
    public function __invoke(Request $request)
    {

        // Validate the locale input to ensure it’s 'ar' or 'en'
        $request->validate([
            'locale' => 'required|in:ar,en,fr'
        ]);

        // Set the locale in session
        session(['locale' => $request->input('locale')]);

        // Redirect back with Inertia to maintain the SPA experience
        return back();
    
    }

}