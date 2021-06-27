<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class TablasDeMultiplicar extends Controller
{
    public function tablas()
    {
        return view("tablasview");
    }

    public function tablaPersonalizada($Numero)
    {
        $validar = settype($Numero,"int");
        if($Numero == 0)
            return "Variable no valida";
        else
            return view("TablaPersonalizada")->with('numero',$Numero);
    }
}
