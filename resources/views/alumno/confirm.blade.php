@extends('ejemploplantilla')

@section('contenido')
<div class='alert alert-success'>
    <strong>Success!</strong> {{$res}} </div>
    <br/>
    <a href='/alumno/create' class='card-link'>Ir Atrás</a>

@endsection