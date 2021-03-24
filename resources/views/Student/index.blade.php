@extends('welcome')
@section('title', 'Lista Estudiante')
@section('contenido')
    <h1>Lista Estudiantes</h1>
    <table style="text-align: center" class="table table-bordered table-hover table-responsive-xl">
        <thead class="thead-dark">
            <tr>
                <th>Nombre</th>
                <th>Codigo Alumno</th>
                <th>Fecha Creación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
    @foreach($student as $cr)
    <tr>
        <td> {{$cr->name}}</td>
        <td>{{$cr->code}}</td>
        <td>{{$cr->created_at}}</td>
        <td><a href="{{ route('student.edit', $cr->id) }}"><i title="Editar"
            class="fa fa-edit icon"></i></a>
</td>
    </tr>
    @endforeach
    </tbody>
    </table>
    <nav aria-label="Page navigation example " class="float-right">
        <ul class="pagination">
            <li class=" {{ $student->currentPage() == 1 ? ' disabled' : '' }} page-item"><a class="page-link"
                    href="{{ $student->url(1) }}">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            @for ($i = 1; $i <= $student->lastPage(); $i++)
                <li class="{{ $student->currentPage() == $i ? ' seleccionar ' : '' }} page-item">
                    <a class=" page-link " href="{{ $student->url($i) }}">{{ $i }}</a>
                </li>
            @endfor
            <li class="{{ $student->currentPage() == $student->lastPage() ? ' disabled' : '' }} page-item">
                <a href="{{ $student->url($student->currentPage() + 1) }}" class="page-link" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>
@endsection
