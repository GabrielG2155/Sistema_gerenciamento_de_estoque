<?php

<<<<<<< HEAD

use App\Http\Controllers\CategoriaController;

=======
use App\Http\Controllers\CategoriaController;
>>>>>>> 89fbab5 (feat: ajusta rotas, banco de dados sqlite e assets do modulo de categorias)
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

<<<<<<< HEAD

Route::resource('categorias', CategoriaController::class);

require __DIR__.'/settings.php';
=======
Route::resource('categorias', CategoriaController::class);

require __DIR__.'/settings.php';
>>>>>>> 89fbab5 (feat: ajusta rotas, banco de dados sqlite e assets do modulo de categorias)
