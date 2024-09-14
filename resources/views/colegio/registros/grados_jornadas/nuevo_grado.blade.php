@extends('layouts.app')
@php
    $pageTitle = 'Nueva Grado';
@endphp
@section('content')
    <main class="py-4"></main>
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row justify-content-center">
                <div class="col-lg-4 grid-margin stretch-card">
                    <!--form mask starts-->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Registrar Grado</h4>
                            <form action="{{ route('grado_nuevo') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input class="form-control" type="text" name="nombre" required>
                                </div>

                                <button class="btn btn-primary" id="mi-boton" type="submit">Agregar</button>
                                <a href="{{ route('grados') }}" class="btn btn-danger btn-xl">Cancelar</a>
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
