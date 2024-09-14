@extends('layouts.app')
@php
    $pageTitle = 'Inicio';
@endphp

@section('content')
    <div id="home" class="jumbotron">
        <div class="container">

            <h1 class="display-4">WELCOME</h1>
            <p class="lead">Que Deseas Hacer?</p>
        </div>

    </div>
    <br>
    @can('usuarios')
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card" style="width: 12rem;">
                        <img src="{{ asset('img/estudiantes.jpg') }}" class="card-img-top" alt="..." height="220">
                        <div class="card-body">
                            <p class="text-center"><strong>Registrar Alumnos</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="width: 12rem;">
                        <img src="{{ asset('img/grupos.jpg') }}" class="card-img-top" alt="..." height="220">
                        <div class="card-body">
                            <p class="text-center"><strong>Administrar Grupos</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="width: 12rem;">
                        <img src="{{ asset('img/boletines.jpg') }}" class="card-img-top" alt="..." height="220">
                        <div class="card-body">
                            <p class="text-center"><strong>Boletines</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="width: 12rem;">
                        <img src="{{ asset('img/materias.jpg') }}" class="card-img-top" alt="..." height="220">
                        <div class="card-body">
                            <p class="text-center"><strong>Registrar Materias</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="width: 12rem;">
                        <img src="{{ asset('img/docentes.jpg') }}" class="card-img-top" alt="..." height="220">
                        <div class="card-body">
                            <p class="text-center"><strong>Administrar Docentes</strong></p>
                        </div>
                    </div>
                </div>
            </div><br>
            <div class="row">
                <div class="col">
                    <div class="card" style="width: 12rem;">
                        <img src="{{ asset('img/grafico.jpg') }}" class="card-img-top" alt="..." height="220">
                        <div class="card-body">
                            <p class="text-center"><strong>Gráficos De Crecimiento</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="width: 12rem;">
                        <img src="{{ asset('img/horarios.jpg') }}" class="card-img-top" alt="..." height="220">
                        <div class="card-body">
                            <p class="text-center"><strong>Horarios De Clase</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="width: 12rem;">
                        <img src="{{ asset('img/7502.jpg') }}" class="card-img-top" alt="..." height="220">
                        <div class="card-body">
                            <p class="text-center"><strong>Registrar Calificaciones</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="width: 12rem;">
                        <img src="{{ asset('img/md.jpg') }}" class="card-img-top" alt="..." height="220">
                        <div class="card-body">
                            <p class="text-center"><strong>Materias De Docentes</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="width: 12rem;">
                        <img src="{{ asset('img/imprimir.jpg') }}" class="card-img-top" alt="..." height="220">
                        <div class="card-body">
                            <p class="text-center"><strong>Imprimir Horarios</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div><br>
        <footer class="footer">

            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2023 Copyright:
                <a class="text-dark" href="{{ route('home') }}">EscuadronS74.com</a>
            </div>
        </footer>
    @endcan
@endsection
