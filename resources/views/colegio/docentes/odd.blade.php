@extends('layouts.app')
@php
    $pageTitle = 'Nuevo Docente';
@endphp
@section('content')
    <div id="docentes" class="background">
        <main class="py-4"></main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <div id="doce" class="card-header">Agregar Docentes</div>
                        <div class="card-body">
                            <form action="{{ route('getdocenteodd') }}" method="POST">
                                @csrf

                                <label for="persona_id">Selecciona Persona Id:</label>
                                <select class="form-control" name="persona_id" id="persona_id" required>
                                    <option value="">Seleccione Persona Id:</option>
                                    @foreach ($personas as $persona)
                                        <option value="{{ $persona->id }}">{{ $persona->primer_nombre }}
                                            {{ $persona->primer_apellido }}</option>
                                    @endforeach
                                </select><br>
                                <label for="jornada_id">Selecciona Jornada Id:</label>
                                <select class="form-control" name="jornada_id" id="jornada_id" required>
                                    <option value="">Seleccione Jornada Id:</option>
                                    @foreach ($jornadas as $jornada)
                                        <option value="{{ $jornada->id }}">{{ $jornada->nombre }}
                                        </option>
                                    @endforeach
                                </select><br>

                                <button class="btn btn-primary" name="agregar" type="submit">Agregar</button>
                                <a href="{{ route('mostrardocentes') }}" class="btn btn-danger btn-xl">Cancelar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
