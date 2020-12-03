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
                    <label>Descripción</label>
                    <div class="input-group">
                    <input type="text" name="description" value="{{ $category->description }}" class="form-control">
                        <div class="invalid-feedback">Por favor proporcione una descripción</div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="">Imagen <small>Tamaño recomendado (1000x1000)px</small></label>
                    <!-- controls -->
                    <div class="controls">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="max-width: 600px; height: auto;">
                                @if($category->image)
                                <img class="img-fluid" src="{{ url('/').$category->image }}" alt="File" />
                                @else
                                <img class="img-fluid" src="{{ asset('assets/img/image-preview.jpg') }}" alt="File" />
                                @endif
                            </div>
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 600px; height: auto;"></div>
                            <div>
                                <span class="btn btn-outline-secondary btn-file">
                                    <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Seleccione la imagen</span>
                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Cambiar</span>
                                    <input name="image" id="image" onchange="document.getElementById('file_value').value = this.value" type="file" class="default"/>
                                    <input name="file_value" type="hidden" id="file_value" value="{{ $category->image }}"/>
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- controls -->
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
@section('scripts')
<script src="{{ asset('assets/js/bootstrap-fileupload/bootstrap-fileupload.js') }}"></script>
@endsection