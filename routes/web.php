<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\ConductorController;
use App\Http\Controllers\PropietarioController;
use App\Http\Controllers\InformeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Rutas para Vehículos
Route::resource('vehiculos', VehiculoController::class);

// Rutas para Conductores
Route::resource('conductores', ConductorController::class)->parameters([
    'conductores' => 'conductor'
]);

// Rutas para Propietarios
Route::resource('propietarios', PropietarioController::class);

// Ruta para Informes
Route::get('/informes', [InformeController::class, 'index'])->name('informes.index');

