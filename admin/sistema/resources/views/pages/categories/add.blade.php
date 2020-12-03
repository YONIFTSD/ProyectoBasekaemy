@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="ms-panel">
            <div class="ms-panel-header">
              <h6>Agregar Categoria</h6>
            </div>
            <div class="ms-panel-body">
              <form action="{{ route('category-store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                <!-- ous -->
             
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
                    <label class="">Imagen <small>Tamaño recomendado (1000x1000)px</small></label>
                    <!-- controls -->
                    <div class="controls">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="max-width: 600px; height: auto;">
                                <img class="img-fluid" src="{{ asset('assets/img/image-preview.jpg') }}" alt="File" />
                            </div>
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 600px; height: auto;"></div>
                            <div>
                                <span class="btn btn-outline-secondary btn-file">
                                    <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Seleccione la imagen</span>
                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Cambiar</span>
                                    <input name="image" id="image" onchange="document.getElementById('file_value').value = this.value" type="file" required class="default"/>
                                    <input name="file_value" type="hidden" id="file_value" value="default"/>
                                </span>
                            </div>
                        </div>
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
@section('scripts')
<script src="{{ asset('assets/js/bootstrap-fileupload/bootstrap-fileupload.js') }}"></script>
@endsection
