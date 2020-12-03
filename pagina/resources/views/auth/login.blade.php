@extends('layouts.default')
@section('title', 'Ingresar')
@section('content')
<section class="pt-5 pb-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <!-- bx acceso -->
                <div class="bx-acceso panel panel-default">
                    <div class="panel-body">
                        <div class="w-100">
                            <h3 class="title-panel-acceso mb-4">Ingresa a tu cuenta</h3>
                            <form method="POST" action="{{ route('login') }}">
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <label class="control-label">Correo electrónico</label>
                                    <input type="email" name="email" class="form-control form-d" value="{{ old('email') }}" autofocus required>
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
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-main w-100">Ingresa a tu cuenta</button>
                                </div>
                                <div class="w-100 others-accesses text-center">
                                    <div class="bgd-o mt-4 mb-4"><span>ó</span></div>
                                    <span class="mb-2">¿Aún no tienes una cuenta?</span>
                                    <a href="{{ route('register') }}" class="btn btn-registrarse w-100">Crea tu cuenta</a>
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
