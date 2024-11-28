<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Botón de colapso (si lo necesitas para el pushmenu en AdminLTE) -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>
    </ul>

    <!-- Menú para pantallas grandes -->
    <ul class="navbar-nav d-none d-sm-flex">
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link">Inicio</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('inicioPrestamos') }}" class="nav-link">Préstamos</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('ordepagoIndex') }}" class="nav-link">Orden Pagos</a>
        </li>
    </ul>

    <!-- Menú desplegable para pantallas pequeñas -->
    <ul class="navbar-nav d-block d-sm-none">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                Menú
            </a>
            <div class="dropdown-menu">
                <a href="{{ route('dashboard') }}" class="dropdown-item">Inicio</a>
                <a href="{{ route('inicioPrestamos') }}" class="dropdown-item">Préstamos</a>
                <a href="{{ route('ordepagoIndex') }}" class="dropdown-item">Orden Pagos</a>
            </div>
        </li>
    </ul>

    <!-- Botón de cerrar sesión -->
    <ul class="navbar-nav ml-auto">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-dropdown-link :href="route('logout')"
                onclick="event.preventDefault();
                              this.closest('form').submit();">
                {{ __('Cerrar sesión') }}
            </x-dropdown-link>
        </form>
    </ul>
</nav>


