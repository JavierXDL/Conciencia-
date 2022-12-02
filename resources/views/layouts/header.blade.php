<style>
    nav.navbar {
        background-color: #26798E;
    }
</style>
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
            <ul class="navbar-nav navbar-right">
                @if (\Illuminate\Support\Facades\Auth::user())
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="{{ asset('img/logo.png') }}"
                                class="rounded-circle mr-1 thumbnail-rounded user-thumbnail ">
                            <div class="d-sm-none d-lg-inline-block">
                                Hola, {{ \Illuminate\Support\Facades\Auth::user()->first_name }}</div>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title">
                                Bienvenido, {{ \Illuminate\Support\Facades\Auth::user()->name }}</div>
                            <a class="dropdown-item has-icon edit-profile" href="#" data-id="{{ \Auth::id() }}">
                                <i class="fa fa-user"></i>Editar perfil</a>
                            <a class="dropdown-item has-icon" data-toggle="modal" data-target="#changePasswordModal"
                                href="#" data-id="{{ \Auth::id() }}"><i class="fa fa-lock"> </i>Cambiar
                                contraseña</a>
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
            </ul>
        </div>
    </div>

