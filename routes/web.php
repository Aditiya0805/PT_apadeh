<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/produk/{product}', [PublicController::class, 'show'])->name('products.show');

Route::redirect('/admin', '/admin/products')->name('admin.dashboard');

Route::prefix('admin')
    ->name('admin.')
    ->group(function (): void {
        Route::resource('products', ProductController::class)->except('show');
    });
