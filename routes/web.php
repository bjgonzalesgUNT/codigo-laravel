<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::prefix('/dashboard')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/about', AboutController::class)->name('about');

    // Rutas del recurso services sin protección
    Route::resource('/services', ServiceController::class)->only(['index', 'show']);

    // Rutas del recurso services con protección
    Route::middleware(['auth'])->group(function () {
        Route::resource('/services', ServiceController::class)->only(['edit', 'update', 'destroy', 'create', 'store']);
    });

    Route::resource('/contacts', ContactController::class)->only(['index']);

    Route::middleware(['auth'])->group(function () {
        Route::resource('/contacts', ContactController::class)->only(['create', 'store']);
    });
});




require __DIR__ . '/auth.php';
