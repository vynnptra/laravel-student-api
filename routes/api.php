<?php

use App\Http\Controllers\Api\HobbyController;
use App\Http\Controllers\Api\SiswaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('siswa', SiswaController::class);
Route::apiResource('hobby', HobbyController::class);