@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="ms-panel">
            <div class="ms-panel-header">
              <h6>Ver Usuario</h6>
            </div>
            <div class="ms-panel-body">
              <form action="{{ route('user-update') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                <!-- ous -->
                <div class="form-group">
                    <label>Tipo de Usuario</label>
                    <div class="input-group">
                        <select disabled name="id_user_type" class="form-control" required>
                            <option value="">[Seleccione un tipo de usuario]</option>
                            @foreach($userType as $be)
                            <option value="{{ $be->id_user_type }}" {{ $user->id_user_type == $be->id_user_type ? 'selected' : '' }}>{{ $be->name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">Por favor seleccione un tipo de usuario</div>
                    </div>
                </div>
                <!-- ous -->
     
                <div class="form-group">
                    <label>Nombre</label>
                    <div class="input-group">
                        <input disabled type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                        <div class="invalid-feedback">Por favor proporcione nombre</div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Apellido</label>
                    <div class="input-group">
                        <input disabled type="text" name="last_name" class="form-control" value="{{ $user->last_name }}" required>
                        <div class="invalid-feedback">Por favor proporcione apellido</div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Teléfono</label>
                    <div class="input-group">
                        <input disabled type="text" name="phone" value="{{ $user->phone }}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label>Correo electrónico (*) <small>nombre de usuario</small></label>
                    <div class="input-group">
                        <input disabled type="text" name="email" class="form-control" value="{{ $user->email }}" readonly disabled>
                        <div class="invalid-feedback">Por favor proporcione correo electrónico</div>
                    </div>
                </div>
      
                <!-- state -->
                <div class="form-group">
                    <label>Estado</label>
                    <select disabled name="state" class="form-control" required>
                        <option value="1" {{ $user->state == 1 ? 'selected' : '' }}>Activo</option>
                        <option value="0" {{ $user->state == 0 ? 'selected' : '' }}>Inactivo</option>
                    </select>
                </div>
                <!-- state -->
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    
                    <a href="{{ route('users')}}"  class="btn btn-primary" alt="Regresar">Regresar</a>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection