<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ApplicationController;
use App\Models\Application;

Route::get('/login-admin', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/login-admin', [AuthController::class, 'login'])->name('admin.login.submit');

// route after login
Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
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

    // SubCategory Management
    Route::get('/admin/subcategory', [SubCategoryController::class, 'index'])->name('subcategory.manage');
    Route::get('/admin/subcategory/data', [SubCategoryController::class, 'getData'])->name('subcategory.data');
    Route::post('/admin/subcategory/store', [SubCategoryController::class, 'store'])->name('subcategory.store');
    Route::put('/admin/subcategory/update/{id}', [SubCategoryController::class, 'update'])->name('subcategory.update');
    Route::delete('/admin/subcategory/delete/{id}', [SubCategoryController::class, 'destroy'])->name('subcategory.delete');

    // Portofolio Management
    Route::get('/admin/portofolio', [PortofolioController::class, 'index'])->name('portofolio.manage');
    Route::get('/admin/portofolio/data', [PortofolioController::class, 'getData'])->name('portofolio.data');
    Route::delete('/admin/portfolio/delete/{id}', [PortofolioController::class, 'deletePortofolioAdmin'])->name('portfolio.delete.admin');

    // Project Management
    Route::get('/admin/project', [ProjectController::class, 'index'])->name('project.manage');
    Route::get('/admin/project/data', [ProjectController::class, 'getData'])->name('projects.data');
    Route::delete('/project/delete/{id}', [ProjectController::class, 'deleteProjectAdmin'])->name('project.delete');

    // Application Management
    Route::get('/admin/application', [ApplicationController::class, 'applicationIndex'])->name('application.manage');
    Route::get('/admin/application/data', [ApplicationController::class, 'getData'])->name('application.data');
});


require __DIR__ . '/auth.php';
