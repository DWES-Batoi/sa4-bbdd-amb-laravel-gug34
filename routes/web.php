<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EquipController;
use App\Http\Controllers\EstadiController;
use App\Http\Controllers\PartitController;
use App\Http\Controllers\JugadoraController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// ✅ Públicos: SOLO index
Route::resource('equips', EquipController::class)->only(['index']);
Route::resource('estadis', EstadiController::class)->only(['index']);
Route::resource('partits', PartitController::class)->only(['index']);
Route::resource('jugadoras', JugadoraController::class)->only(['index']);


// 🔒 Protegidos: crear/editar/borrar (y store/update/destroy)
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('equips', EquipController::class)->except(['index', 'show']);
    Route::resource('estadis', EstadiController::class)->except(['index', 'show']);
    Route::resource('partits', PartitController::class)->except(['index', 'show']);
    Route::resource('jugadoras', JugadoraController::class)->except(['index', 'show']);
});


// ✅ Públicos: show AL FINAL (para evitar conflictos con rutas como /create)
Route::resource('equips', EquipController::class)->only(['show']);
Route::resource('estadis', EstadiController::class)->only(['show']);
Route::resource('partits', PartitController::class)->only(['show']);
Route::resource('jugadoras', JugadoraController::class)->only(['show']);

require __DIR__.'/auth.php';