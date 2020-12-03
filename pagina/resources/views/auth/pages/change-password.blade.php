@extends('layouts.default')
@section('title', 'Cambiar Contraseña')
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
                            <h3>Cambiar contraseña</h3>
                            <hr>
                            <div class="w-100">
                                <div>
                                @if(Session::has('warning'))
                                <div class="alert alert-warning" role="alert">
                                {{Session::get('warning')}}
                                </div>
                                @endif
                                @if(Session::has('status'))
                                <div class="alert alert-success" role="alert">
                                {{Session::get('status')}}
                                </div>
                                @endif
                                </div>
                                <form method="POST" action="{{ url('my-account/change-password') }}">
                                    <div class="form-group">
                                        <label>Contraseña actual</label>
                                        <input type="password" name="password_old" class="form-control" placeholder="Ingrese contraseña actual" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Contraseña nueva</label>
                                        <input type="password" name="password_new" class="form-control" placeholder="Ingrese contraseña nueva" required>
                                    </div>
                                    <div class="form-group pt-2">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-main">Guardar Cambios</button>
                                    </div>
                                </form>
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