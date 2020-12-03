@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="ms-panel">
            <div class="ms-panel-header">
              <h6>Agregar Usuario</h6>
            </div>
            <div class="ms-panel-body">
              <form action="{{ route('user-store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                <!-- ous -->
                <div class="form-group">
                    <label>Tipo Usuario</label>
                    <div class="input-group">
                        <select name="id_user_type" class="form-control" required>
                            <option value="">[Seleccione un Tipo de Usuario]</option>
                            @foreach($userType as $be)
                            <option value="{{ $be->id_user_type }}">{{ $be->name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">Por favor seleccione un tipo de usuario</div>
                    </div>
                </div>

 
                <div class="form-group">
                    <label>Nombre</label>
                    <div class="input-group">
                        <input type="text" name="name" class="form-control" required>
                        <div class="invalid-feedback">Por favor proporcione un nombre</div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label>Apellido</label>
                    <div class="input-group">
                        <input type="text" name="last_name" class="form-control" required>
                        <div class="invalid-feedback">Por favor proporcione un apellido</div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Teléfono</label>
                    <div class="input-group">
                        <input type="text" name="phone" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label>Correo electrónico (*) <small>se usará como nombre de usuario</small></label>
                    <div class="input-group">
                        <input type="email" name="email" class="form-control" required>
                        <div class="invalid-feedback">Por favor proporcione un correo electrónico</div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Contraseña (*) <small>se usará como la contraseña de usuario</small></label>
                    <div class="input-group">
                        <input type="password" name="password" class="form-control" required>
                        <div class="invalid-feedback">Por favor proporcione una contraseña</div>
                    </div>
                </div>
              
                <!-- state -->
                <div class="form-group">
                    <label>Estado</label>
                    <select name="state" class="form-control" required>
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
                </div>
                <!-- state -->
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-info">Guardar</button>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection