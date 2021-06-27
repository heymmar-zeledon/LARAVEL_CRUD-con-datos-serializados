@extends('ejemploplantilla')

 
@section('contenido')
    <a class="btn btn-primary" href="/Docente/list" role="button">Listado de Docentes</a>

    <hr />

    <h1>Formulario Docente</h1>

    <form action="{{ url('/Docente/insert') }}" method="post" class="col-md-6" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="email" class="form-control col-md-6" name="d-email" placeholder="Ingrese su correo electrónico"
                required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="d-nombre" placeholder="Ingrese su nombre completo" maxlength="200"
                required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control col-md-6" name="d-id" placeholder="Ingrese el id de Docente"
                maxlength="10" required>
        </div>
        <div class="form-group">
            <input type="number" class="form-control col-md-3" name="d-edad" placeholder="Edad" min="20" max="50" required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="d-especializacion" placeholder="Ingrese su area en que se especializa" maxlength="200"
                required>
        </div>
        <div class="form-group">
            <label>Foto</label>
            <input type="file" class="form-control" name="d-foto" id="d-foto" require accept="image/*" required>
        </div>
        <button type="submit" name="btEnviar" value="btDocente" class="btn btn-primary">Enviar</button>
    </form>
@endsection