<?php

use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', IndexController::class);

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');

    Route::prefix('posts')->name('post.')->controller(PostController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/create', 'store')->name('store');
        Route::get('/{post}', 'show')->name('show');
        Route::get('/{post}/edit', 'edit')->name('edit');
        Route::patch('/{post}', 'update')->name('update');
        Route::delete('/{post}', 'destroy')->name('delete');
        Route::patch('/posts/{id}/restore', 'restore')->name('restore');
    });

    Route::prefix('categories')->name('category.')->controller(CategoryController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/create', 'store')->name('store');
        Route::get('/{category}', 'show')->name('show');
        Route::get('/{category}/edit', 'edit')->name('edit');
        Route::patch('/{category}', 'update')->name('update');
        Route::delete('/{category}', 'destroy')->name('delete');
    });

    Route::prefix('tags')->name('tag.')->controller(TagController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/create', 'store')->name('store');
        Route::get('/{tag}', 'show')->name('show');
        Route::get('/{tag}/edit', 'edit')->name('edit');
        Route::patch('/{tag}', 'update')->name('update');
        Route::delete('/{tag}', 'destroy')->name('delete');
    });
});

Auth::routes();
