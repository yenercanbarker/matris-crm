<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Site\LanguageController;
use App\Http\Controllers\Site\PageController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\SetLocaleMiddleware;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => [SetLocaleMiddleware::class], 'as' => 'pages.'], function () {
    Route::get('/', [PageController::class, 'index'])->name('home');
});

Route::post('/change-language', [LanguageController::class, 'change'])->name('change-language');

Route::middleware(['auth', SetLocaleMiddleware::class])->group(function () {
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
            Route::get('/', [ProfileController::class, 'edit'])->name('edit');
            Route::patch('/', [ProfileController::class, 'update'])->name('update');
            Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
        });
    });

    Route::group(['prefix' => 'admin', 'middleware' => [AdminMiddleware::class]], function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin');
    });
});

require __DIR__.'/auth.php';
