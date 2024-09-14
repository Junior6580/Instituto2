@extends('layouts.app')
@php
    $pageTitle = 'Materias';
@endphp
@section('css')
@show
@section('content')
        <main class="py-4"></main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4><strong>Registrar Materia</strong></h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('nueva_materia') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input class="form-control" type="text" name="nombre" required>
                                </div>

                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <input class="form-control" type="text" name="descripcion" required>
                                </div>

                                <label for="docente_id">Selecciona Docente Id:</label>
                                <select class="form-control" name="docente_id" id="docente_id" required>
                                    <option value="">Seleccionar docente</option>
                                    @foreach ($docentes as $docente)
                                            <option value="{{ $docente->id }}">{{ $docente->persona->primer_nombre}}</option>

                                    @endforeach
                                </select><br>
                                <button class="btn btn-primary" id="mi-boton" type="submit">Agregar</button>
                                <a href="{{ route('materias') }}" class="btn btn-danger btn-xl">Cancelar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
@show
