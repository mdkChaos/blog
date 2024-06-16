<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Category\CategoryController as CategoryCategoryController;
use App\Http\Controllers\Main\MainController;
use App\Http\Controllers\Personal\CommentController;
use App\Http\Controllers\Personal\HomeController as PersonalHomeController;
use App\Http\Controllers\Personal\LikedController;
use App\Http\Controllers\Post\Comment\CommentController as CommentCommentController;
use App\Http\Controllers\Post\Like\LikeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::name('main.')->controller(MainController::class)->group(function () {
    Route::get('/', 'index')->name('index');

    Route::prefix('categories')->name('category.')->controller(CategoryCategoryController::class)->group(function () {
        Route::get('/', 'index')->name('index');

        Route::prefix('{category}/posts')->name('post.')->group(function () {
            Route::get('/', 'show')->name('show');
        });
    });

    Route::prefix('posts')->name('post.')->group(function () {
        Route::get('/{post}', 'show')->name('show');

        Route::prefix('{post}/comments')->controller(CommentCommentController::class)->name('comment.')->group(function () {
            Route::post('/', 'store')->name('store');
        });

        Route::prefix('{post}/likes')->controller(LikeController::class)->name('like.')->group(function () {
            Route::post('/', 'store')->name('store');
        });
    });
});

Route::prefix('personal')->name('personal.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [PersonalHomeController::class, 'index'])->name('index');

    Route::prefix('liked')->name('liked.')->controller(LikedController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{post}', 'show')->name('show');
        Route::delete('/{post}', 'destroy')->name('delete');
    });
    Route::prefix('comment')->name('comment.')->controller(CommentController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{comment}/edit', 'edit')->name('edit');
        Route::patch('/{comment}', 'update')->name('update');
        Route::delete('/{comment}', 'destroy')->name('delete');
    });
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin', 'verified'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');

    Route::resources([
        'post' => PostController::class,
        'category' => CategoryController::class,
        'tag' => TagController::class,
        'user' => UserController::class,
    ]);

    Route::patch('post/{id}/restore', [PostController::class, 'restore'])->name('post.restore');
    Route::patch('user  /{id}/restore', [UserController::class, 'restore'])->name('user.restore');
});

Auth::routes(['verify' => true]);
