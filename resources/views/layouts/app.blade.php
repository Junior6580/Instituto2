<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{ isset($pageTitle) ? $pageTitle : config('app.name', 'Laravel') }}</title>

    @yield('css')
    @include('layouts.css')
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-light shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}"><i class="fa-solid fa-graduation-cap  fa-sm"
                    style="color: #000000;">
                    Escuela Cultural
                </i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"><i
                                        class="fa-sharp fa-solid fa-right-to-bracket fa-xs"
                                        style="color: #000000;">{{ __(' Login') }}</i></a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}"><i class="fa-solid fa-house fa-xs"
                                    style="color: #000000;">{{ __(' Inicio') }}</i></a>
                        </li>
                        @can('alumnos')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('mostraralumnos') }}"><i
                                        class="fa-sharp fa-solid fa-school fa-xs"
                                        style="color: #000000;">{{ __(' Alumnos') }}</i></a>
                            </li>
                        @endcan
                        @can('docentes')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('mostrardocentes') }}"><i
                                        class="fa-solid fa-chalkboard-user fa-xs"
                                        style="color: #000000;">{{ __(' Docentes') }}</i></a>
                            </li>
                        @endcan
                        @can('calificaciones')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('mostrarcalificaciones') }}"><i
                                        class="fa-sharp fa-solid fa-arrow-down-1-9 fa-xs"
                                        style="color: #000000;">{{ __(' Calificaciones') }}</i></a>
                            </li>
                        @endcan
                        @can('mostrarhorarios')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('mostrarhorarios') }}"><i
                                        class="fa-sharp fa-solid fa-clock  fa-xs"
                                        style="color: #000000;">{{ __(' Horarios') }}</i></a>
                            </li>
                        @endcan
                        @can('usuarios')
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa-solid fa-puzzle-piece fa-xs" style="color: #04070c;">
                                        Registros
                                    </i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('materias') }}">
                                        <i class="fa-solid fa-book-journal-whills fa-xs" style="color: #000000;"> Materias</i>
                                    </a>
                                    <a class="dropdown-item" href="{{ route('mostrar_jornadas') }}">
                                        <i class="fa-solid fa-stopwatch-20 fa-xs" style="color: #06090f;"> Jornadas</i></a>

                                    <a class="dropdown-item" href="{{ route('grados') }}">
                                        <i class="fa-solid fa-arrow-down-1-9 fa-xs" style="color: #04070c;"> Grados</i></a>

                                    <a class="dropdown-item" href="{{ route('mostrar_actividades') }}">
                                        <i class="fa-solid fa-chart-line fa-xs" style="color: #000000;"> Actividades</i></a>

                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa-solid fa-user-tie fa-xs" style="color: #000000;">
                                        Perfiles
                                    </i>
                                </a>


                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('mostrarpersonas') }}">
                                        <i class="fa-solid fa-user fa-xs" style="color: #000000;"> Usuarios</i>
                                    </a>
                                    <a class="dropdown-item" href="{{ route('personas') }}">
                                        <i class="fa-solid fa-person fa-xs" style="color: #000000;"> Personas</i></a>


                                </div>
                            </li>
                        @endcan
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fa-solid fa-user-tie fa-xs"
                                    style="color: #000000;">{{ Auth::user()->subnombre }}</i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fa-solid fa-right-from-bracket fa-xs"
                                        style="color: #000000;">{{ __(' Cerrar SesiÓn') }}</i>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')

    @include('layouts.js')
    @section('scripts')
    @show
</body>

</html>
