<?php

use Illuminate\Support\Facades\Route;
use Illusive\Blog\Http\Controllers\PostController;
use Illusive\Blog\Http\Controllers\TagController;

Route::group(['middleware' => config('jetstream.middleware', ['web'])], function () {
    Route::prefix('blog')->group(function () {
        Route::resource('post', PostController::class)->parameters(['post' => 'slug']);
        Route::resource('tag', TagController::class)->parameters(['tag' => 'slug']);
    });
});
