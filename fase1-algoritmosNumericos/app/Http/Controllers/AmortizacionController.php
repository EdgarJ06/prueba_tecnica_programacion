<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AmortizacionController extends Controller
{

    public function index()
    {
        return view('amortizacion');
    }

    public function calcularAmortizacion(Request $request)
    {
        // Obtener los datos del formulario
        $montoPrestamo = $request->monto;
        $tasaInteresAnual = $request->interes;
        $plazoPrestamo = $request->plazo;

        // Validar que el plazo del préstamo sea mayor que cero para evitar división por cero
        if ($plazoPrestamo <= 0) {
            return redirect()->back()->withInput()->withErrors(['plazo' => 'El plazo del préstamo debe ser mayor que cero.']);
        }

        // Calcular la tasa de interés mensual
        $tasaInteresMensual = $tasaInteresAnual / 12 / 100; // Dividir la tasa anual por 12 (meses) y convertir a decimal

        // Calcular el monto de la cuota mensual (amortización constante)
        $cuota = $montoPrestamo / $plazoPrestamo; // Dividir el monto del préstamo por el plazo en meses

        // Inicializar el arreglo para almacenar los datos de amortización
        $amortizacion = [];

        // Inicializar el saldo del préstamo
        $saldo = $montoPrestamo;

        // Iterar sobre cada mes del plazo del préstamo
        for ($mes = 1; $mes <= $plazoPrestamo; $mes++) {
            // Calcular los intereses del mes como el saldo pendiente multiplicado por la tasa de interés mensual
            $intereses = $saldo * $tasaInteresMensual;

            // Calcular el total de la cuota sumando el pago de capital y los intereses del mes
            $cuotaTotal = $cuota + $intereses;

            // Actualizar el saldo pendiente del préstamo restando el pago de capital
            $saldo -= $cuota;

            // Agregar los datos de este mes a la tabla de amortización
            $amortizacion[] = [
                'mes' => $mes,
                'saldo_inicial' => round($saldo + $cuota, 2),
                'pago_capital' => round($cuota, 2),
                'intereses' => round($intereses, 2),
                'cuota' => round($cuotaTotal, 2),
                'saldo_final' => round($saldo, 2),
            ];
        }

        // Calcular el resumen de pagos
        $primeraCuota = $amortizacion[0]['cuota'];
        $ultimaCuota = $amortizacion[$plazoPrestamo - 1]['cuota'];
        $interesesTotales = array_sum(array_column($amortizacion, 'intereses'));
        $tasaInteresAnual;

        // Devolver la vista 'amortizacion' con los datos de amortización y el resumen de pagos
        return view('amortizacion', [
            'amortizacion' => $amortizacion,
            'primeraCuota' => $primeraCuota,
            'ultimaCuota' => $ultimaCuota,
            'interesesTotales' => $interesesTotales
        ]);
    }
}
