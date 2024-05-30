<?php

use App\Http\Controllers\Main\IndexController as MainIndexController;
use App\Http\Controllers\Admin\Main\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\Category\IndexController as CategoryIndexController;
use App\Http\Controllers\Admin\Category\CreateController as CategoryCreateController;
use App\Http\Controllers\Admin\Category\StoreController as CategoryStoreController;
use App\Http\Controllers\Admin\Category\ShowController as CategoryShowController;
use App\Http\Controllers\Admin\Category\EditController as CategoryEditController;
use App\Http\Controllers\Admin\Category\UpdateController as CategoryUpdateController;
use App\Http\Controllers\Admin\Category\DeleteController as CategoryDeleteController;
use Illuminate\Support\Facades\Route;

Route::get('/', MainIndexController::class);

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', AdminIndexController::class);

    Route::prefix('categories')->name('category.')->group(function () {
        Route::get('/', CategoryIndexController::class)->name('index');
        Route::get('/create', CategoryCreateController::class)->name('create');
        Route::post('/create', CategoryStoreController::class)->name('store');
        Route::get('/{category}', CategoryShowController::class)->name('show');
        Route::get('/{category}/edit', CategoryEditController::class)->name('edit');
        Route::patch('/{category}', CategoryUpdateController::class)->name('update');
        Route::delete('/{category}', CategoryDeleteController::class)->name('delete');
    });
});

Auth::routes();
