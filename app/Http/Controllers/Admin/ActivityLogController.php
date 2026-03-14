<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use Inertia\Inertia;
use Inertia\Response;

class ActivityLogController extends Controller
{
    public function views(): Response{
        $activities = Activity::with(['causer', 'subject'])
                        ->orderBy('created_at', 'desc')
                        ->paginate(20);

        return Inertia::render('admin/Activities', [
            'activities' => $activities
        ]);
    }
}
