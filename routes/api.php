<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SanctumAuthController;

// Apply API middleware to all routes
Route::middleware('api')->group(function () {
    // Public auth routes
    Route::prefix('auth')->name('auth.')->group(function () {
        Route::post('/register', [SanctumAuthController::class, 'register'])->name('register');
        Route::post('/login', [SanctumAuthController::class, 'login'])->name('login');
    });

    // Protected auth routes (require authentication)
    Route::prefix('auth')->name('auth.')->middleware('auth:sanctum')->group(function () {
        Route::get('/me', [SanctumAuthController::class, 'me'])->name('me');
        Route::post('/logout', [SanctumAuthController::class, 'logout'])->name('logout');
        Route::post('/logout-all', [SanctumAuthController::class, 'logoutAll'])->name('logout-all');
    });
});
