@extends('layouts.app')
@php
    $pageTitle = 'Calificaciones';
@endphp

@section('content')
    <main class="py-4"></main>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Calificaciones</div>

                <div class="card-body">

                    <table id="datatable" class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Alumno Id</th>
                                <th>Docente Id</th>
                                <th>Actividad Id</th>
                                <th>Promedio</th>
                                @can('create_calificaciones')
                                    <th style="width: 200px;"><a href="{{ route('calificaciones.create') }}"
                                            class="btn btn-success btn-sm"><i class="fas fa-plus"></i></a></th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($calificaciones as $calificacion)
                                <tr>

                                    <td>{{ $calificacion->id }}</td>
                                    @foreach ($alumnos as $alumno)
                                        @foreach ($personas as $persona)
                                            @if ($calificacion->alumno_id == $alumno->id)
                                                <td>{{ $alumno->id }} {{ $alumno->persona->primer_nombre }}
                                                    {{ $alumno->persona->primer_apellido }}</td>
                                            @break
                                        @endif
                                    @endforeach
                                @endforeach
                                @foreach ($docentes as $docente)
                                    @foreach ($personas as $persona)
                                        @if ($calificacion->docente_id == $docente->id)
                                            <td>{{ $docente->id }} {{ $docente->persona->primer_nombre }}
                                                {{ $docente->persona->primer_apellido }}</td>
                                        @break
                                    @endif
                                @endforeach
                            @endforeach
                            @foreach ($actividades as $actividad)
                                @if ($calificacion->actividad_id == $actividad->id)
                                    <td>{{ $actividad->id }} {{ $actividad->nombre }}</td>
                                @break
                            @endif
                        @endforeach
                        <td>{{ $calificacion->promedio }}</td>
                        @can('create_calificaciones')
                            <td><a href="{{ route('calificaciones.edit', $calificacion->id) }}"
                                    class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>


                                </form>
                            @endcan




                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
</div>


@section('scripts')


@show
@endsection
