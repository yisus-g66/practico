@extends('welcome')
@section('title', 'Editar Estudiante')
@section('contenido')
    <center>
        <h1>Modificar Estudiante </h1>
        <h3>Los campos con * son obligatorio <h3>
    </center>
    <form action="{{ route('student.update', $student) }}" enctype="multipart/form-data" method="post">
        @csrf
        @method('put')
        <div class="form-row">
            <input type="hidden" name="id" value="{{$student->id}}">
            <div class="col-md-4 mb-3">
                <label>Nombre</label>
                <input type="text" class="form-control" name="name" value="{{ $student->name }}" placeholder="Nombre">
                @error('name')
                    <br>
                    <small>* {{ $message }}</small>
                    <br>
                @enderror
            </div>
            <div class="col-md-4 mb-3">
                <label>Codigo</label>
                <input type="text" class="form-control" name="code" value="{{ $student->code }}" placeholder="Codigo de Alumno">
                @error('code')
                    <br>
                    <small>* {{ $message }}</small>
                    <br>
                @enderror
            </div>
            <div class="col-md-4 mb-3">
                <label>Carrera</label>
                <br>
                <select class="form-control" name="Career_Id" id="">
                    <option value="{{ $student->Career_id }}">{{$careerReal->Name}}</option>
                    @foreach($career as $cr)
                    <option value="{{$cr->Id}}"> {{$cr->Name}} </option>
                    @endforeach
                </select>
                @error('career')
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
                <button class="btn btn-primary" type="submit">Guardar Datos</button>
            </div>
            <div class="col-md-5 mb-3">
            </div>
        </div>
    </form>

@endsection
