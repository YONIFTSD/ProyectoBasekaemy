@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="ms-panel">
            <div class="ms-panel-header">
              <h6>Ver Subcategoria</h6>
            </div>
            <div class="ms-panel-body">
              <form action="{{ route('category-update') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>

     
                <div class="form-group">
                    <label>Categoria</label>
                    <div class="input-group">
                        <select disabled name="id_category" class="form-control" required>
                            <option value="">[Seleccione una categoria]</option>
                            @foreach($categories as $be)
                            <option value="{{ $be->id_category }}" {{ $be->id_category == $subcategory->id_category ? 'selected':''}}  >{{ $be->name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">Por favor seleccione una categoria</div>
                    </div>
                </div>
     
                <div class="form-group">
                    <label>Nombre</label>
                    <div class="input-group">
                        <input disabled type="text" name="name" class="form-control" value="{{ $subcategory->name }}" required>
                        <div class="invalid-feedback">Por favor proporcione nombre</div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Descripción</label>
                    <div class="input-group">
                        <input disabled type="text" name="description" class="form-control" value="{{ $subcategory->description }}" required>
                        <div class="invalid-feedback">Por favor proporcione una descripción</div>
                    </div>
                </div>

                <!-- state -->
                <div class="form-group">
                    <label>Estado</label>
                    <select disabled name="state" class="form-control" required>
                        <option value="1" {{ $subcategory->state == 1 ? 'selected' : '' }}>Activo</option>
                        <option value="0" {{ $subcategory->state == 0 ? 'selected' : '' }}>Inactivo</option>
                    </select>
                </div>
                <!-- state -->
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id_subcategory" value="{{ $subcategory->id_subcategory }}">
                    
                    <a href="{{ route('subcategories') }}" class="btn btn-primary">REGRESAR</a>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection