@extends('ejemploplantilla')

 
@section('contenido')
    <a class="btn btn-primary" href="/Docente/list" role="button">Listado de Docentes</a>
    <hr />

    <h1>Edición Docente</h1>

    <form action="{{ url('/Docente/update/'.$Docente->id) }}" method="post" class="col-md-6" enctype="multipart/form-data">
        @csrf 
        @method('patch')
        <div class="form-group">
            <input type="email" class="form-control col-md-6" value="{{ $Docente->correo }}" name="d-email"
                required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="d-nombre" value="{{ $Docente->nombre }}" maxlength="200"
                required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control col-md-6" name="d-id" value="{{ $Docente->id}}" readonly
                maxlength="10" required>
        </div>
        <div class="form-group">
            <input type="number" class="form-control col-md-3" name="d-edad" value="{{ $Docente->edad }}"  min="20" max="50" required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control col-md-10" name="d-especializacion" value="{{ $Docente->especializacion }}" placeholder="Ingrese su area en que se especializa" maxlength="200" required>
        </div>
        <div class="form-group">
            <label>Foto</label>
            <br>
            <img src="/imagenesDoc/{{$Docente->foto}}" alt='foto del Docente' width='100' height='80'/>
            <input type="file" class="form-control" name="d-foto" id="d-foto" require accept="image/*">
        </div>
        <button type="submit" name="btnActualizar" value="btDocente" class="btn btn-primary">Actualizar</button>
    </form>
@endsection