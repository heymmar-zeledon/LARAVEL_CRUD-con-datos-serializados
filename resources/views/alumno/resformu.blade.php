@extends('ejemploplantilla')

@section('contenido')
    {{$res}}

    <br/>

    @if (count($listado) > 0)

        <table class='table'>
            <tr>
            <th scope='col'> Foto </th>
            <th scope='col'> Información </th>
        </tr> 
        @foreach($listado as $data)
            <tr>
                <td align='center'> 
                <img src="{{ asset('/storage/'. $data->foto) }}" alt='foto del alumno' width='120' height='112'/>
                </td>
                <td> <b>No. de Carnet:</b> {{ $data->carnet }} <br/> 
                    Nombre: {{ $data->nombre }} <br/> 
                    Correo Electrónico: {{ $data->email }} <br/> 
                    Edad: {{ $data->edad }} <br/> Curso Actual: {{ $data->curso }} <br/> 
                    <a href='/alumno/delete/{{$data->carnet}}' class="btn btn-danger">Eliminar</a>&nbsp;&nbsp;<a href='/alumno/edit/{{$data->carnet}}' class="btn btn-info">Editar</a>
            </td>
            </tr>
        @endforeach
    </table>
    @endif
    @if(count($listado) == 0 && $res == null)
        <div class='alert alert-warning'>
            <strong>Warning!</strong> No hay ningun registro.</div>
        <br/>
    @endif
    <br/>
    <a href='/alumno/create' class='card-link'>Ir Atrás</a>

@endsection