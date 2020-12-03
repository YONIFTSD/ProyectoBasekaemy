@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="ms-panel">
            <div class="ms-panel-header">
              <h6>Ver Cupon</h6>
            </div>
            <div class="ms-panel-body">
              <form action="{{ route('coupon-update') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>

                <div class="form-group">
                    <label>Código</label>
                    <div class="input-group">
                        <input disabled type="text" name="code" class="form-control" value="{{ $coupon->code }}" required>
                        <div class="invalid-feedback">Por favor proporcione un codigo</div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Nombre</label>
                    <div class="input-group">
                        <input disabled type="text" name="name" class="form-control" value="{{ $coupon->name }}" required>
                        <div class="invalid-feedback">Por favor proporcione nombre</div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Descripción</label>
                    <div class="input-group">
                    <input type="text" readonly name="description" value="{{ $coupon->description }}" class="form-control">
                        <div class="invalid-feedback">Por favor proporcione una descripción</div>
                    </div>
                </div>

                <div class="form-group">
                    <label>% de Descuento</label>
                    <div class="input-group">
                    <input type="number" readonly name="description" value="{{ $coupon->discount }}" class="form-control">
                        <div class="invalid-feedback">Por favor proporcione una descripción</div>
                    </div>
                </div>
           
             
      
                <!-- state -->
                <div class="form-group">
                    <label>Estado</label>
                    <select disabled name="state" class="form-control" required>
                        <option value="1" {{ $coupon->state == 1 ? 'selected' : '' }}>Activo</option>
                        <option value="0" {{ $coupon->state == 0 ? 'selected' : '' }}>Inactivo</option>
                    </select>
                </div>
                <!-- state -->
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id_coupon" value="{{ $coupon->id_coupon }}">
                    
                    <a href="{{ route('coupons') }}" class="btn btn-primary">REGRESAR</a>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection