<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\AdminController;

// Public Routes
Route::get('/', [PublicController::class, 'index']);

// Login page
Route::get('/login', function () {
    return response()->json(['error' => 'Authentication required. Use API token for access.'], 401);
})->name('login');

// Admin Login Routes (not protected - accessible to anyone)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [\App\Http\Controllers\Admin\AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [\App\Http\Controllers\Admin\AdminAuthController::class, 'login'])->name('login.submit');
});

// Order Submission (API) - Rate limited to prevent abuse
Route::post('/api/orders/submit', [AdminController::class, 'storeOrder'])->middleware('throttle:10,1');

// Admin Routes
require __DIR__.'/admin.php';
