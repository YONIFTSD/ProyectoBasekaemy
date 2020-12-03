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
                            <h3>Detalles de la cuenta</h3>
                            <hr>
                            <div class="login details-account">
                                <div class="login_form_container">
                                    <div class="account_login_form">
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
                                        <form method="POST" action="{{ url('my-account/edit') }}">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label>Nombre</label>
                                                    <input type="text" name="name" class="form-control form-d" value="{{ auth()->user()->name }}" required>    
                                                </div>
                                                <div class="col-lg-6">
                                                    <label>Apellidos</label>
                                                    <input type="text" name="lastname" class="form-control form-d" value="{{ auth()->user()->last_name }}"> 
                                                </div>
                                
                                                <div class="col-lg-6">
                                                    <label>Tipo Documento</label>
                                                    <select name="document_type" class="form-control form-d">
                                                        <option value="DNI">DNI</option>
                                                    </select>
                                                </div> 
                                                
                                                <div class="col-lg-6">
                                                    <label>Documento</label>
                                                    <input type="text" name="document_number" class="form-control form-d" value="{{ auth()->user()->document_number }}"> 
                                                </div> 
                            
                                                <div class="col-lg-12">
                                                    <label>Correo electrónico</label>
                                                    <input type="email" name="email" class="form-control form-d" value="{{ auth()->user()->email }}" readonly disabled> 
                                                </div> 
                                
                                                <div class="col-lg-12">
                                                    <label>Teléfono</label>
                                                    <input type="text" name="phone" class="form-control form-d" value="{{ auth()->user()->phone }}"> 
                                                </div> 

                                                <div class="col-lg-12 pt-2">
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-main">Guardar Cambios</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
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