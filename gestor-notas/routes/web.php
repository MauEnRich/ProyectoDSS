<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NotaController;

// Rutas de autenticación
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas protegidas para notas y dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/', [NotaController::class, 'index'])->name('notas.index');  // Lista todas las notas

    Route::get('/notas/crear', [NotaController::class, 'create'])->name('notas.create');
    Route::post('/notas', [NotaController::class, 'store'])->name('notas.store');
    Route::get('/notas/{id}/editar', [NotaController::class, 'edit'])->name('notas.edit');
    Route::put('/notas/{id}', [NotaController::class, 'update'])->name('notas.update');
    Route::delete('/notas/{id}', [NotaController::class, 'destroy'])->name('notas.destroy');
    Route::get('/notas/{id}/descargar', [NotaController::class, 'descargarPDF'])->name('notas.descargarPDF');

    // Ruta para mostrar notas favoritas
    Route::get('/notas/favoritos', [NotaController::class, 'favoritos'])->name('notas.favoritos');

    Route::get('/papelera', [NotaController::class, 'papelera'])->name('notas.papelera');
    Route::post('/papelera/{id}/restaurar', [NotaController::class, 'restaurar'])->name('notas.restaurar');
    Route::delete('/papelera/{id}/eliminar-definitivo', [NotaController::class, 'eliminarDefinitivo'])->name('notas.eliminarDefinitivo');

    // Toggle favorito (activar o desactivar favorito)
    Route::post('/notas/{id}/favorito', [NotaController::class, 'toggleFavorito'])->name('notas.toggleFavorito');
});
