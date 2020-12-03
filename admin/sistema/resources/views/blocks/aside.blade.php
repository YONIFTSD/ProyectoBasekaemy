<aside id="ms-side-nav" class="side-nav fixed ms-aside-scrollable ms-aside-left">
    <!-- Logo -->
    <div class="logo-sn ms-d-block-lg">
      <a class="pl-0 ml-0 text-center" href="{{ route('dashboard') }}">
        <img src="{{ asset('assets/img/logo-216x62.png') }}" alt="MDCN">
      </a>
    </div>
    <!-- Navigation -->
    <ul class="accordion ms-main-aside fs-14" id="side-nav-accordion">
      <!-- Dashboard -->
      <li class="menu-item">
        <a href="{{ route('dashboard') }}"><span><i class="material-icons fs-16">dashboard</i>Dashboard</span></a>
      </li>
      <!-- Dashboard -->

      {{-- Product --}}
      <li class="menu-item">
        <a href="#" class="has-chevron" data-toggle="collapse" data-target="#product" aria-expanded="false" aria-controls="product"><span><i class="fa fa-folder fs-16"></i>Producto</span></a>
        <ul id="product" class="collapse" aria-labelledby="product" data-parent="#side-nav-accordion">
          <li><a href="{{ route('products') }}">Producto</a></li>
          <li><a href="{{ route('categories') }}">Categoria</a></li>
          <li><a href="{{ route('subcategories') }}">Subcategoria</a></li>
        
   
        </ul>
      </li>
      {{-- Product --}}

      <li class="menu-item">
        <a href="{{ route('promotions') }}"><span><i class="material-icons fs-16">dashboard</i>Promociones</span></a>
      </li>

      <li class="menu-item">
        <a href="{{ route('coupons') }}"><span><i class="material-icons fs-16">dashboard</i>Cupones</span></a>
      </li>

      <li class="menu-item">
        <a href="{{ route('clients') }}"><span><i class="material-icons fs-16">dashboard</i>Clientes</span></a>
      </li>

  

      <li class="menu-item">
        <a href="{{ route('orders') }}"><span><i class="material-icons fs-16">dashboard</i>Pedidos</span></a>
      </li>

      <li class="menu-item">
        <a href="{{ route('covers-page') }}"><span><i class="material-icons fs-16">dashboard</i>Portadas</span></a>
      </li>

      <li class="menu-item">
        <a href="{{ route('users') }}"><span><i class="material-icons fs-16">dashboard</i>Usuarios</span></a>
      </li>



 
    </ul>
</aside>