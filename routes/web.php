<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Pdf\PdfController;
use App\Http\Controllers\DashboardController;

use App\Notifications\RealTimeNotification;

Route::get('/test-notify', function () {
    auth()->user()->notify(new RealTimeNotification('Ez egy valós idejű üzenet!', 'success'));
    return 'Elküldve!';
});


Route::inertia('/', 'Welcome')->name('home');

Route::middleware(['auth', 'verified', 'web'])->group(function () {

    Route::get('requiring_overtime/overtime_panel', [AdminController::class, 'overtime'])->name('overtime.views');
    Route::get('requiring_overtime/requests', [AdminController::class, 'requests'])->name('overtime.requests');
    Route::get('requiring_overtime/handle_requests', [AdminController::class, 'handleRequests'])->name('overtime.handleRequests');

    
    Route::get('/test-pdf', [PdfController::class, 'generateTestPdf'])->name('test-pdf');
    
    Route::get('dashboard', [DashboardController::class, 'admin'])->name('dashboard');
    Route::post('/notifications/{id}/mark-as-read', [DashboardController::class, 'markAsRead'])->name('notifications.markAsRead');

    Route::get('admin/admin_panel', [AdminController::class, 'admin'])->name('admin.views');
});

require __DIR__.'/settings.php';
require __DIR__.'/admin.php';
