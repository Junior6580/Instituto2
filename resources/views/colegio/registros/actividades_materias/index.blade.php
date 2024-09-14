@extends('layouts.app')
@php
    $pageTitle = 'Materias';
@endphp
@section('css')
@show
@section('content')
    <div class="custom">
        <main class="py-4"></main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Materias</div>

                        <div class="card-body">
                            <table id="datatable" class="table table-sm table-striped">
                                <thead class="text-dark">
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th>Docente Id</th>

                                        <th><a href="{{ route('nueva_materia') }}" class="btn btn-success btn-sm"><i
                                                    class="fas fa-plus"></i></a></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($materias as $materia)
                                        <tr>
                                            <td>{{ $materia->id }}</td>
                                            <td>{{ $materia->nombre }}</td>
                                            <td>{{ $materia->descripcion }}</td>
                                            @foreach ($docentes as $docente)
                                                @foreach ($personas as $persona)
                                                    @if ($materia->docente_id == $docente->id)
                                                        <td>{{ $docente->id }} {{ $docente->persona->primer_nombre }}
                                                            {{ $docente->persona->primer_apellido }}</td>
                                                    @break
                                                @endif
                                            @endforeach
                                        @endforeach


                                        <td><a href="" class="btn btn-info btn-sm"><i
                                                    class="fas fa-edit"></i></a>
                                            <button class="btn btn-danger btn-sm" id="prueba" value=""><i
                                                    class="fas fa-backspace"></i></button>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@section('scripts')
@show

@section('dataTables')
@show
@endsection
