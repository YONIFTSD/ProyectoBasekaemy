@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="ms-panel">
            <div class="ms-panel-header">
              <h6>Agregar Cupon</h6>
            </div>
            <div class="ms-panel-body">
              <form action="{{ route('coupon-store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                <!-- ous -->
             
                <div class="form-group">
                    <label>Código</label>
                    <div class="input-group">
                        <input type="text" name="code" class="form-control" required>
                        <div class="invalid-feedback">Por favor proporcione un codigo</div>
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
                    <label>Descripción</label>
                    <div class="input-group">
                        <input type="text" name="description" class="form-control">
                        <div class="invalid-feedback">Por favor proporcione una descripción</div>
                    </div>
                </div>

                <div class="form-group">
                    <label>% de Descuento</label>
                    <div class="input-group">
                        <input type="number" name="discount" class="form-control">
                        <div class="invalid-feedback">Por favor proporcione una descripción</div>
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
