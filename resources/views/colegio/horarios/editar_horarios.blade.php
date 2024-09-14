@extends('layouts.app')
@php
    $pageTitle = 'Editar Horario';
@endphp
@section('content')
    <main class="py-4"></main>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-warning">Editar Horarios</div>
                    <div class="card-body">

                        <form action="{{ route('horario_editado', $horario->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <label for="dia_de_la_semana">Día:</label>
                            <select class="form-control" name="dia_de_la_semana" id="dia_de_la_semana" required>
                                <option value="Lunes" {{ $horario->dia_de_la_semana == 'Lunes' ? 'selected' : '' }}>Lunes
                                </option>
                                <option value="Martes" {{ $horario->dia_de_la_semana == 'Martes' ? 'selected' : '' }}>Martes
                                </option>
                                <option value="Miercoles" {{ $horario->dia_de_la_semana == 'Miercoles' ? 'selected' : '' }}>
                                    Miercoles</option>
                                <option value="Jueves" {{ $horario->dia_de_la_semana == 'Jueves' ? 'selected' : '' }}>Jueves
                                </option>
                                <option value="Viernes" {{ $horario->dia_de_la_semana == 'Viernes' ? 'selected' : '' }}>
                                    Viernes</option>

                            </select>

                            <label for="hora_inicio">Hora de inicio:</label>
                            <input class="form-control" type="time" name="hora_inicio" id="hora_inicio"
                                value="{{ $horario->hora_inicio }}" required>

                            <label for="hora_fin">Hora de fin:</label>
                            <input class="form-control" type="time" name="hora_fin" id="hora_fin"
                                value="{{ $horario->hora_fin }}" required>

                            <label for="materia_id">Materia:</label>
                            <select class="form-control" name="materia_id" id="materia_id" required>
                                @foreach ($materias as $materia)
                                    <option value="{{ $materia->id }}"
                                        {{ $horario->materia_id == $materia->id ? 'selected' : '' }}>
                                        {{ $materia->nombre }}
                                    </option>
                                @endforeach
                            </select>

                            <label for="grado_id">Grado:</label>
                            <select class="form-control" name="grado_id" id="grado_id" required>
                                @foreach ($grados as $grado)
                                    <option value="{{ $grado->id }}"
                                        {{ $horario->grado_id == $grado->id ? 'selected' : '' }}>
                                        {{ $grado->nombre }}
                                    </option>
                                @endforeach
                            </select><br>

                            <button class="btn btn-primary" name="agregar" type="submit">Modificar</button>
                            <a href="{{ route('mostrarhorarios') }}" class="btn btn-danger btn-xl">Cancelar</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
