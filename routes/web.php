<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ServicesController;
use Illuminate\Support\Facades\Route;

Route::get('/health', function () {
    return 'OK';
});

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/services', [ServicesController::class, 'index'])->name('services');
Route::get('/posts/{slug}', [PostController::class, 'show'])->name('posts.show');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
    Route::get('/register', [RegisterController::class, 'show'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

    Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
        Route::middleware('role:administrator')->group(function () {
            Route::resource('users', UserController::class);
        });

        Route::middleware('role:administrator,author')->group(function () {
            Route::resource('categories', CategoryController::class);
            Route::resource('tags', TagController::class);
            Route::resource('posts', App\Http\Controllers\Admin\PostController::class);
            Route::resource('portfolio', \App\Http\Controllers\Admin\PortfolioController::class);
            Route::resource('services', \App\Http\Controllers\Admin\ServiceController::class);
        });
    });
});

// Include blog routes
require __DIR__.'/blog/web.php';
