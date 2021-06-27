<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use docentClass;

class DocenteController extends Controller
{
    public function create()
    {
        return view('Docente.doccreate');
    }

    public function insert(Request $docrequest)
    {
        
        $Docentes = array();
        $resultado = " ";
        $listadoc = array();
        $foto = " ";

        if ($docrequest->isMethod("post") && $docrequest->has("btEnviar")) {

            if (Storage::disk('local')->exists('archivo_Docentes.txt')) {
                $file = Storage::get('archivo_Docentes.txt');
                $Docentes = unserialize($file);
            }
            if($docrequest->hasFile('d-foto-doc'))
            {
                $foto = $docrequest->file('d-foto');
                $nombrearchivofoto = time().$foto->getClientOriginalName();
                $foto->move(public_path().'/imagenesDoc/',$nombrearchivofoto);
            }
            else
            {
                $foto = $docrequest->file('d-foto');
                $nombrearchivofoto = $foto->getClientOriginalName();
                $foto->move(public_path().'/imagenesDoc/',$nombrearchivofoto);
            }
            
            $correo = $docrequest->input("d-email");
            $nombre = $docrequest->input("d-nombre");
            $id = $docrequest->input("d-id");
            $edad = $docrequest->input("d-edad");
            $especializacion = $docrequest->input("d-especializacion");
            
            $doc = new docentClass($correo,$nombre,$id,$edad,$especializacion,$nombrearchivofoto);
            $Docentes = array_values($Docentes);
            array_push($Docentes, $doc);
            $docSerialice = serialize($Docentes);
            Storage::disk('local')->put('archivo_Docentes.txt', $docSerialice,'public');

            $resultado = "Registro guardado satisfactoriamente...";
        }

        return view('Docente.List')->with('res', $resultado)->with('listadoc',$listadoc);
    }

    public function list()
    {
        $listadoc = array();

        if (Storage::disk('local')->exists('archivo_Docentes.txt')) {
            $file = Storage::get('archivo_Docentes.txt');
            $listadoc = unserialize($file);
            $listadoc = array_values($listadoc);
            return view('Docente.List')->with('res', null)->with('listadoc', $listadoc);
        }
        return view('Docente.List')->with('res', null)->with('listadoc', $listadoc);
    }

    public function delete($id)
    {
        $file = Storage::get('archivo_Docentes.txt');
        $listadoc = unserialize($file);
        for($i = 0; $i < count($listadoc) ;$i++)
        {
            if($listadoc[$i]->id == $id)
            {
                $file_path = public_path().'/imagenesDoc/'.$listadoc[$i]->foto;
                unlink($file_path);
                unset($listadoc[$i]);
                $listadoc = array_values($listadoc);
                break;
            }
        }
        $serialice = serialize($listadoc);
        Storage::disk('local')->put('archivo_Docentes.txt', $serialice,'public');
        $resultado = "Registro Borrado Correctamente";
        return view('Docente.confirmaciones')->with('res',$resultado);
    }

    public function edit($id)
    {
        $file = Storage::get('archivo_Docentes.txt');
        $listadoc = unserialize($file);
        for($i = 0; $i < count($listadoc) ;$i++)
            {
                if($listadoc[$i]->id == $id)
                {
                    $Docente = $listadoc[$i];
                    break;
                }
            }
        return view('Docente.editdoc', compact('Docente'));
    }

    public function update(Request $request2, $id)
    {
        $file = Storage::get('archivo_Docentes.txt');
        $listadoc = unserialize($file);
        $nombrearchivofoto = "";
        for($i = 0; $i < count($listadoc) ;$i++)
        {
            if($listadoc[$i]->id == $id)
            {
                if($request2->hasFile("d-foto"))
                {
                    $file_path = public_path().'/imagenesDoc/'.$listadoc[$i]->foto;
                    unlink($file_path);
                    $foto = $request2->file("d-foto");
                    $nombrearchivofoto = $foto->getClientOriginalName();
                    $foto->move(public_path().'/imagenesDoc/',$nombrearchivofoto);
                }
                else
                {
                    $nombrearchivofoto = $listadoc[$i]->foto;
                }
                $email = $request2->input("d-email");
                $nombre = $request2->input("d-nombre");
                $id = $request2->input("d-id");
                $edad = $request2->input("d-edad");
                $especializacion = $request2->input("d-especializacion");       
                $listadoc[$i]->correo = $email;
                $listadoc[$i]->nombre = $nombre;
                $listadoc[$i]->id = $id;
                $listadoc[$i]->edad = $edad;
                $listadoc[$i]->especializacion = $especializacion;
                $listadoc[$i]->foto = $nombrearchivofoto;
                break;
            }
        }
        $Docentes = array_values($listadoc);
        $DocentesSerialice = serialize($Docentes);
        Storage::disk('local')->put('archivo_Docentes.txt', $DocentesSerialice,'public');
        $resultado = "Registro actualizado satisfactoriamente...";
        return view("Docente.confirmaciones")->with('res',$resultado);
    
    }
}
