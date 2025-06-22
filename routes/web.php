<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SeekerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RecruiterController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\RoleSelectionController;


Route::get('/', [UserController::class, 'landing'])->name('landing');

Route::controller(SocialiteController::class)->group(function () {
    Route::get('auth/google', 'googleLogin')->name('auth.google');
    Route::get('auth/google-callback', 'googleAuthentication')->name('auth.google-callback');
});

Route::middleware('auth')->group(function () {
    Route::post('/set-role', [RoleSelectionController::class, 'store'])->name('set.role');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Recruiter Dashboard
    Route::middleware('checkRole:recruiter')->group(function () {
        Route::get('/recruiter/dashboard', [RecruiterController::class, 'index'])->name('recruiter.dashboard');

        // Project Routes
        Route::get('/recruiter/projects', [RecruiterController::class, 'projectIndex'])->name('recruiter.project');
        Route::post('/project/store', [ProjectController::class, 'storeProject'])->name('project.store');
        Route::delete('/project/delete/{id}', [ProjectController::class, 'deleteProject'])->name('project.delete');
        Route::get('/project/{job}/edit-data', [ProjectController::class, 'getEditData'])->name('project.getEditData');
        Route::put('/project/{job}', [ProjectController::class, 'update'])->name('project.update');
        Route::put('/project/{job}', [ProjectController::class, 'done'])->name('project.done');

        // Application Routes
        Route::get('/recruiter/applications', [RecruiterController::class, 'recruiterApplicationIndex'])->name('recruiter.application');
        Route::get('/application/{job}/list', [ApplicationController::class, 'index'])->name('application.list');
        Route::put('/application/{application}/approve', [ApplicationController::class, 'approve'])->name('application.approve');
        Route::put('/application/{application}/reject', [ApplicationController::class, 'reject'])->name('application.reject');

        // Review Routes
        Route::post('/reviews/{jobId}', [ReviewController::class, 'store'])->name('reviews.store');
    });

    // Seeker Dashboard
    Route::middleware('checkRole:seeker')->group(function () {
        Route::get('/seeker/dashboard', [SeekerController::class, 'index'])->name('seeker.dashboard');

        // Portfolio Routes
        Route::get('/seeker/portfolios', [SeekerController::class, 'portfoliosIndex'])->name('seeker.portfolios');
        Route::post('/portfolio/store', [PortofolioController::class, 'storePortfolio'])->name('portfolio.store');
        Route::delete('/portfolio/delete/{id}', [PortofolioController::class, 'deletePortofolio'])->name('portfolio.delete');
        Route::put('portfolio/{portfolio}', [PortofolioController::class, 'update'])->name('portfolio.update');
        Route::get('portfolio/{portfolio}/edit-data', [PortofolioController::class, 'getEditData']);

        // Application Routes
        Route::get('/seeker/applications', [SeekerController::class, 'applicationIndex'])->name('seeker.application');
        Route::post('/seeker/apply/project/{project}', [ApplicationController::class, 'apply'])->name('apply.project');

        // Review Routes
        Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    });
});

Route::get('/recruiter/seekers/{user}/profile', [SeekerController::class, 'getSeekerProfile']);
Route::get('/recruiter/seekers/{user}/email-preview', [RecruiterController::class, 'emailPreview'])->name('recruiter.seekers.emailPreview');
Route::get('/project/{job}/details', [ProjectController::class, 'getDetails']);
Route::get('/portfolio/{portfolio}/details', [PortofolioController::class, 'getDetails']);
Route::get('/categories/get', [CategoryController::class, 'getCategories']);
Route::get('/sub-categories/get', [SubCategoryController::class, 'getSubCategories']);

Route::get('/project', [UserController::class, 'viewProjectPage'])->name('project.page');
Route::get('/portofolio', [UserController::class, 'viewPortofolioPage'])->name('portofolio.page');

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
