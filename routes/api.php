<?php

use App\Http\Controllers\api\v1\PostApiController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('post', PostApiController::class);
});
