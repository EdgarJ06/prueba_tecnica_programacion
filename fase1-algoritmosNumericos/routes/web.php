<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FactorialController;
use App\Http\Controllers\AmortizacionController;
use App\Http\Controllers\potenciaBinomioController;


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


Route::get('/principal', function() {
    return view('principal');
});

#rutas necesarias para el funcionamiento de "factorial"
Route::get('/factorial', [FactorialController::class, 'index']);
Route::post('/factorial', [FactorialController::class, 'calcular']);

#ruta necesaria para el funcionamiento de "Calculo de amortizacion"
Route::get('/amortizacion', [AmortizacionController::class, 'index']);
Route::post('/amortizacion', [AmortizacionController::class, 'calcularAmortizacion']);

#Ruta necesaria para el funcionamiento de "potencia de binomio"
Route::get('/potencia-binomio', [potenciaBinomioController::class, 'index']);
Route::post('/potencia-binomio', [potenciaBinomioController::class, 'expandBinomial']);
