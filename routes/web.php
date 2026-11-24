<?php

use App\Http\Controllers\productoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BautismoController;
use App\Http\Controllers\ConfiguracionController;

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


// Módulo de bautismos
Route::middleware('auth')->group(function () {

    Route::get('/bautismos', [BautismoController::class, 'index'])
        ->name('bautismos.index');

    Route::get('/bautismos/crear', [BautismoController::class, 'create'])
        ->name('bautismos.create');

    Route::post('/bautismos', [BautismoController::class, 'store'])
        ->name('bautismos.store');

    Route::get('/bautismos/{id}/editar', [BautismoController::class, 'edit'])
        ->name('bautismos.edit');

    Route::put('/bautismos/{id}', [BautismoController::class, 'update'])
        ->name('bautismos.update');

    Route::delete('/bautismos/{id}', [BautismoController::class, 'destroy'])
        ->name('bautismos.destroy');

    Route::get('/bautismos/{id}/pdf', [BautismoController::class, 'pdf'])
        ->name('bautismos.pdf');
        
    Route::get('/bautismos/{id}', [BautismoController::class, 'show'])
        ->name('bautismos.show');

    

});

// Módulo de configuración
Route::middleware('auth')->group(function () {

    Route::get('/configuracion', [ConfiguracionController::class, 'index'])
        ->name('configuracion.index');

    Route::put('/configuracion', [ConfiguracionController::class, 'update'])
        ->name('configuracion.update');

});

require __DIR__.'/auth.php';
