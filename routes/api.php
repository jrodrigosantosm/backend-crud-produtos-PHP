<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;


Route::post('/produtos', [ProdutoController::class, 'novo'])->name('novoProduto');
Route::get('/produtos', [ProdutoController::class, 'index']);
Route::get('/produtos/{id}', [ProdutoController::class, 'show']);
Route::put('/produtos/{id}', [ProdutoController::class, 'update'])->name('updateProduto');
Route::delete('/produtos/{id}', [ProdutoController::class, 'destroy']);

