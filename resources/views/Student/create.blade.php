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
            <div class="col-md-2 mb-3">
                <label>Carreras</label>
                <select class="custom-select" id="career" name="career_id">
                    <option value="">Seleccionar carrera</option>
                    @foreach ($career as $careers)
                        <option value="{{ $careers->id }}">{{ $careers->name }}</option>
                    @endforeach
                </select>
                @error('career_id')
                    <br>
                    <small>* {{ $message }}</small>
                    <br>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-5 mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck">
                    <label class="form-check-label">
                        Estoy de acuerdo con los terminos y condiciones
                    </label>
                    <div class="invalid-feedback">
                        You must agree before submitting.
                    </div>
                </div>
            </div>
            <div class="col-md-2 mb-3">
                <button class="btn btn-primary" type="submit">Crear Usuario</button>
            </div>
            <div class="col-md-5 mb-3">
            </div>
        </div>
    </form>
    <script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js') }}"></script>

<script>
    
    $(document).ready(function(){
        $('#departamento').on('change',onselectiondepartamento);
    });
    function onselectiondepartamento(){
        var departamento_id = $(this).val();
        console.log(departamento_id);
            $.get('/provincia/'+ departamento_id+'/provincia', function(provincia){ 
                var html_select = "<option value=''>Seleccionar provincia</option>";
                for(var i=0; i<provincia.length; i++)
                html_select += "<option value='"+ provincia[i].id +"'>"+ provincia[i].nombre +"</option>"
                console.log(provincia);
                $('#provincia').html(html_select);
            });
        
    }
   

    // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

    </script>
@endsection
