<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

// Admin Panel Routes
Route::prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    // Hero Section
    Route::get('/hero/edit', [AdminController::class, 'editHero'])->name('hero.edit');
    Route::put('/hero/update', [AdminController::class, 'updateHero'])->name('hero.update');

    // Product Details
    Route::get('/product/edit', [AdminController::class, 'editProduct'])->name('product.edit');
    Route::put('/product/update', [AdminController::class, 'updateProduct'])->name('product.update');

    // Material Options
    Route::get('/material', [AdminController::class, 'indexMaterial'])->name('material.index');
    Route::get('/material/create', [AdminController::class, 'createMaterial'])->name('material.create');
    Route::post('/material/store', [AdminController::class, 'storeMaterial'])->name('material.store');
    Route::get('/material/{id}/edit', [AdminController::class, 'editMaterial'])->name('material.edit');
    Route::put('/material/{id}/update', [AdminController::class, 'updateMaterial'])->name('material.update');
    Route::delete('/material/{id}/delete', [AdminController::class, 'deleteMaterial'])->name('material.delete');

    // Size Options
    Route::get('/size', [AdminController::class, 'indexSize'])->name('size.index');
    Route::get('/size/create', [AdminController::class, 'createSize'])->name('size.create');
    Route::post('/size/store', [AdminController::class, 'storeSize'])->name('size.store');
    Route::get('/size/{id}/edit', [AdminController::class, 'editSize'])->name('size.edit');
    Route::put('/size/{id}/update', [AdminController::class, 'updateSize'])->name('size.update');
    Route::delete('/size/{id}/delete', [AdminController::class, 'deleteSize'])->name('size.delete');

    // Contact Information
    Route::get('/contact/edit', [AdminController::class, 'editContact'])->name('contact.edit');
    Route::put('/contact/update', [AdminController::class, 'updateContact'])->name('contact.update');

    // Carousel
    Route::get('/carousel', [AdminController::class, 'indexCarousel'])->name('carousel.index');
    Route::get('/carousel/create', [AdminController::class, 'createCarousel'])->name('carousel.create');
    Route::post('/carousel/store', [AdminController::class, 'storeCarousel'])->name('carousel.store');
    Route::get('/carousel/{id}/edit', [AdminController::class, 'editCarousel'])->name('carousel.edit');
    Route::put('/carousel/{id}/update', [AdminController::class, 'updateCarousel'])->name('carousel.update');
    Route::delete('/carousel/{id}/delete', [AdminController::class, 'deleteCarousel'])->name('carousel.delete');

    // Orders
    Route::get('/orders/{status?}', [AdminController::class, 'indexOrders'])->name('orders.index');
    Route::get('/orders/{id}/show', [AdminController::class, 'showOrder'])->name('orders.show');
    Route::put('/orders/{id}/status', [AdminController::class, 'updateOrderStatus'])->name('orders.status');
    Route::delete('/orders/{id}/delete', [AdminController::class, 'deleteOrder'])->name('orders.delete');
});
