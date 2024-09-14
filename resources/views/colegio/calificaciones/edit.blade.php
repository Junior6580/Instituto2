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
                            <h4 class="card-title">Editar Calificación</h4>

                            <form action="{{ route('calificaciones.update', $calificacion->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="alumno_id">Alumno</label>
                                    <select name="alumno_id" id="alumno_id" class="form-control" required>
                                        <option value="" disabled selected>Selecciona un Alumno</option>
                                        @foreach ($alumnos as $alumno)
                                            <option value="{{ $alumno->id }}">{{ $alumno->persona->primer_nombre }}
                                                {{ $alumno->persona->primer_apellido }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="docente_id">Docente</label>
                                    <select name="docente_id" id="docente_id" class="form-control" required>
                                        <option value="" disabled selected>Selecciona un Docente</option>
                                        @foreach ($docentes as $docente)
                                            <option value="{{ $docente->id }}">{{ $docente->persona->primer_nombre }}
                                                {{ $docente->persona->primer_apellido }}</option>
                                        @endforeach
                                    </select>
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

                                <div class="form-group">
                                    <label for="nota1">Nota 1</label>
                                    <input type="number" name="nota1" id="nota1" class="form-control"
                                        value="{{ $calificacion->nota1 }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="nota2">Nota 2</label>
                                    <input type="number" name="nota2" id="nota2" class="form-control"
                                        value="{{ $calificacion->nota2 }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="nota3">Nota 3</label>
                                    <input type="number" name="nota3" id="nota3" class="form-control"
                                        value="{{ $calificacion->nota3 }}" required>
                                </div>



                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
