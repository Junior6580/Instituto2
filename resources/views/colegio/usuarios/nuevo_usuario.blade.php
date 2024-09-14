@extends('layouts.app')
@php
    $pageTitle = 'Nuevo Alumno';
@endphp
@section('content')
    <main class="py-4"></main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-warning">Nuevo Usuario</div>
                    <div class="card-body">
                        <form action="{{ route('crear') }}" method="POST">
                            @csrf

                            <label for="subnombre" class="form-label">SubNombre</label>
                            <input type="text" class="form-control" id="subnombre" name="subnombre" placeholder="Subnombre" required>
                            <br>
                            <label for="persona_id">Selecciona Persona Id:</label>
                            <select class="form-control" name="persona_id" id="persona_id">
                                <option value="">Selecciona Persona</option>
                                @foreach ($personas as $persona)
                                    <option value="{{ $persona->id }}">{{ $persona->primer_nombre }}
                                        {{ $persona->segundo_apellido }}</option>
                                @endforeach
                            </select><br>
                            <label for="email" class="form-label">Correo</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="email" required>
                            <br>
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="password" required>
                            <br>

                            <button class="btn btn-primary" name="agregar" type="submit">Agregar</button>
                            <a href="{{ route('mostrarpersonas') }}" class="btn btn-danger btn-xl">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
