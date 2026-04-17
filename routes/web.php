<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\AdminController;

// Public Routes
Route::get('/', [PublicController::class, 'index']);

// Order Submission (API)
Route::post('/api/orders/submit', [AdminController::class, 'storeOrder']);

// Admin Routes
require __DIR__.'/admin.php';
