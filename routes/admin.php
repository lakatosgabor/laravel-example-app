<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\UsersController;


Route::middleware(['auth', 'web'])->group(function () {
    Route::get('admin/permissions', [PermissionsController::class, 'permissions'])->name('permissions.views');
    Route::get('admin/users', [UsersController::class, 'users'])->name('users.views');
    Route::post('admin/users', [UsersController::class, 'store'])->name('users.store');});