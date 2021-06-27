<!DOCTYPE html>
<html>
    <head>
        <title>
            Resultado
        </title>
    </head>
    <body>
        @extends('ejemploplantilla')
        @section('contenido')
            {{$nombre}} : tu edad es {{$edad}}
        @endsection
    </body>
</html>