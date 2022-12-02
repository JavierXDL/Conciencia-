@extends('layouts.estilos')

<link rel="icon" href="{{ asset('img/ecosur.png') }}">
<header>

    <style>
        nav.navbar {
            background-color: #26798E;
        }
    </style>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img class="" src="{{ asset('img/logo.png') }}" width="65" height=""
                    class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Acceder
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li class="nav-item">
                                @if (Route::has('login'))
                                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                        @auth
                                            <a href="{{ url('/home') }}" class="dropdown-item"
                                                style="color:black;">Home</a>
                                        @else
                                            <a href="{{ route('login') }}" class="dropdown-item"
                                                style="color:black;">Login</a>

                                            @if (Route::has('register'))
                                                <a href="{{ route('register') }}" class="dropdown-item"
                                                    style="color:black;"> Registrar</a>
                                            @endif
                                        @endauth
                                    </div>
                                @endif
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('articulos.create') }}">Subir articulo</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- BUSCADOR -->
                <form class="d-flex" action="{{ route('welcome') }}" method="GET">

                    <input type="search" class="form-control rounded me-2" name="search" id="search"
                        placeholder="Buscar" aria-label="Search" aria-describedby="search-addon" />
                    <button type="button" class="btn btn-outline-light" type="submit">Buscar</button>
                    <!--Fin del buscador-->
                </form>
            </div>

        </div>
        </div>
    </nav>
</header>
<main>
    @include('layouts.vista')
</main>
<br>
<div>
    <footer>
        @include('layouts.footer')
    </footer>

</div>
