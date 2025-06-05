<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class,'index']);
Route::get('/about', [IndexController::class,'about']);
Route::get('/contact', [IndexController::class,'contact']);

Route::get('/blog', [PostController::class,'index']);
Route::post('/blog/create', [PostController::class,'create']);
Route::post('/blog/delete/{id}', [PostController::class,'delete']);
Route::get('/blog/{id}', [PostController::class,'show']);

Route::post('/comment/create/{id}', [CommentController::class,'create']);
Route::get('/comment/factory-create', [CommentController::class,'factoryCreate']);

Route::get('/tag', [TagController::class,'index']);
Route::get('/tag/create', [TagController::class,'create']);
Route::post('/tag/delete/{id}', [TagController::class,'delete']);
Route::get('/tag/test-many-to-many', [TagController::class,'testManyToMany']);
Route::get('/tag/factory', [TagController::class,'factoryCreate']);

