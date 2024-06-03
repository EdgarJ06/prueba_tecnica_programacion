<?php

use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\TecnicoController;
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

Route::get('/', function () {
    return view('welcome');
});

#ruta para el acceso a Cliente
Route::resource('clientes', ClienteController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

#ruta para el acceso a Marcas
Route::resource('marcas', MarcaController::class);


#ruta para el acceso a Equipos
Route::resource('equipos', EquipoController::class);


#ruta para el acceso a Tecnicos
Route::resource('tecnicos', TecnicoController::class);


#ruta para el acceso a estados
Route::resource('estados', EstadoController::class);


#ruta para el acceso a Servicios
Route::resource('servicios', ServicioController::class);


#ruta para el acceso a bitacoras
Route::resource('bitacoras', BitacoraController::class);
