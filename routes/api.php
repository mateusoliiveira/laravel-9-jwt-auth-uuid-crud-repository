<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;

Route::prefix('v1')->group(function () {

    //register
    Route::controller(UserController::class)
        ->group(function () {
            Route::post('register', 'store');
    });
    //login
    Route::controller(AuthController::class)
        ->group(function () {
            Route::post('login', 'login');
    });

    //authed
    Route::controller(AuthController::class)
        ->prefix('users')
        ->middleware('auth:api')     
        ->group(function () {
            Route::get('', 'me');
            Route::post('logout', 'logout');
            Route::post('refresh', 'refresh');

            Route::controller(UserController::class)
            ->group(function () {
                Route::get('data', 'index');
        });
    });
    Route::controller(CategoryController::class)
        ->prefix('categories')
        ->group(function () {
            Route::get('', 'index');
            Route::get('{id}', 'show');

            Route::post('', 'store');
            Route::delete('{id}', 'destroy');
    });
    Route::controller(ProductController::class)
        ->prefix('products')
        ->group(function () {
            Route::get('', 'index');
            Route::get('{id}', 'show');
            
            Route::post('', 'store');
            Route::delete('{id}', 'destroy');
    });
    Route::controller(ReviewController::class)
    ->prefix('reviews')
    ->group(function () {
        Route::get('{id}', 'show');
        Route::post('', 'store');
});
});

