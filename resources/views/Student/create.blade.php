@extends('welcome')
@section('title', 'Registro Estudiante')
@section('contenido')
    <center>
        <h1>Registrar Estudiantes</h1>
        <h3>Los campos con * son obligatorio <h3>
    </center>
    <form action="{{ route('student.store') }}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label>Nombre</label>
                <input type="text" class="form-control" name="name" value="" placeholder="Nombre">
                @error('name')
                    <br>
                    <small>* {{ $message }}</small>
                    <br>
                @enderror
            </div>
            <div class="col-md-4 mb-3">
                <label>Codigo</label>
                <input type="text" class="form-control" name="code" placeholder="Codigo de Alumno">
                @error('code')
                    <br>
                    <small>* {{ $message }}</small>
                    <br>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-5 mb-3">
                <div class="form-check">
                </div>
            </div>
            <div class="col-md-2 mb-3">
                <button class="btn btn-primary" type="submit">Registrar Alumno</button>
            </div>
            <div class="col-md-5 mb-3">
            </div>
        </div>
    </form>

@endsection
