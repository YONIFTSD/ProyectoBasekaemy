@extends('layouts.dashboard')
@section('content')
<div class="ms-profile-overview">
    <div class="ms-profile-cover">
        <img class="ms-profile-img" src="{{ asset('assets/img/customer.jpg') }}" alt="User">
        <div class="ms-profile-user-info">
            <h4 class="ms-profile-username text-white">{{ $user->name }}</h4>
            <h2 class="ms-profile-role">
             
                    Administrador
           
            </h2>
        </div>
    </div>
    <ul class="ms-profile-navigation nav nav-tabs tabs-bordered" role="tablist">
        <li role="presentation"><a href="#tab1" aria-controls="tab1" class="active show" role="tab" data-toggle="tab"> Información </a></li>
        <li role="presentation"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab"> Seguridad </a></li>
    </ul>
</div>
<div class="tab-content">
    <div class="tab-pane show active" id="tab1">
        <!-- row -->
        <div class="row">
            <!-- col -->
            <div class="col-md-5">
                <!-- panel -->
                @include('blocks.basic-information')
                <!-- panel -->
            </div>
            <!-- col -->
            <div class="col-md-7">
                <!-- panel -->
                <div class="ms-panel ms-panel-fh">
                    <div class="ms-panel-body">
                        <h2 class="section-title">Modicar Información</h2>
                        <form action="{{ route('dashboard-update-profile') }}" method="POST" class="needs-validation" novalidate>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Nombre</label>
                                    <div class="input-group">
                                        <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                                        <div class="invalid-feedback">Por favor proporcione nombre.</div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Apellido</label>
                                    <div class="input-group">
                                        <input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}" required>
                                        <div class="invalid-feedback">Por favor proporcione apellido.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Teléfono</label>
                                    <div class="input-group">
                                        <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-info">Guardar Cambios</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- panel -->
            </div>
            <!-- col -->
        </div>
        <!-- row -->
    </div>
    <div class="tab-pane" id="tab2">
        <!-- row -->
        <div class="row">
            <!-- col -->
            <div class="col-md-5">
                <!-- panel -->
                @include('blocks.basic-information')
                <!-- panel -->
            </div>
            <!-- col -->
            <div class="col-md-7">
                <!-- panel -->
                <div class="ms-panel ms-panel-fh">
                    <div class="ms-panel-body">
                        <h2 class="section-title">Cambiar contraseña</h2>
                        <form action="{{ route('dashboard-change-password') }}" method="POST" class="needs-validation" novalidate>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Actual contraseña</label>
                                    <div class="input-group">
                                        <input type="password" name="oldpassword" class="form-control" required>
                                        <div class="invalid-feedback">Por favor proporcione contraseña.</div>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Nueva contraseña</label>
                                    <div class="input-group">
                                        <input type="password" name="newpassword" class="form-control" required>
                                        <div class="invalid-feedback">Por favor proporcione contraseña.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-info">Cambiar contraseña</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- panel -->
            </div>
            <!-- col -->
        </div>
        <!-- row -->
    </div>
</div>
@endsection