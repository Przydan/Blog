<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\InquiryController as AdminInquiryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ServicesController;
use Illuminate\Support\Facades\Route;

Route::get('/health', function () {
    return 'OK';
});

Route::get('/language/{lang}', function ($lang) {
    if (in_array($lang, ['en', 'pl'])) {
        session(['locale' => $lang]);
    }

    return back();
})->name('language.switch');

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/services', [ServicesController::class, 'index'])->name('services');
Route::get('/quote/{service}', [InquiryController::class, 'create'])->name('inquiries.create');
Route::post('/inquiries', [InquiryController::class, 'store'])->name('inquiries.store')->middleware('throttle:5,1');
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
            Route::patch('posts/{post}/publish', [App\Http\Controllers\Admin\PostController::class, 'publish'])->name('posts.publish');
            Route::resource('posts', App\Http\Controllers\Admin\PostController::class);
            Route::resource('portfolio', App\Http\Controllers\Admin\PortfolioController::class);
            Route::resource('services', ServiceController::class);
            Route::resource('inquiries', AdminInquiryController::class)->only(['index', 'show']);
            Route::patch('inquiries/{inquiry}/status', [AdminInquiryController::class, 'updateStatus'])->name('inquiries.update-status');
            Route::post('inquiries/{inquiry}/comments', [AdminInquiryController::class, 'storeComment'])->name('inquiries.store-comment');
            Route::post('inquiries/{inquiry}/response', [AdminInquiryController::class, 'storeResponse'])->name('inquiries.store-response');
            Route::patch('inquiries/{inquiry}/mark-as-sent', [AdminInquiryController::class, 'markAsSent'])->name('inquiries.mark-as-sent');
        });
    });
});
