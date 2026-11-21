<?php

use App\Http\Controllers\productoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/producto', [productoController::class, 'index'])->name('producto.index');
    Route::get('/producto/create', [productoController::class, 'create'])->name('producto.create');
    Route::post('/producto', [productoController::class, 'store'])->name('producto.store');
    Route::get('/producto/{id}/edit', [productoController::class, 'edit'])->name('producto.edit');
    Route::put('/producto/{id}', [productoController::class, 'update'])->name('producto.update');
    Route::delete('/producto/{id}', [productoController::class, 'destroy'])->name('producto.destroy');
});

require __DIR__.'/auth.php';
