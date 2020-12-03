@extends('layouts.default')
@section('title', 'Mi Cuenta')
@section('content')
<section class="main_content_area pt-30">
    <div class="container">   
        <div class="account_dashboard">
            <div class="row">
                <!-- col -->
                <div class="col-sm-12 col-md-3 col-lg-3">
                    @include('auth.blocks.nav') 
                </div>
                <!-- col -->
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <!-- Tab panes -->
                    <div class="tab-content dashboard_content">
                        <!-- tab -->
                        <div class="w-100">
                            <h3>Dashboard </h3>
                            <p>Hola <span class="color-main"><b>{{ auth()->user()->name }}</b></span> bienvenido a su cuenta, aquí podrás ver y verificar fácilmente sus pedidos, editar su contraseña y los detalles de su cuenta.</p>
                            <div class="pt-4"></div>
                            <hr>
                            <div class="w-100">
                                <a href="{{ url('mi-carrito') }}" class="btn btn-main btn-sm">IR A MI CARRITO</a>
                            </div>
                        </div>
                        <!-- tab -->                  
                    </div>
                </div>
            </div>
        </div>  
    </div>        	
</section>
@endsection