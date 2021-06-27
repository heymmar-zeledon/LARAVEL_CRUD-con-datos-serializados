<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaludoController extends Controller
{
    public function inicio()
    {
        return view("Bienvenida");
    }

    public function Saludo($nombre)
    {
        return strtoupper($nombre);
    }

    public function comparar($nombre1,$nombre2)
    {
        $i = strcmp($nombre1,$nombre2);

        if($i<0)
        {
            return "{$nombre1} es menor ";
        }
        else if($i==0)
        {
            return "son iguales";
        }
        else
        {
            return "{$nombre2} es menor";
        }
    }

    public function CalcularEdad($nombre, $anyo_nac)
    {
        $edad = date("Y") - $anyo_nac;
        return view('VistaEdad', compact('nombre','edad'));
    }

    public function ComparaNombres($nombre1, $nombre2)
    {
        $res=strcmp($nombre1,$nombre2);
        return view("ComparaView")->with("nombre1",$nombre1)->with("nombre2",$nombre2)->with("res",$res);
    }
}

