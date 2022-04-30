<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\v1\Post\PostController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\v1\Category\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//Authentication Routes
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);


Route::group(['prefix' => 'v1'], function() {
    Route::group(['middleware' => 'api'], function() {
        Route::post('/logout', [LogoutController::class, 'logout']);
        Route::post('/profile', [LoginController::class, 'profile']);
    });
    
    // Post Categories API Routes
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/index', [CategoryController::class, 'index'])->middleware('api');
        Route::post('/create', [CategoryController::class, 'store'])->middleware('auth:api');
        Route::put('/{id}', [CategoryController::class, 'update'])->middleware('auth:api');
        Route::delete('/{id}', [CategoryController::class, 'destroy'])->middleware('auth:api');
    });

    // Post API Routes
    Route::group(['prefix' => 'posts'], function () {
        Route::get('/index', [PostController::class, 'index'])->middleware('auth:api');
        Route::post('/create', [PostController::class, 'store'])->middleware('auth:api');
        Route::put('/{id}', [PostController::class, 'update'])->middleware('auth:api');
        Route::delete('/{id}', [PostController::class, 'destroy'])->middleware('auth:api');
    });
});
