<?php

use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Personal\CommentController;
use App\Http\Controllers\Personal\HomeController as PersonalHomeController;
use App\Http\Controllers\Personal\LikedController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', IndexController::class);

Route::prefix('personal')->name('personal.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [PersonalHomeController::class, 'index'])->name('index');

    Route::prefix('liked')->name('liked.')->controller(LikedController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{post}', 'show')->name('show');
        Route::delete('/{post}', 'destroy')->name('delete');
    });
    Route::prefix('comment')->name('comment.')->controller(CommentController::class)->group(function () {
        Route::get('/', 'index')->name('index');
    });
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin', 'verified'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');

    Route::prefix('posts')->name('post.')->controller(PostController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/create', 'store')->name('store');
        Route::get('/{post}', 'show')->name('show');
        Route::get('/{post}/edit', 'edit')->name('edit');
        Route::patch('/{post}', 'update')->name('update');
        Route::delete('/{post}', 'destroy')->name('delete');
        Route::patch('/{id}/restore', 'restore')->name('restore');
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

    Route::prefix('users')->name('user.')->controller(UserController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/create', 'store')->name('store');
        Route::get('/{user}', 'show')->name('show');
        Route::get('/{user}/edit', 'edit')->name('edit');
        Route::patch('/{user}', 'update')->name('update');
        Route::delete('/{user}', 'destroy')->name('delete');
        Route::patch('/{id}/restore', 'restore')->name('restore');
    });
});

Auth::routes(['verify' => true]);
