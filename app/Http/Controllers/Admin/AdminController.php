<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class AdminController extends Controller
{
    public function admin(): Response{
        return Inertia::render('admin/Admin', [
            'currentLanguage' => auth()->user()->locale,
        ]);
    }
}
