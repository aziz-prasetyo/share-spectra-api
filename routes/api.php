<?php

use App\Http\Controllers\Api\V1\AuthApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthApiController::class, 'login']);
Route::post('/register', [AuthApiController::class, 'register']);
Route::post('/refresh', [AuthApiController::class, 'refreshToken']);

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/me', [AuthApiController::class, 'me']);
    Route::post('/logout', [AuthApiController::class, 'logout']);
});

Route::get('/ping', function () {
    return response()->json(['message' => 'Pong!']);
});
