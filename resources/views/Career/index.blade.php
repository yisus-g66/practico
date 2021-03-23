@extends('welcome')
@section('title', 'Empresa')
@section('contenido')

    <h1>Admin Career</h1>
    <table style="text-align: center" class="table table-bordered table-hover table-responsive-xl">
        <thead class="thead-dark">
            <tr>
                <th>Nombre</th>
                <th>Estado</th>
                <th>Fecha Creación</th>
            </tr>
        </thead>
        <tbody>
    @foreach($career as $cr)
    <tr>
        <td> {{$cr->Name}}</td>
        <td>{{$cr->State}}</td>
        <td>{{$cr->Created_at}}</td>
    </tr>
    @endforeach
    </tbody>
    </table>
    <nav aria-label="Page navigation example " class="float-right">
        <ul class="pagination">
            <li class=" {{ $career->currentPage() == 1 ? ' disabled' : '' }} page-item"><a class="page-link"
                    href="{{ $career->url(1) }}">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            @for ($i = 1; $i <= $career->lastPage(); $i++)
                <li class="{{ $career->currentPage() == $i ? ' seleccionar ' : '' }} page-item">
                    <a class=" page-link " href="{{ $career->url($i) }}">{{ $i }}</a>
                </li>
            @endfor
            <li class="{{ $career->currentPage() == $career->lastPage() ? ' disabled' : '' }} page-item">
                <a href="{{ $career->url($career->currentPage() + 1) }}" class="page-link" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>
@endsection
