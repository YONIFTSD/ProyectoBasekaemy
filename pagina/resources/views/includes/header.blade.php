@php
// $televisores = \App\Models\SubCategory::SubCategories(8);
// $reproductores = \App\Models\SubCategory::SubCategories(9);
// $equipos = \App\Models\SubCategory::SubCategories(10);
// $celulares = \App\Models\SubCategory::SubCategories(11);
// $novedades = \App\Models\SubCategory::SubCategories(12);
@endphp
<div class="off_canvars_overlay"></div>
<div class="Offcanvas_menu">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="Offcanvas_menu_wrapper">
                    <div class="canvas_close">
                        <a href="javascript:void(0)"><i class="fas fa-times"></i></a>  
                    </div>
                    <div class="support_info">
                        <p><a class="font-helvetica" href="mailto:comercial@goodyearfootweat.pe">comercial@goodyearfootweat.pe</a></p>
                        <p><a class="font-helvetica" href="tel:51993945530">+51 993945530</a></p>
                    </div>
                    <div class="top_right text-right">
                        <ul class="m-0 p-0">
                            <li><a class="font-helvetica" href="{{ url('my-account') }}">Mi Cuenta</a></li> 
                            <li><a class="font-helvetica" href="{{ url('contactenos') }}">Contacto</a></li> 
                        </ul>
                    </div> 
                    <!-- m -->
                    <div class="middel_right_info">
                        <a href="{{ url('mi-carrito') }}" class="link-cart d-flex align-items-center justify-content-center py-2 ml-0 ml-md-3">
                            <span class="ico-cart mr-2"></span>
                            <span class="text-uppercase text-cart-i font-helvetica">Carrito</span>
                        </a>
                    </div>
                    <hr>
                    <div id="menu" class="text-left ">
                        <ul class="offcanvas_main_menu">
                            <li class="menu-item-has-children {{ (request()->is('/')) ? 'active' : '' }}">
                                <a href="{{ url('/') }}">Inicio</a> 
                            </li>
                            <li class="menu-item-has-children {{ (request()->is('nosotros')) ? 'active' : '' }}">
                                <a href="{{ url('nosotros') }}">Acerca de Nosotros</a> 
                            </li>
                            <li class="menu-item-has-children {{ (request()->is('tienda')) ? 'active' : '' }}">
                                <a href="{{ url('tienda') }}">Tienda</a>
                            </li>
                            <li class="menu-item-has-children {{ (request()->is('contactenos')) ? 'active' : '' }}">
                                <a href="{{ url('contactenos') }}">Contáctenos</a> 
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<header class="header">
    <div class="header-top py-0 d-none d-lg-block">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-12 col-sm-12 col-md-12 col-lg-3">
                    <div class="d-md-flex justify-content-center justify-content-md-start">
                        
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-9">
                    <div>
                        <div class="text-center text-md-right">
                            <div class="d-sm-flex align-items-center justify-content-center justify-content-md-end">
                                <div class="d-flex align-items-center justify-content-center mr-0 pr-0 py-1 mr-md-2 pr-md-2">
                                    <div class="ico-envelope"></div>
                                    <div class="ml-2 text-white font-helvetica">comercial@goodyearfootweat.pe</div>
                                </div>
                                <div class="d-flex align-items-center justify-content-center ml-0 pl-0 py-1 ml-md-2 pl-md-2 mr-md-2 pr-md-2">
                                    
                                    <div class="ico-whatsapp"></div>
                                    <div class="ml-1 text-white font-helvetica">+51 993945530</div>
                                </div>

                                <ul class="list-top-l">
                                    <li><a class="text-white font-helvetica" href="{{ url('my-account') }}">Mi cuenta</a></li>
                                    <li><a class="text-white font-helvetica" href="{{ url('contactenos') }}">Contacto</a></li>
                                </ul>
                                @php
                                    $detail_cart = \App\Models\Carrito::list();
                                    $totalc = 0;
                                    if ($detail_cart) {
                                        if ($detail_cart) {
                                            for ($i=0; $i < count($detail_cart); $i++) { 
                                                if ($detail_cart[$i]['state'] == 1) {
                                                    $totalc += $detail_cart[$i]['quantity'];
                                                }
                                            }
                                        }
                                    }
                                @endphp

                                <div class="bg-cart mr-0">
                                    <a href="{{ url('mi-carrito') }}" class="link-cart d-flex align-items-center justify-content-center py-2 ml-0 ml-md-3 mr-md-3">
                                        <span class="ico-cart mr-2"></span>
                                        <span class="text-uppercase text-cart-i pr-1">Carrito  </span>
                                        <span id="my-cart-number" class="my-cart-number">{{$totalc}}</span>
                                        {{-- <i class="pl-2 fa fa-angle-down"></i> --}}
                                    </a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle">
        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                <!-- col -->
                <div class="col-12 col-sm-12 col-md-12 col-lg-3 bg-header-logo d-flex align-items-center">
                    <div class="brand-header mt-2 py-2 text-center text-md-left">
                        <a href="{{ url('/') }}">
                            <img class="img-fluid" src="{{ asset('assets/img/logo.png') }}" alt="Master-G" title="Master-G"/>
                        </a>
                    </div>
                </div>
                <!-- col -->
                <div class="col-12 col-sm-12 col-md-12 col-lg-9">
                    <div class="w-100 text-right mb-2 d-none d-lg-block mt-1">
                        <div class="link-vm">
                            <a href="https://www.instagram.com/goodyearfootwearperu/"><img src="{{ asset('assets/img/resources/instagram.png') }}"></a>
                        </div>
                        <div class="link-vm">
                            <a href="https://www.facebook.com/Goodyearfootwearperuoficial" target="_blank"><img src="{{ asset('assets/img/resources/facebook.png') }}"></a>
                        </div>
                        
                        <div class="link-vm">
                            <a href="{{ url('/') }}" class="d-flex align-items-center">
                                <span class="pr-3 link-vm-br text-vm">INICIO</span>
                            </a>
                        </div>
                        <div class="link-vm">
                            <a href="{{ url('nosotros') }}" class="d-flex align-items-center">
                                <span class="pr-3 link-vm-br text-vm">ACERCA DE NOSOTROS</span>
                            </a>
                        </div>
                        <div class="link-vm">
                            <a href="{{ url('tienda') }}" class="d-flex align-items-center">
                                <span class="pr-3 link-vm-br text-vm">TIENDA</span>
                            </a>
                        </div>
                        <div class="link-vm">
                            <a href="{{ url('contactenos') }}" class="d-flex align-items-center">
                                <span class="pr-3 text-vm">CONTACTO</span>
                            </a>
                        </div>
                    </div>

                    <div class="ddddd">

                        <div class="w-100 ml-auto">
                        <form action="{{ url('productos/search')}}" method="GET">
                                <div class="d-flex">
                                    <input class="form-control form-control-lg form-search rounded-0" type="search" value="" size="50" autocomplete="off" placeholder="¿Qué producto necesitas?" name="q">
                                    <button type="submit" class="btn btn-lg btn-search rounded-0"><i class="fas fa-search"></i></button>
                                </div>

                            </form>
                        </div>
                        <div class="ml-4 d-none d-xl-block">
                            <div class="d-flex align-items-center">
                                <div>
                                <a href="https://wa.me/51993945530" target="_blank"><img src="{{ asset('assets/img/resources/whatsapp.png') }}"></a>
                                </div>
                                <div class="mx-2">
                                    <a href="https://www.instagram.com/goodyearfootwearperu/"><img src="{{ asset('assets/img/resources/instagram.png') }}"></a>
                                </div>
                                <div>
                                    <a href="https://www.facebook.com/Goodyearfootwearperuoficial" target="_blank"><img src="{{ asset('assets/img/resources/facebook.png') }}"></a>
                                </div>
                            </div>
                        </div>
                        
                        
                            
                           
                          
                      
                    </div>

                    
                </div>
                <!-- col -->
            </div>
            <!-- row -->

            <div class="w-100 ">
                <!-- nav -->
                <nav class="navbar__main navbar navbar-expand-lg navbar-dark p-0">
                    <span class="navbar-brand d-block d-lg-none">
                        <div class="d-flex align-items-center">
                            <div>
                                <a href=""><img src="{{ asset('assets/img/resources/whatsapp.png') }}"/></a>
                            </div>
                            <div class="mx-2">
                                <a href=""><img src="{{ asset('assets/img/resources/instagram.png') }}"/></a>
                            </div>
                            <div>
                                <a href=""><img src="{{ asset('assets/img/resources/facebook.png') }}"/></a>
                            </div>
                        </div>
                    </span>
                    <button class="navbar-toggler canvas_open" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="w-100 ml-auto">
                        <!-- n -->
                        <div class="main_menu menu_position"> 
                            <nav>  
                                <ul class="main_menu_nav_ul">

                                {{-- @php
                                    $subcategories = \App\Models\SubCategory::SubCategories(4);
                                @endphp
                                @foreach ($subcategories as $subcategory)
                                <li class="mega_items">
                                    <a href="{{ url( 'productos/'.$subcategory->id_subcategory.'/'.str_slug($subcategory->name).'/s') }}" class="{{ (request()->is(str_slug($subcategory->name))) ? 'active' : '' }}">{{$subcategory->name}}</a> 
                                </li>
                                @endforeach --}}


                                    @foreach ($categories as $category)
                                    <li class="mega_items">
                                        <a href="{{ url( 'productos/'.$category->id_category.'/'.str_slug($category->name).'/c') }}" class="{{ (request()->is(str_slug($category->name))) ? 'active' : '' }}">{{$category->name}}</a> 
                                        {{-- <a href="{{ url( 'productos/'.$category->id_category.'/'.str_slug($category->name).'/c') }}" class="{{ (request()->is(str_slug($category->name))) ? 'active' : '' }}">{{$category->name}} <i class="fa fa-angle-down mega_items-icon"></i></a> 
                                        <div class="mega_menu">
                                            <ul class="mega_menu_inner mmi-ul">
                                                <li><a href="{{ url( 'productos/'.$category->id_category.'/'.str_slug($category->name).'/c') }}">{{ $category->name }}</a>
                                                    <ul class="mmi-ul-submenu">
                                                        @php
                                                            $subcategories = \App\Models\SubCategory::SubCategories($category->id_category);
                                                        @endphp
                                                        @foreach ($subcategories as $subcategory)
                                                        <li><a href="{{ url( 'productos/'.$subcategory->id_subcategory.'/'.str_slug($subcategory->name).'/s') }}"> {{ $subcategory->name }}</a>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>  --}}
                                    </li>
                                    @endforeach


                                    
                                </ul>  
                            </nav> 
                        </div>
                        <!-- n -->
                        </div>
                 
                    </div>
                </nav>
                <!-- nav -->
            </div>
        </div>
    </div>
</header>