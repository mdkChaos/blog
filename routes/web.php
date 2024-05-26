<?php

use App\Http\Controllers\Main\IndexController as MainIndexController;
use App\Http\Controllers\Admin\Main\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\Category\IndexController as CategoryIndexController;
use App\Http\Controllers\Admin\Category\CreateController as CategoryCreateController;
use Illuminate\Support\Facades\Route;

Route::get('/', MainIndexController::class);

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', AdminIndexController::class);

    Route::prefix('categories')->group(function () {
        Route::get('/', CategoryIndexController::class)->name('category.index');
        Route::get('/create', CategoryCreateController::class)->name('category.create');
    });
});

Auth::routes();
