@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="ms-panel">
            <div class="ms-panel-header">
              <h6>Agregar Producto</h6>
            </div>
            <div class="ms-panel-body">
              <form action="{{ route('product-store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                <!-- ous -->

                <div class="form-group row">

                    <div class="col-md-4">
                        <label>Categoria</label>
                        <div class="input-group">
                            <select name="id_category" id="id_category"  class="form-control" required>
                                <option value="">[Seleccione una categoria]</option>
                                @foreach($categories as $be)
                                <option value="{{ $be->id_category }}">{{ $be->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Por favor seleccione una categoria</div>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <label>Subcategoria</label>
                        <div class="input-group">
                            <select name="id_subcategory" id="id_subcategory"  class="form-control" required>
                                <option value="">[Seleccione una subcategoria]</option>
                              
                            </select>
                            <div class="invalid-feedback">Por favor seleccione una subcategoria</div>
                        </div>
                    </div>

             


                    <div class="col-md-4">
                        <label>Código</label>
                        <div class="input-group">
                            <input type="text" name="code" class="form-control" required>
                            <div class="invalid-feedback">Por favor proporcione un codigo</div>
                        </div>
                    </div>
 
                </div>

      

                <div class="form-group row">
                    <div class="col-md-12">
                        <label>Nombre</label>
                        <div class="input-group">
                            <input type="text" name="name" class="form-control" required>
                            <div class="invalid-feedback">Por favor proporcione un nombre</div>
                        </div>
                    </div>

                   
                    
                </div>

                <div class="form-group">
                    <label class="control-label">Productos Relacionados</label>
                    <select class="form-control ui fluid search dropdown" name="related_product[]" id="related_product" multiple >
                      <option value="">Seleccione otros productos</option>
                      <?php
                      foreach($products as $prorduct){
                      ?>
                      <option value="{{ $prorduct->id_product }}">{{ $prorduct->name }}</option>
                      <?php
                      }
                      ?>
                    </select>
                </div> 
                
                <div class="form-group row">

                    

                    <div class="col-md-4">
                        <label>Precio Regular</label>
                        <div class="input-group">
                            <input type="number" value="0.00" step="any" name="regular_price" id="regular_price" class="form-control text-right" required>
                            <div class="invalid-feedback">Por favor proporcione un precio regular</div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label>Descuento (%)</label>
                        <div class="input-group">
                            <input type="number" value="0"  name="discount" id="discount" class="form-control text-right" required>
                            <div class="invalid-feedback">Por favor proporcione un descuento</div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label>Precio Online</label>
                        <div class="input-group">
                            <input readonly type="number" value="0.00" step="any" name="online_price" id="online_price" class="form-control text-right" required>
                            <div class="invalid-feedback">Por favor proporcione un precio online</div>
                        </div>
                    </div>


                 
                </div>

                <div class="form-group">
                    <label class="">Imagen <small>Tamaño recomendado (1500x1000)px</small></label>
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
                    <!-- controls -->
                
                    <div class="form-group row">
                    
                        <div class="col-md-12">
                            <label>link Visa</label>
                            <div class="input-group">
                                <input type="text" name="link_visa" class="form-control" >
                                <div class="invalid-feedback">Por favor proporcione un link de visa</div>
                            </div>
                        </div>
                    </div>
                <!-- state -->
                <div class="form-group row">
                    
                    {{-- <div class="col-md-4">
                        <label>Stock</label>
                        <div class="input-group">
                            <input type="number" min="0" value="0" name="stock" class="form-control" required>
                            <div class="invalid-feedback">Por favor proporcione un stock</div>
                        </div>
                    </div> --}}

                    <div class="col-md-6">
                        <label>Destacado</label>
                        <select name="outstanding" class="form-control" required>
                            <option value="0">NO</option>
                            <option value="1">SI</option>
                            
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label>Estado</label>
                        <select name="state" class="form-control" required>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                    
                </div>


                

                <!-- state -->

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
<link rel="stylesheet" href="{{ asset('assets/js/semantic/semantic.min.css') }}">
<script src="{{ asset('assets/js/semantic/semantic.min.js') }}"></script>
<script>

$(document).ready(function() {
    $("#related_product").dropdown();
    $("#discount").on("change", function() {
        discount();
    })

    $("#regular_price").on("change", function() {
        discount();
    })

	$("#id_category").on("change", function() {
        var id_category = $('#id_category').val();
        if (id_category == "") {
            $('#id_subcategory').html('<option value="">[Seleccione una subcategoria]</option>');
            return false;
        }
        $.ajax({

            data:  '',
            url:   'getsubcategories/'+id_category,
            type:  'GET',
            dataType: 'json',
            beforeSend: function () {
            },
            success:  function (data) {
                $('#id_subcategory').html(data.result);
            }
        });	
    })

});



function discount() {
    var regular_price = $('#regular_price').val();
    var discount = $('#discount').val();
    var online_price = parseFloat(regular_price) - ((parseFloat(regular_price) * parseFloat(discount)) / 100) ;

    $('#regular_price').val(parseFloat(regular_price).toFixed(2));
    $('#discount').val(discount);
    $('#online_price').val(online_price.toFixed(2));
}

</script>

@endsection