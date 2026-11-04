<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProdutoController; 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FornecedorController; 


Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return redirect()->route('categorias.index');
    })->name('dashboard');

    Route::resource('categorias', CategoriaController::class);
    Route::resource('produtos', ProdutoController::class);
    Route::resource('marcas', MarcaController::class);
    Route::resource('fornecedores', FornecedorController::class);
    
});

require __DIR__.'/settings.php';