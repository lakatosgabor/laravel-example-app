<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;


class LanguageController extends Controller
{
    public function edit(): Response{
        return Inertia::render('settings/Language', [
            'currentLanguage' => auth()->user()->locale,
            'successUpdate' => session('successUpdate'),
        ]);
    }

    public function update(Request $request): RedirectResponse{
        $request->validate([
            'language' => 'required|string|in:en,hu',
        ]);
        
        $request->user()->update([
            'locale' => $request->language,
        ]);

        return back()->with('successUpdate', __('messages.Language updated'));
    }
}
