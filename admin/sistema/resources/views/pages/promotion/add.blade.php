@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="ms-panel">
            <div class="ms-panel-header">
              <h6>Agregar Promoción</h6>
            </div>
            <div class="ms-panel-body">
              <form action="{{ route('promotion-store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                <!-- ous -->

                <div class="form-group row">

                    <div class="col-md-8">
                        <label>Nombre</label>
                        <div class="input-group">
                            <input type="text" name="name" class="form-control" required>
                            <div class="invalid-feedback">Por favor proporcione un nombre</div>
                        </div>
                    </div>
 
                   

                    <div class="col-md-2">
                        <label>Cantidad de Producto</label>
                        <div class="input-group">
                            <input type="number" value="0"  name="product_quantity" id="product_quantity" class="form-control text-right" required>
                            <div class="invalid-feedback">Por favor proporcione una cantidad de producto</div>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <label>Cantidad a Pagar </label>
                        <div class="input-group">
                            <input type="number" value="0"  name="amount_payment" id="amount_payment" class="form-control text-right" required>
                            <div class="invalid-feedback">Por favor proporcione una cantidad a pagar </div>
                        </div>
                    </div>

            

                </div>
                <div class="form-group ">
                    
                    <label class="">Imagen <small>Tamaño recomendado (1300x300)px</small></label>
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

                <div class="form-group row">


                    <div class="col-md-12">
                        <label>Estado</label>
                        <select name="state" class="form-control" required>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>

                </div>


        

                <div class="form-group">
                    <input type="hidden" name="_token" name="_token" value="{{ csrf_token() }}">
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
<script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
@endsection