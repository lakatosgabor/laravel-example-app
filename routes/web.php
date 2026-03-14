<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Pdf\PdfController;

Route::inertia('/', 'Welcome')->name('home');

Route::middleware(['auth', 'verified', 'web'])->group(function () {
    
    Route::get('/test-pdf', [PdfController::class, 'generateTestPdf'])->name('test-pdf');
    
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
    Route::get('admin/admin_panel', [AdminController::class, 'admin'])->name('admin.views');
});

require __DIR__.'/settings.php';
require __DIR__.'/admin.php';
