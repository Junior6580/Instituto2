@extends('layouts.app')
@php
    $pageTitle = 'Grados';
@endphp

@section('content')
    <main class="py-4"></main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Gados</div>

                    <div class="card-body">
                        <table id="datatable" class="table table-sm table-striped">
                            <thead class="bg-danger text-white">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th><a href="{{ route('nuevo_grado') }}" class="btn btn-success btn-sm"><i
                                                    class="fas fa-plus"></i></a></th>
                                    </tr>
                                </thead>
                            <tbody>
                                @foreach ($grados as $grado)
                                    <tr>
                                        <td>{{ $grado->id }}</td>
                                        <td>{{ $grado->nombre }}</td>
                                        <td> </td>
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
