@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="ms-panel">
            <div class="ms-panel-header">
              <h6>Modificar Categoria</h6>
            </div>
            <div class="ms-panel-body">
              <form action="{{ route('category-update') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>

     
                <div class="form-group">
                    <label>Nombre</label>
                    <div class="input-group">
                        <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
                        <div class="invalid-feedback">Por favor proporcione nombre</div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Imagen</label>
                    <div class="input-group">
                        <input type="text" name="image" class="form-control" value="{{ $category->image }}" required>
                        <div class="invalid-feedback">Por favor proporcione una imagen</div>
                    </div>
                </div>
            
           
             
      
                <!-- state -->
                <div class="form-group">
                    <label>Estado</label>
                    <select name="state" class="form-control" required>
                        <option value="1" {{ $category->state == 1 ? 'selected' : '' }}>Activo</option>
                        <option value="0" {{ $category->state == 0 ? 'selected' : '' }}>Inactivo</option>
                    </select>
                </div>
                <!-- state -->
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id_category" value="{{ $category->id_category }}">
                    <button type="submit" class="btn btn-info">Guardar Cambios</button>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection