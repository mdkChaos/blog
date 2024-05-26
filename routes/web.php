<?php

use App\Http\Controllers\Main\IndexController;
use Illuminate\Support\Facades\Route;

Route::group([], function () {
    Route::get('/', IndexController::class);
});

Auth::routes();