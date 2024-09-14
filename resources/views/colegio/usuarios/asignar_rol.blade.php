@extends('layouts.app')
@php
    $pageTitle = 'Asignar Rol';
@endphp

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <main class="py-4"></main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-warning">Rol</div>
                    <div class="card-body">
                        <p class="h5">Nombre:</p>

                        <p class="form-control">
                            {{ $user->persona->primer_nombre }} {{ $user->persona->primer_apellido }}
                        </p>

                        <h2 class="h5">Listado roles</h2>

                        {!! Form::model($user, ['route' => ['rol_asignado', $user], 'method' => 'put']) !!}
                        @foreach ($roles as $role)
                            <div>
                                <label>
                                    {!! Form::radio('selected_role', $role->id, $user->hasRole($role->name), ['class' => 'mr-1']) !!}
                                    {{ $role->name }}
                                </label>
                            </div>
                        @endforeach
                        {!! Form::submit('Asignar rol', ['class' => 'btn btn-primary mt-2']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
