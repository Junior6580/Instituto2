@extends('layouts.app')

@section('content')
    <main class="py-4"></main>
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row justify-content-center">
                <div class="col-lg-4 grid-margin stretch-card">
                    <!--form mask starts-->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Registrar Calificación</h4>
                            <p class="card-description">Ingresar calificaciones de los alumnos</p>
                            <form action="{{ route('calificaciones.store') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <div class="col">
                                        <label for="alumno_id">Alumno</label>
                                        <select name="alumno_id" id="alumno_id" class="form-control" required>
                                            <option value="" disabled selected>Seleccionar Alumno</option>
                                            @foreach ($alumnos as $alumno)
                                                <option value="{{ $alumno->id }}">{{ $alumno->persona->primer_nombre }}
                                                    {{ $alumno->persona->primer_apellido }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="docente_id">Docente</label>
                                        <select name="docente_id" id="docente_id" class="form-control" required>
                                            <option value="" disabled selected>Seleccionar Docente</option>
                                            @foreach ($docentes as $docente)
                                                <option value="{{ $docente->id }}">{{ $docente->persona->primer_nombre }}
                                                    {{ $docente->persona->primer_apellido }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="actividad_id">Actividad</label>
                                    <select name="actividad_id" id="actividad_id" class="form-control" required>
                                        <option value="" disabled selected>Selecciona una Actividad</option>
                                        @foreach ($actividades as $actividad)
                                            <option value="{{ $actividad->id }}">{{ $actividad->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <label for="nota1">Nota 1</label>
                                        <input type="number" name="nota1" id="nota1" class="form-control" required>
                                    </div>
                                    <div class="col">
                                        <label for="nota2">Nota 2</label>
                                        <input type="number" name="nota2" id="nota2" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group>
                                            <div class="col">
                                    <label for="nota3">Nota 3</label>
                                    <input type="number" name="nota3" id="nota3" class="form-control" required>
                                </div><br>

                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a href="{{ route('mostrarcalificaciones') }}" class="btn btn-danger btn-xl">Cancelar</a>

                            </form>
                        </div>
                    </div>
                    <!--form mask ends-->
                </div>

            </div>
        </div>
        <!--form mask ends-->
    </div>
@endsection
