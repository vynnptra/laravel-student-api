<?php

use App\Http\Controllers\Api\HobbyController;
use App\Http\Controllers\Api\SiswaController;
use App\Http\Controllers\AuthenticationController;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('register', [AuthenticationController::class, 'register'])->middleware('guest');
Route::post('login', [AuthenticationController::class, 'login'])->middleware('guest');
Route::apiResource('siswa', SiswaController::class)->middleware('auth:sanctum');
Route::apiResource('hobby', HobbyController::class)->middleware('auth:sanctum');