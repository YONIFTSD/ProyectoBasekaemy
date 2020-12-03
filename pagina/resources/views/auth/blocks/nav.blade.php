<div class="dashboard_tab_button">
    <ul role="tablist" class="nav flex-column dashboard-list">
        <li><a href="{{ url('my-account') }}" class="nav-link {{ (request()->is('my-account')) ? 'active' : '' }}">Dashboard</a></li>
        <li><a href="{{ url('my-account/orders') }}" class="nav-link {{ (request()->is('my-account/orders')) ? 'active' : '' }}">Pedidos</a></li>
        <li><a href="{{ url('my-account/edit') }}" class="nav-link {{ (request()->is('my-account/edit')) ? 'active' : '' }}">Detalles de la cuenta</a></li>
        <li><a href="{{ url('my-account/change-password') }}" class="nav-link {{ (request()->is('my-account/change-password')) ? 'active' : '' }}">Cambiar contraseña</a></li>
        <li><a href="{{ url('logout') }}" class="nav-link">Cerrar sesión</a></li>
    </ul>
</div>   