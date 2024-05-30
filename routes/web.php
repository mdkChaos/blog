<?php

use App\Http\Controllers\Main\IndexController as MainIndexController;
use App\Http\Controllers\Admin\Main\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\Category\IndexController as CategoryIndexController;
use App\Http\Controllers\Admin\Category\CreateController as CategoryCreateController;
use App\Http\Controllers\Admin\Category\StoreController as CategoryStoreController;
use App\Http\Controllers\Admin\Category\ShowController as CategoryShowController;
use Illuminate\Support\Facades\Route;

Route::get('/', MainIndexController::class);

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', AdminIndexController::class);

    Route::prefix('categories')->name('category.')->group(function () {
        Route::get('/', CategoryIndexController::class)->name('index');
        Route::get('/create', CategoryCreateController::class)->name('create');
        Route::post('/create', CategoryStoreController::class)->name('store');
        Route::get('/{category}', CategoryShowController::class)->name('show');
    });
});

Auth::routes();
