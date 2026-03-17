<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Mail\WelcomeUserMail;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    public function users(Request $request): Response {
        $perPage = $request->input('per_page', 25);

        $users = User::with('roles')
        ->latest()
        ->paginate($perPage)
        ->through(fn ($user) => [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'roles' => $user->getRoleNames(),
            'created_at' => $user->created_at->format('Y-m-d'),
        ]);

        return Inertia::render('admin/Users', [
            'users' => $users,
            'filters' => $request->only(['per_page']),
            'successUpdate' => session('successUpdate'),
        ]);
    }

    public function store(Request $request): RedirectResponse {
        $validated = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        $plainPassword = Str::random(8);

        $user = User::create([
            'name' => $validated['firstName'] . ' ' . $validated['lastName'],
            'email' => $validated['email'],
            'password' => Hash::make($plainPassword),
        ]);

        $user->assignRole('super-admin');

        Mail::to($user->email)->send(new WelcomeUserMail($user, $plainPassword));

        return back()->with('successUpdate', __('messages.user_has_been_created'));
    }
}
