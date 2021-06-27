@extends('ejemploplantilla')

@section('contenido')
    {{$res}}

    <br/>

    @if (count($listadoc) > 0)

        <table class='table'>
            <tr><th> <b><h4>Docentes</h4></b></th></tr>
            <tr>
            <th scope='col'> Foto </th>
            <th scope='col'> Información </th>
        </tr> 
        @foreach($listadoc as $datadoc)
            <tr>
                <td align='center'> 
                <img src="/imagenesDoc/{{$datadoc->foto}}" alt='foto del Docente' width='120' height='112'/>
                </td>
                <td> <b>ID: </b> {{ $datadoc->id }} <br/> 
                    Nombre: {{ $datadoc->nombre }} <br/> 
                    Correo Electrónico: {{ $datadoc->correo }} <br/> 
                    Edad: {{ $datadoc->edad }} <br/> Especializacion: {{ $datadoc->especializacion }} <br/> 
                    <a href='/Docente/delete/{{$datadoc->id}}' class="btn btn-danger">Eliminar</a>&nbsp;&nbsp;<a href='/Docente/edit/{{$datadoc->id}}' class="btn btn-info">Editar</a>
            </td>
            </tr>
        @endforeach
    </table>
    @endif
    @if(count($listadoc) == 0 && $res == null)
        <div class='alert alert-warning'>
            <strong>Warning!</strong> No hay ningun registro.</div>
        <br/>
    @endif
    <br/>
    <a href='/Docente/create' class='card-link'>Ir Atrás</a>

@endsection