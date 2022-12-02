<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap 5.0.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Ionicons -->
    <link href="//fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/css/@fortawesome/fontawesome-free/css/all.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/iziToast.min.css') }}">
    <link href="{{ asset('assets/css/sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="icon" href="{{ asset('img/ecosur.png') }}">
    <title>Conciencia+</title>

</head>

<body>
    <style>
        nav.navbar {
            background-color: #26798E;
        }
    </style>
    <div class="">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <img class="" src="{{ asset('img/logo.png') }}" width="65" height=""
                        class="d-inline-block align-text-top">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav navbar-right">
                        @if (\Illuminate\Support\Facades\Auth::user())
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown"
                                    class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                    {{-- <img alt="image" src="{{ asset('img/logo.png') }}"
                                        class="rounded-circle mr-1 thumbnail-rounded user-thumbnail "> --}}
                                    <div class="d-sm-none d-lg-inline-block">
                                        Hola, {{ \Illuminate\Support\Facades\Auth::user()->name }}</div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-title">
                                        Bienvenido, {{ \Illuminate\Support\Facades\Auth::user()->name }}</div>
                                    {{-- <a class="dropdown-item has-icon edit-profile" href="#"
                                        data-id="{{ \Auth::id() }}">
                                        <i class="fa fa-user"></i>Editar perfil</a>
                                        <a class="dropdown-item has-icon" data-toggle="modal"
                                        data-target="#changePasswordModal" href="#"
                                        data-id="{{ \Auth::id() }}"><i class="fa fa-lock"> </i>Cambiar
                                        contraseña</a> --}}
                                    <a href="{{ url('logout') }}" class="dropdown-item has-icon text-danger"
                                        onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                                    </a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                        @else
                        @endif
                        @can('ver-usuario')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('usuarios.index') }}">Usuarios</a>
                            </li>
                        @endcan
                        @can('ver-rol')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('roles.index') }}">Roles</a>
                            </li>
                        @endcan
                        @can('ver-articulo')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Artículos
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @can('borrar-articulo')
                                        <li>
                                            <a class="dropdown-item" href="{{ route('articulos.index') }}">Artículos
                                                aprobados</a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('nuevos.index') }}">Artículos nuevos</a>
                                        </li>
                                    @endcan
                                    <li>
                                        <a class="dropdown-item" href="{{ route('revision.index') }}">Artículos en
                                            revisión</a>
                                    </li>
                                </ul>
                            </li>
                        @endcan
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('articulos.create') }}">Subir articulo</a>
                        </li>
                        @can('ver-articulo')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('supervisor.index') }}">Revisar</a>
                            </li>
                        @endcan
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('publicacion.index') }}">Mis publicaciones</a>
                        </li>
                    </ul>
                    <!-- BUSCADOR -->
                    <style>
                    </style>
                    <form class="d-flex" action="{{ route('home') }}" method="GET">
                        <input alignt="right" type="search" class="form-control rounded me-2" name="search"
                            id="search" placeholder="Buscar" aria-label="Search"
                            aria-describedby="search-addon" />
                        <button type="button" class="btn btn-outline-light" type="submit">Buscar</button>
                        <!--Fin del buscador-->
                    </form>
                </div>
            </div>
        </nav>
    </div>
    <br>
    <main>

        <div class="container">
            {{-- Main content --}}
            @yield('content')
        </div>
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/js/iziToast.min.js') }}"></script>
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>

<!-- Template JS File -->
<script src="{{ asset('web/js/stisla.js') }}"></script>
<script src="{{ asset('web/js/scripts.js') }}"></script>
<script src="{{ mix('assets/js/profile.js') }}"></script>
<script src="{{ mix('assets/js/custom/custom.js') }}"></script>

<script>
    let loggedInUser = @json(\Illuminate\Support\Facades\Auth::user());
    let loginUrl = '{{ route('login') }}';
    const userUrl = '{{ url('users') }}';
    // Loading button plugin (removed from BS4)
    (function($) {
        $.fn.button = function(action) {
            if (action === 'loading' && this.data('loading-text')) {
                this.data('original-text', this.html()).html(this.data('loading-text')).prop('disabled', true);
            }
            if (action === 'reset' && this.data('original-text')) {
                this.html(this.data('original-text')).prop('disabled', false);
            }
        };
    }(jQuery));
</script>

</html>
