<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockMovementController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::resource('categories', CategoryController::class)
    ->middleware(['auth', 'verified']);

Route::get('/products/low-stock', [ProductController::class, 'lowStock'])
    ->middleware(['auth', 'verified'])
    ->name('products.low-stock');

Route::resource('products', ProductController::class)
    ->middleware(['auth', 'verified']);    

Route::resource('stock-movements', StockMovementController::class)
    ->only(['index', 'create', 'store'])
    ->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
