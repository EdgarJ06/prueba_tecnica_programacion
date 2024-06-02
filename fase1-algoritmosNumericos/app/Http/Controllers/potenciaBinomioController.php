<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class potenciaBinomioController extends Controller
{
    public function index()
    {
        return view('binomio');
    }

    public function expandBinomial(Request $request)
    {
        $binomio = $request->input('binomio');

        // Validar la entrada si es necesario
        $validatedData = $request->validate([
            'binomio' => 'required|integer|min:0',
        ]);

        $result = $this->expandBinomialHelper($binomio);

        return view('binomio', ['result' => $result]);
    }

    private function binomialCoefficient($n, $k)
    {
        // Función para calcular el coeficiente binomial
        if ($k == 0 || $k == $n) {
            return 1;
        }
        return $this->binomialCoefficient($n - 1, $k - 1) + $this->binomialCoefficient($n - 1, $k);
    }

    private function expandBinomialHelper($n)
    {
        // Función para expandir el binomio (a + b)^n
        $result = "";

        for ($k = 0; $k <= $n; $k++) {
            $coefficient = $this->binomialCoefficient($n, $k);
            $a_exp = $n - $k;
            $b_exp = $k;

            $term = ($coefficient != 1 ? $coefficient : '');
            $term .= ($a_exp > 0 ? "a" . ($a_exp > 1 ? "^$a_exp" : '') : '');
            $term .= ($b_exp > 0 ? "b" . ($b_exp > 1 ? "^$b_exp" : '') : '');

            $result .= ($term . ($k < $n ? " + " : ""));
        }

        return $result;
    }
}
