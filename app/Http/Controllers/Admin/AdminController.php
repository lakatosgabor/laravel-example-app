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

    public function overtime(): Response{
        return Inertia::render('requiring_overtime/Overtime', [
            'currentLanguage' => auth()->user()->locale,
        ]);
    }

    public function requests(): Response{
        return Inertia::render('requiring_overtime/Requests', [
            'currentLanguage' => auth()->user()->locale,
        ]);
    }

    public function handleRequests(): Response{
        return Inertia::render('requiring_overtime/HandleRequests', [
            'currentLanguage' => auth()->user()->locale,
        ]);
    }

}
