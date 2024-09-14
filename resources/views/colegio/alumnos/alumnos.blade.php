@extends('layouts.app')
@php
    $pageTitle = 'Alumnos';
@endphp
@section('css')
@show

@section('content')
    <div class="custom">
        <main class="py-4"></main>
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h6 class="card-title">Promedios</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="areaChart"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section><br>
        <div class="container">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">Alumnos</div>

                            <div class="card-body">
                                <table id="datatable" class="table table-sm table-striped">
                                    <thead class="bg-danger text-white">
                                        <tr>
                                            <th>Id</th>
                                            <th>Persona Id</th>
                                            <th>Grado Id</th>
                                            <th>Jornada</th>
                                            @can('getalumnoadd')
                                                <th style="width: 200px;"><a href="{{ route('colegio.alumno.add') }}"
                                                        class="btn btn-success btn-sm"><i class="fa-solid fa-circle-plus"
                                                            style="color: #050505;"></i></a></th>
                                            @endcan
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($alumnos as $alumno)
                                            <tr>
                                                <td>{{ $alumno->id }}</td>
                                                @foreach ($personas as $persona)
                                                    @if ($alumno->persona_id == $persona->id)
                                                        <td>{{ $alumno->persona_id }} {{ $persona->primer_nombre }}
                                                            {{ $persona->primer_apellido }}</td>
                                                    @break
                                                @endif
                                            @endforeach
                                            @foreach ($grados as $grado)
                                                @if ($alumno->grado_id == $grado->id)
                                                    <td>{{ $alumno->grado_id }} {{ $grado->nombre }}</td>
                                                @break
                                            @endif
                                        @endforeach
                                        @foreach ($jornadas as $jornada)
                                            @if ($alumno->jornada_id == $jornada->id)
                                                <td>{{ $alumno->jornada_id }} {{ $jornada->nombre }}</td>
                                            @break
                                        @endif
                                    @endforeach

                                    @can('getalumnoadd')
                                        <form action="{{ route('colegio.alumno.delete', $alumno->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <td><a href="{{ route('colegio.alumno.edit', $alumno->id) }}"
                                                    class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>


                                                <button class="btn btn-danger btn-sm" type="submit"
                                                    onclick="return confirm('¿Estás seguro de que deseas eliminar esta alumno?')"><i
                                                        class="fa-solid fa-trash-can"
                                                        style="color: #000000;"></i></button>
                                        </form>
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
</div>
</div>
</div>





@section('scripts')

<script>
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    var areaChartData = {
        labels: @json($nombresAlumnos),

        datasets: [{
            label: 'Promedio de alumnos',
            backgroundColor: 'rgba(52, 152, 219 )',
            borderColor: 'rgba(84, 153, 199)',
            pointRadius: true,
            pointColor: '#3b8bba',
            pointStrokeColor: 'rgba(60,141,188,1)',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data: @json($promedios)
        }, ]
    }

    var areaChartOptions = {
        maintainAspectRatio: false,
        responsive: true,
        legend: {
            display: true
        },
        scales: {
            xAxes: [{
                gridLines: {
                    display: true,
                }
            }],
            yAxes: [{
                gridLines: {
                    display: true,
                }
            }]
        }
    }

    // This will get the first returned node in the jQuery collection.
    new Chart(areaChartCanvas, {
        type: 'line',
        data: areaChartData,
        options: areaChartOptions
    })
</script>

@show

@section('dataTables')
@show
@endsection
