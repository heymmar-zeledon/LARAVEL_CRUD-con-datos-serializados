<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">

    <style>
        body {
            padding-top: 5rem;
        }

    </style>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Modulos:
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ asset('/ini') }}">Inicio</a>
                        <a class="dropdown-item" href="{{ asset('/alumno/create') }}">Alumno</a>
                        <a class="dropdown-item" href="{{ asset('/Docente/create') }}">Docente</a>
                        <a class="dropdown-item" href="{{ asset('/operacion/10/+/20/') }}">Operacion suma (Datos estaticos)</a>
                        <a class="dropdown-item" href="{{ asset('/operacion/50/-/23/') }}">Operacion resta (Datos estaticos)</a>
                        <a class="dropdown-item" href="{{ asset('/operacion/12/*/3/') }}">Operacion multiplicacion (Datos estaticos)</a>
                        <a class="dropdown-item" href="{{ asset('/operacion/100/%/5/') }}">Operacion division (Datos estaticos)</a>
                        <a class="dropdown-item" href="{{ asset('/tablas') }}">Tablas Basicas de multiplicacion</a>
                        <a class="dropdown-item" href="{{ asset('/tablas/12/') }}">Tabla Personalizada (Numero 12(estatico) con 100 multiplos)</a>
                    </div>
                </div>
            </div>
            <div class=" col-sm-10 alert alert-secondary" role="alert">
                @yield('contenido')
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>