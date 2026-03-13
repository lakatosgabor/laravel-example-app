<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;


class LanguageController extends Controller
{
    public function update(Request $request): RedirectResponse{
        
        return back();
    }
}
