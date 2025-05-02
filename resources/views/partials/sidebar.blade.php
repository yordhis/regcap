@php
    $url = explode('/', $_SERVER['REQUEST_URI']);
    $categoria = strtoupper($url[1]);
    if (isset($url[2])) {
        $subcategoria = strtoupper($url[2]);
    } else {
        $subcategoria = 'LISTA';
    }
@endphp

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <!----------------------------------------- MENU ROOT Y ADMINISTRADOR ------------------------------------------------------->
        @if (Auth::user()->rol == 1 || Auth::user()->rol == 2)
            <!-- Start Components Nav | Panel -->
            <li class="nav-item">
                <a class="nav-link {{ url()->current() == route('admin.panel.index') ? 'bg-primary text-white' : 'collapsed' }} "
                    href="{{ route('admin.panel.index') }}">
                    <i class="bi bi-grid"></i>
                    <span>Panel</span>
                </a>
            </li><!-- End Dashboard Nav | Panel-->

            <!-- Start Components Nav | Registros -->
            <li class="nav-item">
                <a class="nav-link {{ url()->current() == route('admin.person.index') ? 'bg-primary text-white' : 'collapsed' }} "
                    href="{{ route('admin.person.index') }}">
                    <i class="bi bi-grid"></i>
                    <span>Registros</span>
                </a>
            </li><!-- End Dashboard Nav | Panel-->



            <!-- Start Components Nav | Reportes -->
            <li class="nav-item">
                <a class="nav-link {{ url()->current() == route('admin.reportes.index') ? 'bg-primary text-white' : 'collapsed' }} "
                    href="{{ route('admin.reportes.index') }}">
                    <i class="bi bi-grid"></i>
                    <span>Reportes</span>
                </a>
            </li><!-- End Dashboard Nav | Reportes-->

            <!-- Start Components Nav | configuraciones -->
            <li class="nav-item">
                <a class="nav-link {{ url()->current() == route('admin.users.index') ? 'collapse show' : 'collapsed' }}"
                    data-bs-target="#components-nav-10" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-gear"></i><span>Configuración</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav-10"
                    class="nav-content {{ url()->current() == route('admin.users.index') || url()->current() == route('admin.users.create') ? 'collapse show' : 'collapse' }} "
                    data-bs-parent=" #sidebar-nav">

                    <!-- Start Components Nav | usuarios -->
                    <li class="nav-item">
                        <a class="nav-link {{ url()->current() == route('admin.users.index') || url()->current() == route('admin.users.create') ? 'collapse show' : 'collapsed' }}"
                            data-bs-target="#components-nav-1" data-bs-toggle="collapse" href="#">
                            <i class="bi bi-shield-lock fs-3"></i><span>Usuarios</span><i
                                class="bi bi-chevron-down ms-auto"></i>
                        </a>
                        <ul id="components-nav-1"
                            class="nav-content {{ url()->current() == route('admin.users.index') || url()->current() == route('admin.users.create') ? 'collapse show' : 'collapse' }} "
                            data-bs-parent=" #sidebar-nav-1">
                            <li>
                                <a class="nav-link {{ url()->current() == route('admin.users.index') ? 'bg-primary text-white' : '' }}"
                                    href="{{ route('admin.users.index') }}">
                                    <i class="bi bi-circle"></i><span>Lista</span>
                                </a>
                            </li>
                            <li>
                                <a class="nav-link {{ url()->current() == route('admin.users.create') ? 'bg-primary text-white' : '' }}"
                                    href="{{ route('admin.users.create') }}">
                                    <i class="bi bi-circle"></i><span>Crear</span>
                                </a>
                            </li>

                        </ul>
                    </li><!-- End Components Nav | usuarios -->

                </ul>
            </li><!-- End Components Nav | configuraciones -->

            <!----------------------------------------- MENU USUARIO ------------------------------------------------------->
        @elseif(Auth::user()->rol == 3)
            <!-- Start Components Nav | Panel -->
            <li class="nav-item">
                <a class="nav-link {{ url()->current() == route('admin.panel.index') ? 'bg-primary text-white' : 'collapsed' }} "
                    href="{{ route('admin.panel.index') }}">
                    <i class="bi bi-grid"></i>
                    <span>Panel</span>
                </a>
            </li><!-- End Dashboard Nav | Panel-->

            <!-- Start Components Nav | Registros -->
            <li class="nav-item">
                <a class="nav-link {{ url()->current() == route('admin.person.index') ? 'bg-primary text-white' : 'collapsed' }} "
                    href="{{ route('admin.person.index') }}">
                    <i class="bi bi-grid"></i>
                    <span>Registros</span>
                </a>
            </li><!-- End Dashboard Nav | Panel-->


            <!-- Start Components Nav | Reportes -->
            <li class="nav-item">
                <a class="nav-link {{ url()->current() == route('admin.reportes.index') ? 'bg-primary text-white' : 'collapsed' }} "
                    href="{{ route('admin.reportes.index') }}">
                    <i class="bi bi-grid"></i>
                    <span>Reportes</span>
                </a>
            </li><!-- End Dashboard Nav | Reportes-->
        @endif

    </ul>


</aside><!-- End Sidebar -->
