<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OperacionesController extends Controller
{
    public function Operaciones($num1,$operacion,$num2)
    {
        if($operacion == "+")
        {
            $r = $num1 + $num2;
            $resultado = "La suma de ".$num1. "+". $num2 ."=". $r;
            return view("Operaciones")->with('res',$resultado);
        }
        else if ($operacion == "-")
        {
            $r = $num1 - $num2;
            $resultado = "La resta de ".$num1. "-". $num2 ."=". $r;
            return view("Operaciones")->with('res',$resultado);
        }
        else if($operacion == "*")
        {
            $r = $num1 * $num2;
            $resultado = "La multiplicacion de ".$num1. "*". $num2 ."=". $r;
            return view("Operaciones")->with('res',$resultado);
        }
        else if($operacion == "%")
        {
            if($num2 == 0)
            {
                $resultado = "La division entre 0 no existe";
                return view("Operaciones")->with('res',$resultado);
            }
            else
            {
                $r = $num1 / $num2;
                $resultado = "La division de ".$num1. "/". $num2 ."=". $r;
                return view("Operaciones")->with('res',$resultado);
            }
        }
        else
        {
            $resultado = "operacion invalida";
            return view("Operaciones")->with('res',$resultado);
        }
    }
}
