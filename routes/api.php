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


Route::group(['prefix' => 'v1'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
        Route::post('/profile', [LoginController::class, 'profile']);
    });
    //Authentication Routes
    Route::post('/register', [RegisterController::class, 'register'])->name('register');
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');
    Route::get('/dashboard', [CategoryController::class, 'dashboard'])->name('dashboard');

    // Post Categories API Routes
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/index', [CategoryController::class, 'index'])->name('categories.index')->middleware('auth:api');
        Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/store', [CategoryController::class, 'store'])->middleware('auth:api');
        Route::put('/{id}', [CategoryController::class, 'update'])->middleware('auth:api');
        Route::delete('/{id}', [CategoryController::class, 'destroy'])->middleware('auth:api');
    });

    // Post API Routes
    Route::group(['prefix' => 'posts'], function () {
        Route::get('/index', [PostController::class, 'index'])->name('post.index')->middleware('auth:api');
        Route::get('/create', [PostController::class, 'create'])->name('post.create');
        Route::post('/store', [PostController::class, 'store'])->name('post.store'); //->middleware('auth:api');
        Route::put('/{id}', [PostController::class, 'update'])->middleware('auth:api');
        Route::delete('/{id}', [PostController::class, 'destroy'])->middleware('auth:api');
    });
});
