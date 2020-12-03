@extends('layouts.default')
@section('title', 'Crear cuenta')
@section('content')
<section class="pt-5 pb-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <!-- bx acceso -->
                <div class="bx-acceso panel panel-default">
                    <div class="panel-body">
                        <div class="w-100">
                            <h3 class="title-panel-acceso mb-4">Crear Cuenta</h3>
                            <form method="POST" action="{{ route('register') }}">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label class="control-label">Nombre</label>
                                    <input type="text" name="name" class="form-control form-d" value="{{ old('name') }}" autofocus required>
                                    @if($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Correo electrónico *</label>
                                    <input type="email" name="email" class="form-control form-d" value="{{ old('email') }}" required>
                                    @if($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                    <label class="control-label">Contraseña</label>
                                    <input type="password" name="password" class="form-control form-d" required>
                                    @if($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Confirmar contraseña</label>
                                    <input type="password" name="password_confirmation" class="form-control form-d" required>
                                </div>
                                <div>
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-main w-100">Crea tu cuenta</button>
                                </div>
                                <div class="w-100 others-accesses text-center">
                                    <div class="bgd-o mt-4 mb-4"><span>ó</span></div>
                                    <a href="{{ route('login') }}" class="btn btn-registrarse w-100">Iniciar Sesión</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- bx acceso -->
            </div>
        </div>
    </div>
</section>
@endsection
