<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', IndexController::class);
Route::get('/about', AboutController::class);
Route::get('/contact', ContactController::class);

Route::get('/signup', [AuthController::class,'showSignupForm'])->name('signup');
Route::post('/signup', [AuthController::class,'signup']);

Route::get('/login', [AuthController::class,'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class,'login']);
Route::post('/logout', [AuthController::class,'logout'])->name('logout');

// Protected routes
Route::middleware(['auth'])->group(function () {
    Route::resource('blog', PostController::class);
    Route::resource('comment', CommentController::class);
    Route::resource('tag', TagController::class);
});

Route::middleware('OnlyMe')->group(function () {
    Route::get('/about', AboutController::class);
});

