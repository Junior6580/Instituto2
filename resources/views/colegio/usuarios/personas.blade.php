@extends('layouts.app')
@php
    $pageTitle = 'Usuarios';
@endphp

@section('content')
<main class="py-4"></main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Personas Registradas</div>

                    <div class="card-body">
                        <table id="datatable" class="table table-sm table-striped">
                            <thead class="bg-danger text-white">
                                <tr>
                                    <th>Id</th>
                                    <th>Tipo De Documento</th>
                                    <th>Numero De Documento</th>
                                    <th>Primer Nombre</th>
                                    <th>Segundo Nombre</th>
                                    <th>Primer Apellido</th>
                                    <th>Segundo Apellido</th>
                                    <th>Fecha De Nacimiento</th>
                                    <th>Tipo De Sangre</th>
                                    <th>Genero</th>
                                    <th>Estrato SocioEconomico</th>
                                    <th>Estado Marital</th>
                                    <th>Eps_Id</th>
                                    <th>Dirección</th>
                                    <th>Ciudad</th>
                                    <th>Correo</th>
                                    <th>Telefono 1</th>
                                    <th>Telefono 2</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($personas as $persona)
                                    <tr>
                                        <td>{{ $persona->id }}</td>
                                        <td>{{ $persona->tipo_de_documento }}</td>
                                        <td>{{ $persona->numero_de_documento }}</td>
                                        <td>{{ $persona->primer_nombre }}</td>
                                        <td>{{ $persona->segundo_nombre }}</td>
                                        <td>{{ $persona->primer_apellido }}</td>
                                        <td>{{ $persona->segundo_apellido }}</td>
                                        <td>{{ $persona->fecha_de_nacimiento }}</td>
                                        <td>{{ $persona->tipo_de_sangre }}</td>
                                        <td>{{ $persona->genero }}</td>
                                        <td>{{ $persona->estrato_socioeconomico }}</td>
                                        <td>{{ $persona->estado_marital }}</td>
                                        <td>{{ $persona->eps_id }}</td>
                                        <td>{{ $persona->dirrecion }}</td>
                                        <td>{{ $persona->ciudad }}</td>
                                        <td>{{ $persona->correo }}</td>
                                        <td>{{ $persona->telefono_1 }}</td>
                                        <td>{{ $persona->telefono_2 }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@section('scripts')
@show

@section('dataTables')
@show
@endsection
