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
                    <div class="card-header">Usuarios Registrados</div>

                    <div class="card-body">
                        <table id="datatable" class="table table-sm table-striped">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>Id</th>
                                    <th>Subnombre</th>
                                    <th>Persona_id</th>
                                    <th>Nombres</th>
                                    <th>Correo</th>
                                    <th><a href="{{ route('crear') }}" class="btn btn-success btn-sm"><i
                                                class="fas fa-plus"></i></a></th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->subnombre }}</td>
                                        <td>{{ $user->persona_id }}</td>
                                        @foreach ($personas as $persona)
                                            @if ($user->persona_id == $persona->id)
                                                <td>{{ $persona->primer_nombre }} {{ $persona->primer_apellido }}</td>
                                            @break
                                        @endif
                                    @endforeach


                                    <td>{{ $user->email }}</td>
                                    <td><a href="{{ route('asignar_rol', $user) }}" class="btn btn-warning btn-sm"><i
                                                class="fa-brands fa-atlassian" style="color: #000000;"></i></a>
                                        <a href="" class="btn btn-info btn-sm"><i class="fa-solid fa-user-pen"
                                                style="color: #000000;"></i></a>
                                        <button class="btn btn-danger btn-sm" id="prueba" value=""><i
                                                class="fa-solid fa-trash-can" style="color: #000000;"></i></button>

                                    </td>
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
