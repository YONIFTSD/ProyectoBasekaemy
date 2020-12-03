@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="ms-panel">
            <div class="ms-panel-header">
              <h6>Modificar Portada</h6>
            </div>
            <div class="ms-panel-body">
              <form action="{{ route('cover-page-update') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>

     
                <div class="form-group">
                    <label>Titulo</label>
                    <div class="input-group">
                        <input type="text" name="title" class="form-control" value="{{ $cover_page->title}}" required>
                        <div class="invalid-feedback">Por favor proporcione un titulo</div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Descripción</label>
                    <div class="input-group">
                        <input type="text" name="description" class="form-control" value="{{ $cover_page->description}}" required>
                        <div class="invalid-feedback">Por favor proporcione una descripción</div>
                    </div>
                </div>
                
        

                <div class="form-group">
                    <label>Imagen <small>Tamaño recomendado (1300x650)px </small></label>
                    <!-- controls -->
                    <div class="controls">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="max-width: 600px; height: auto;">
                                @if($cover_page->image)
                                <img class="img-fluid" src="{{ url('/').$cover_page->image }}" alt="File" />
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
                                    <input name="file_value" type="hidden" id="file_value" value="{{ $cover_page->image }}"/>
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- controls -->
                </div>

                <div class="form-group">
                    <label>URL</label>
                    <div class="input-group">
                        <input type="text" name="url" class="form-control" value="{{ $cover_page->url}}" >
                        <div class="invalid-feedback">Por favor proporcione una url</div>
                    </div>
                </div>


      
                <!-- state -->
                <div class="form-group">
                    <label>Estado</label>
                    <select name="state" class="form-control" required>
                        <option value="1" {{ $cover_page->state == 1 ? 'selected' : '' }}>Activo</option>
                        <option value="0" {{ $cover_page->state == 0 ? 'selected' : '' }}>Inactivo</option>
                    </select>
                </div>
                <!-- state -->
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id_cover_page" value="{{ $cover_page->id_cover_page }}">
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