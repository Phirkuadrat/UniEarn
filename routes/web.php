<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PortofolioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SeekerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RecruiterController;
use App\Http\Controllers\RoleSelectionController;
use App\Http\Controllers\SubCategoryController;

Route::get('/', [UserController::class, 'landing'])->name('landing');

Route::middleware('auth')->group(function () {
    Route::post('/set-role', [RoleSelectionController::class, 'store'])->name('set.role');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Recruiter Dashboard
    Route::middleware('checkRole:recruiter')->group(function () {
        Route::get('/recruiter/dashboard', [RecruiterController::class, 'index'])->name('recruiter.dashboard');

        // Project Routes
        Route::post('/project/store', [ProjectController::class, 'storeProject'])->name('project.store');
        Route::delete('/project/delete/{id}', [ProjectController::class, 'deleteProject'])->name('project.delete');
        Route::get('/project/{job}/edit-data', [ProjectController::class, 'getEditData'])->name('project.getEditData');
        Route::put('/project/{job}', [ProjectController::class, 'update'])->name('project.update');
    });

    // Seeker Dashboard
    Route::middleware('checkRole:seeker')->group(function () {
        Route::get('/seeker/dashboard', [SeekerController::class, 'index'])->name('seeker.dashboard');
        Route::get('/seeker/portfolios', [SeekerController::class, 'portfolios'])->name('seeker.portfolios');
        Route::get('/applications', [SeekerController::class, 'applications'])->name('seeker.applications');

        // Portfolio Routes
        Route::get('/seeker/portfolios', [SeekerController::class, 'portfoliosIndex'])->name('seeker.portfolios');
        Route::post('/portfolio/store', [PortofolioController::class, 'storePortfolio'])->name('portfolio.store');
        Route::delete('/portfolio/delete/{id}', [PortofolioController::class, 'deletePortofolio'])->name('portfolio.delete');
        Route::put('portfolio/{portfolio}', [PortofolioController::class, 'update'])->name('portfolio.update');
        Route::get('portfolio/{portfolio}/edit-data', [PortofolioController::class, 'getEditData']);
    });
});

Route::get('/project/{job}/details', [ProjectController::class, 'getDetails']);
Route::get('/portfolio/{portfolio}/details', [PortofolioController::class, 'getDetails']);
Route::get('/categories/get', [CategoryController::class, 'getCategories']);
Route::get('/sub-categories/get', [SubCategoryController::class, 'getSubCategories']);

Route::get('/project', [UserController::class, 'viewProjectPage'])->name('project.page');
Route::get('/recuiter', [RecruiterController::class, 'homePage'])->name('recruiter.page');

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
