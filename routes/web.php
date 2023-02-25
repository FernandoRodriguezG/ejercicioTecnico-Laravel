<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;


Route::get('/', [ProductosController::class, 'getAllProducts']);
Route::post('/buscaPorNombre', [ProductosController::class, 'searchByName']);
Route::post('/buscaPorPrecio', [ProductosController::class, 'searchByPriceRange']);
Route::post('/agregarProducto', [ProductosController::class, 'addNewProduct']);