<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class UsersController extends Controller
{
    public function users(): Response{
        return Inertia::render('admin/Users', [
            'currentLanguage' => auth()->user()->locale,
        ]);
    }
}
