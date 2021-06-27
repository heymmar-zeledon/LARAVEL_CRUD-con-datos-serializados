<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use stdClass;

class AlumnoController extends Controller
{
    public function create()
    {
        return view('alumno.create');
    }

    public function insert(Request $request)
    {
        $alumnos = array();
        $resultado = " ";
        $lista = array();

        if ($request->isMethod("post") && $request->has("btEnviar")) {

            if (Storage::disk('local')->exists('archivo_alumnos.txt')) {
                $file = Storage::get('archivo_alumnos.txt');
                $alumnos = unserialize($file);
            }

            $foto = $request->file("a-foto");
          //obtenemos el nombre del archivo
            $nombrearchivofoto = $foto->getClientOriginalName();
          //indicamos que queremos guardar un nuevo archivo en el disco local
            Storage::disk('public')->put($nombrearchivofoto,  File::get($foto),'public');

            $al = new stdClass();
            $al->email = $request->input("a-email");
            $al->nombre = $request->input("a-nombre");
            $al->carnet = $request->input("a-ncarnet");
            $al->edad = $request->input("a-edad");
            $al->curso = $request->input("a-curso");       
            $al->foto = $nombrearchivofoto;

            $alumnos = array_values($alumnos);
            array_push($alumnos, $al);
            $alumnosSerialice = serialize($alumnos);
            Storage::disk('local')->put('archivo_alumnos.txt', $alumnosSerialice,'public');

            $resultado = "Registro guardado satisfactoriamente...";
        }

        return view('alumno.resformu')->with('res', $resultado)->with('listado', $lista);
    }

    public function list()
    {
        $lista = array();

        if (Storage::disk('local')->exists('archivo_alumnos.txt')) {
            $file = Storage::get('archivo_alumnos.txt');
            $lista = unserialize($file);
            $lista = array_values($lista);
            return view('alumno.resformu')->with('res', null)->with('listado', $lista);
        }
        return view('alumno.resformu')->with('res', null)->with('listado', $lista);
    }

    public function delete($carnet)
    {
            
            $file = Storage::get('archivo_alumnos.txt');
            $lista = unserialize($file);
            for($i = 0; $i < count($lista) ;$i++)
            {
                if($lista[$i]->carnet == $carnet)
                {
                    if(Storage::delete('/public/'.$lista[$i]->foto))
                    {
                        unset($lista[$i]);
                    }
                    $lista = array_values($lista);
                    break;
                }
            }
            $serialice = serialize($lista);
            Storage::disk('local')->put('archivo_alumnos.txt', $serialice,'public');
            $resultado = "Registro Borrado Correctamente";
            return view('alumno.confirm')->with('res',$resultado);
    }

    public function edit($carnet)
    {
        $file = Storage::get('archivo_alumnos.txt');
        $lista = unserialize($file);
        for($i = 0; $i < count($lista) ;$i++)
            {
                if($lista[$i]->carnet == $carnet)
                {
                    $alumno = $lista[$i];
                    break;
                }
            }
        return view('alumno.edit', compact('alumno'));
    }

    public function update(Request $request2, $carnet)
    {
            $file = Storage::get('archivo_alumnos.txt');
            $lista = unserialize($file);
            $nombrearchivofoto = "";
            for($i = 0; $i < count($lista) ;$i++)
            {
                if($lista[$i]->carnet == $carnet)
                {
                    if($request2->hasFile("foto"))
                    {
                        Storage::delete(['/public/'.$lista[$i]->foto]);
                        $foto = $request2->file("foto");
                        $nombrearchivofoto = $foto->getClientOriginalName();
                        Storage::disk('public')->put($nombrearchivofoto,  File::get($foto),'public');
                    }
                    else
                    {
                        $nombrearchivofoto = $lista[$i]->foto;
                    }
                    $email = $request2->input("a-email");
                    $nombre = $request2->input("a-nombre");
                    $carnet = $request2->input("a-ncarnet");
                    $edad = $request2->input("a-edad");
                    $curso = $request2->input("a-curso");       
                    $lista[$i]->email = $email;
                    $lista[$i]->nombre = $nombre;
                    $lista[$i]->carnet = $carnet;
                    $lista[$i]->edad = $edad;
                    $lista[$i]->curso = $curso;
                    $lista[$i]->foto = $nombrearchivofoto;
                    break;
                }
            }
            $alumnos = array_values($lista);
            $alumnosSerialice = serialize($lista);
            Storage::disk('local')->put('archivo_alumnos.txt', $alumnosSerialice,'public');
            $resultado = "Registro actualizado satisfactoriamente...";
            return view("alumno.confirm")->with('res',$resultado);
        
    }
}
