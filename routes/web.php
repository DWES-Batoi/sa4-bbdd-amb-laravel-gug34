<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EquipController;
use App\Http\Controllers\EstadiController;
use App\Http\Controllers\PartitController;
use App\Http\Controllers\JugadoraController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassificacioController;
Route::get('/classificacio', [ClassificacioController::class, 'index'])->name('classificacio.index');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ✅ Ruta per canviar idioma (i18n)
Route::get('/locale/{locale}', function (string $locale) {
    $available = ['ca', 'es', 'en'];

    if (!in_array($locale, $available, true)) {
        $locale = config('app.fallback_locale', 'en');
    }

    Session::put('locale', $locale);

    return redirect()->back();
})->name('setLocale');


// ✅ Públicos: SOLO index
Route::resource('equips', EquipController::class)->only(['index']);
Route::resource('estadis', EstadiController::class)->only(['index']);
Route::resource('partits', PartitController::class)->only(['index']);
Route::resource('jugadoras', JugadoraController::class)->only(['index']);


// 🔒 Protegidos: crear/editar/borrar (y store/update/destroy)
Route::middleware(['auth', 'not.convidat'])->group(function () {

    Route::resource('equips', EquipController::class)->except(['index', 'show']);
    Route::resource('estadis', EstadiController::class)->except(['index', 'show']);
    Route::resource('partits', PartitController::class)->except(['index', 'show']);
    Route::resource('jugadoras', JugadoraController::class)->except(['index', 'show']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});


// Auth google
Route::get('/auth/google/redirect', [AuthController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('google.callback');


// ✅ Públicos: show AL FINAL (para evitar conflictos con rutas como /create)
Route::resource('equips', EquipController::class)->only(['show']);
Route::resource('estadis', EstadiController::class)->only(['show']);
Route::resource('partits', PartitController::class)->only(['show']);
Route::resource('jugadoras', JugadoraController::class)->only(['show']);

require __DIR__ . '/auth.php';