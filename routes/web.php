<?php

use App\Http\Controllers\cargarController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[cargarController::class, 'inicio'] )->name('inicio');
Route::post('/excel_cargado', [cargarController::class, 'cargar_excel'])->name('cargar.excel');
