@extends('layouts.app')
@php
    $pageTitle = 'Jornadas';
@endphp
@section('css')
@show

@section('content')
    <div id="docentes" class="background">
        <main class="py-4"></main>
        @if (session('agregado'))
            <div class="alert alert-success">{{ session('agregado') }}</div>
        @endif

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div id="borde_docente" class="card">
                        <div id="docentet" class="card-header">Jornadas</div>

                        <div class="card-body">
                            <table id="datatable" class="table table-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th><a href="{{ route('nueva_jornada') }}" class="btn btn-success btn-sm"><i
                                                    class="fas fa-plus"></i></a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jornadas as $jornada)
                                        <tr>
                                            <td>{{ $jornada->id }}</td>
                                            <td>{{ $jornada->nombre }}</td>
                                            <td></td>
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
