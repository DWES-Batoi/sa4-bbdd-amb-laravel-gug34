<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\JugadoraController;
use App\Http\Controllers\Api\EquipController;

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->as('api.')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::apiResource('jugadores', JugadoraController::class)
        ->parameters(['jugadores' => 'jugadora'])
        ->except(['index', 'show']);

    Route::apiResource('equips', EquipController::class)
        ->parameters(['equips' => 'equip'])
        ->except(['index', 'show']);
});

Route::name('api.')->group(function () {
    Route::apiResource('jugadores', JugadoraController::class)
        ->parameters(['jugadores' => 'jugadora'])
        ->only(['index', 'show']);

    Route::apiResource('equips', EquipController::class)
        ->parameters(['equips' => 'equip'])
        ->only(['index', 'show']);
});