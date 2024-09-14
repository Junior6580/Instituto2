@extends('layouts.app')
@php
    $pageTitle = 'Actividades';
@endphp
@section('css')
@show

@section('content')
    <main class="py-4"></main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Actividades</div>

                    <div class="card-body">
                        <table id="datatable" class="table table-sm table-striped">
                            <thead class="bg-danger text-white">
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    @can('nueva_actividad')
                                        <th><a href="{{ route('nueva_actividad') }}" class="btn btn-success btn-sm"><i
                                                    class="fa-solid fa-circle-plus" style="color: #050505;"></i></a></th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($actividades as $actividad)
                                    <tr>
                                        <td>{{ $actividad->id }}</td>
                                        <td>{{ $actividad->nombre }}</td>
                                        @can('nueva_actividad')
                                            <td>
                                            </td>
                                        @endcan
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
