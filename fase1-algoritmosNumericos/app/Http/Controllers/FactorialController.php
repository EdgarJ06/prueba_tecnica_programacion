<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FactorialController extends Controller
{
    public function index()
    {
        return view('factorial');
    }

    public function calcular(Request $request)
    {
        $request -> validate([
            'number' => 'required|integer|min:0',
        ]);

        $number = $request -> input('number');
        $factorial = $this -> factorial($number);
        $procedure = $this -> factorialProcedure($number);

        return view('factorial', ['number' => $number, 'factorial' => $factorial, 'procedure' => $procedure]);
    }

    private function factorial($number)
    {
        if($number == 0)
        {
            return 1;
        }

        return $number * $this -> factorial($number - 1);
    }

    private function factorialProcedure($number)
    {
        if($number == 0)
        {
            return "0! = 1";
        }

        $procedure = "";
        $result = 1;

        for($i = $number; $i > 0; $i--)
        {
            $result *= $i;
            $procedure .= ($i > 1) ? "$i * " : "$i";
        }

        $procedure .= " = $result";
        return $procedure;
    }
}
