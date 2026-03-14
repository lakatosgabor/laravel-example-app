<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function admin(): Response{
        return Inertia::render('Dashboard', [
            'notifications' => $this->getNotifications(),
        ]);
    }

    public function getNotifications(): array{
        $user = auth()->user();

        if (!$user) {
            return [];
        }

        return $user->notifications()
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get()
            ->map(function ($notification) {
                return [
                    'id' => $notification->id,
                    'type' => class_basename($notification->type),
                    'data' => $notification->data,
                    'read_at' => $notification->read_at,
                    'created_at' => $notification->created_at->format('Y-m-d H:i:s'),
                ];
            })
            ->toArray();
    }

    public function markAsRead($id){
        $notification = auth()->user()
            ->notifications()
            ->findOrFail($id);

        $notification->markAsRead();

        return back();
    }

}
