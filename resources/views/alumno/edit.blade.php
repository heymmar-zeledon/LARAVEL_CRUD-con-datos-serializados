@extends('ejemploplantilla')

 
@section('contenido')
    <a class="btn btn-primary" href="/alumno/list" role="button">Ver Listado de Alumnos</a>
    <hr />

    <h1>Edición</h1>

    <form action="{{ url('/alumno/update/'.$alumno->carnet) }}" method="post" class="col-md-6" enctype="multipart/form-data">
        @csrf 
        @method('patch')
        <div class="form-group">
            <input type="email" class="form-control col-md-6" value="{{ $alumno->email }}" name="a-email"
                required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="a-nombre" value="{{ $alumno->nombre }}" maxlength="200"
                required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control col-md-6" name="a-ncarnet" value="{{ $alumno->carnet }}" readonly
                maxlength="10" required>
        </div>
        <div class="form-group">
            <input type="number" class="form-control col-md-3" name="a-edad" value="{{ $alumno->edad }}"  min="15" max="50" required>
        </div>
        <div class="form-group">
            <input type="number" class="form-control col-md-3" name="a-curso" value="{{ $alumno->curso }}" min="1" max="5" required>
        </div>
        <div class="form-group">
            <label>Foto</label>
            <br>
            <img src="/imagenesalum/{{$alumno->foto}}" alt='foto del alumno' width='100' height='80'/>
            <input type="file" class="form-control" name="foto" id="foto" require accept="image/*">
        </div>
        <button type="submit" name="btnActualizar" value="btAlumno" class="btn btn-primary">Actualizar</button>
    </form>
@endsection