<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\AuthController;

Route::get('/login-admin', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/login-admin', [AuthController::class, 'login'])->name('admin.login.submit');

// route after login
Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');
    Route::post('/logout-admin', [AuthController::class, 'logout'])->name('admin.logout');

    // User Management
    Route::get('/admin/user', [UserController::class, 'index'])->name('user.manage');
    Route::get('/admin/user/data', [UserController::class, 'getData'])->name('user.data');

    // Category Management
    Route::get('/admin/category', [CategoryController::class, 'index'])->name('category.manage');
    Route::get('/admin/category/data', [CategoryController::class, 'getData'])->name('category.data');
    Route::post('/admin/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::put('/admin/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/admin/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');

});


require __DIR__ . '/auth.php';
