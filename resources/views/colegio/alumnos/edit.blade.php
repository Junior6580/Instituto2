@extends('layouts.app')
@php
    $pageTitle = 'Editar Alumno';
@endphp
@section('content')
    <main class="py-4"></main>
    @if (session('modificado'))
        <div class="alert alert-success">{{ session('modificado') }}</div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-warning">Editar Alumnos</div>
                    <div class="card-body">

                        <form action="{{ route('postalumnoedit', $alumno->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <label for="persona_id">Persona:</label>
                            <select class="form-control" name="persona_id" id="persona_id" required>
                                @foreach ($personas as $persona)
                                    <option value="{{ $persona->id }}" @if ($persona->id === $alumno->persona_id) selected @endif>
                                        {{ $persona->primer_nombre }} {{ $persona->primer_apellido }}</option>
                                @endforeach
                            </select>

                            <label for="grado_id">Grado:</label>
                            <select class="form-control" name="grado_id" id="grado_id" required>
                                @foreach ($grados as $grado)
                                    <option value="{{ $grado->id }}" @if ($grado->id === $alumno->grado_id) selected @endif>
                                        {{ $grado->nombre }}</option>
                                @endforeach
                            </select>

                            <label for="jornada_id">Jornada:</label>
                            <select class="form-control" name="jornada_id" id="jornada_id" required>
                                @foreach ($jornadas as $jornada)
                                    <option value="{{ $jornada->id }}" @if ($jornada->id === $alumno->jornada_id) selected @endif>
                                        {{ $jornada->nombre }}</option>
                                @endforeach
                            </select><br>


                            <button class="btn btn-primary" name="agregar" type="submit">Modificar</button>
                            <a href="{{ route('mostraralumnos') }}" class="btn btn-danger btn-xl">Cancelar</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
