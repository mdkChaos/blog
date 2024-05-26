<?php

use App\Http\Controllers\Main\IndexController as MainIndexController;
use App\Http\Controllers\Admin\Main\IndexController as AdminIndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', MainIndexController::class);

Route::prefix('admin')->group(function () {
    Route::get('/', AdminIndexController::class);
});

Auth::routes();