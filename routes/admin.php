<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/login-admin', [\App\Http\Controllers\Admin\AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/login-admin', [\App\Http\Controllers\Admin\AuthController::class, 'login'])->name('admin.login.submit');

// route after login
Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');
    Route::post('/logout-admin', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('admin.logout');
});


require __DIR__ . '/auth.php';
