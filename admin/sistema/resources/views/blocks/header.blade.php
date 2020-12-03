@php
$Profile = Auth::user();
@endphp
<nav class="navbar ms-navbar">
    <div class="ms-aside-toggler ms-toggler pl-0" data-target="#ms-side-nav" data-toggle="slideLeft">
        <span class="ms-toggler-bar"></span>
        <span class="ms-toggler-bar"></span>
        <span class="ms-toggler-bar"></span>
    </div>
    <div class="logo-sn logo-sm ms-d-block-sm">
        <a class="pl-0 ml-0 text-center navbar-brand mr-0" href="{{ route('dashboard') }}">
            <img src="{{ asset('assets/img/logo-84x41.png') }}" alt="MDCN">
        </a>
    </div>
    <ul class="ms-nav-list ms-inline mb-0" id="ms-nav-options">
        <li class="ms-nav-item ms-nav-user dropdown">
            <a href="#" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="ms-user-img ms-img-round float-right" src="{{ asset('assets/img/customer.jpg') }}" alt="">
            </a>
            <ul class="dropdown-menu dropdown-menu-right user-dropdown" aria-labelledby="userDropdown">
                <li class="dropdown-menu-header">
                    <h6 class="dropdown-header ms-inline m-0"><span class="text-disabled">Bienvenido, {{ $Profile->name }}</span></h6>
                </li>
                <li class="dropdown-divider"></li>
                <li class="ms-dropdown-list">
                    <a class="media fs-14 p-2" href="{{ route('dashboard-profile') }}"><span><i class="fas fa-user mr-2"></i>Mi Perfil</span></a>
                </li>
                <li class="dropdown-divider"></li>
                <li class="dropdown-menu-footer">
                    <a class="media fs-14 p-2" href="{{ route('dashboard-logout') }}"><span><i class="fas fa-sign-in-alt mr-2"></i>Cerrar Sesión</span></a>
                </li>
            </ul>
        </li>
    </ul>
</nav>