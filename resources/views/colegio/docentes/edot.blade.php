@extends('layouts.app')
@php
    $pageTitle = 'Editar Docente';
@endphp
@section('content')
    <div id="docentes" class="background">
        <main class="py-4"></main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <div id="doce" class="card-header">Editar Docentes</div>
                        <div class="card-body">

                            <form action="{{ route('postdocenteedot', $docente->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <label for="persona_id">Persona:</label>
                                <select class="form-control" name="persona_id" id="persona_id" required>
                                    @foreach ($personas as $persona)
                                        <option value="{{ $persona->id }}"
                                            @if ($persona->id === $docente->persona_id) selected @endif>
                                            {{ $persona->primer_nombre }} {{ $persona->primer_apellido }}</option>
                                    @endforeach
                                </select>
                                <label for="jornada_id">Jornada:</label>
                                <select class="form-control" name="jornada_id" id="jornada_id" required>
                                    @foreach ($jornadas as $jornada)
                                        <option value="{{ $jornada->id }}"
                                            @if ($jornada->id === $docente->jornada_id) selected @endif>
                                            {{ $jornada->nombre }}</option>
                                    @endforeach
                                </select><br>


                                <button class="btn btn-primary" name="agregar" type="submit">Modificar</button>
                                <a href="{{ route('mostrardocentes') }}" class="btn btn-danger btn-xl">Cancelar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
