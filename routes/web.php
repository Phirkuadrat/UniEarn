<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SeekerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecruiterController;
use App\Http\Controllers\RoleSelectionController;

Route::get('/', [UserController::class, 'landing'])->name('landing');

Route::middleware('auth')->group(function () {
    Route::post('/set-role', [RoleSelectionController::class, 'store'])->name('set.role');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Recruiter Dashboard
    Route::middleware('checkRole:recruiter')->group(function () {
        Route::get('/recruiter/dashboard', [RecruiterController::class, 'index'])->name('recruiter.dashboard');
    });

    // Seeker Dashboard
    Route::middleware('checkRole:seeker')->group(function () {
        Route::get('/seeker/dashboard', [SeekerController::class, 'index'])->name('seeker.dashboard');
        Route::get('/portfolios', [SeekerController::class, 'portfolios'])->name('seeker.portfolios');
        Route::get('/applications', [SeekerController::class, 'applications'])->name('seeker.applications');
    });
});

Route::get('/seeker', [SeekerController::class, 'homePage'])->name('seeker.page');
Route::get('/recuiter', [RecruiterController::class, 'homePage'])->name('recruiter.page');

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
