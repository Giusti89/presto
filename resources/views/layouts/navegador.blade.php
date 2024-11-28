<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('dashboard')}}" class="nav-link">Inicio</a>
        </li>

        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('inicioPrestamos')}}" class="nav-link">Prestamos</a>
        </li>           

        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('ordepagoIndex')}}" class="nav-link"> Orden Pagos</a>
        </li>
    </ul>
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
