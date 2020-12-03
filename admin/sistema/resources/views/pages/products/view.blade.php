@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="ms-panel">
            <div class="ms-panel-header">
              <h6>Ver Producto</h6>
            </div>
            <div class="ms-panel-body">
              <form action="{{ route('product-update') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                
                <div class="form-group row">

                    <div class="col-md-4">
                        <label>Categoria</label>
                        <div class="input-group">
                            <select disabled name="id_category" id="id_category"  class="form-control" required>
                                <option value="">[Seleccione una categoria]</option>
                                @foreach($categories as $be)
                                <option value="{{ $be->id_category }}" {{ $be->id_category == $product->id_category ? 'selected':'' }}>{{ $be->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Por favor seleccione una categoria</div>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <label>Subcategoria</label>
                        <div class="input-group">
                            <select disabled name="id_subcategory" id="id_subcategory"  class="form-control" required>
                                <option value="">[Seleccione una subcategoria]</option>
                                @foreach($subcategories as $be)
                                <option value="{{ $be->id_subcategory }}"  {{ $be->id_subcategory == $product->id_subcategory ? 'selected':'' }}>{{ $be->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Por favor seleccione una subcategoria</div>
                        </div>
                    </div>

        


                    <div class="col-md-4">
                        <label>Código</label>
                        <div class="input-group">
                            <input disabled type="text" name="code" class="form-control" value="{{ $product->code }}" required>
                            <div class="invalid-feedback">Por favor proporcione un codigo</div>
                        </div>
                    </div>
 
                </div>



                <div class="form-group row">
                    <div class="col-md-12">
                        <label>Nombre</label>
                        <div class="input-group">
                            <input disabled type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                            <div class="invalid-feedback">Por favor proporcione un nombre</div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Productos Relacionados</label>
                    <select disabled class="form-control ui fluid search dropdown" name="related_product[]" id="related_product" multiple >
                      <option value="">Seleccione otros productos</option>
                      @foreach ($products as $related_product)
                       @php
                        $selected  = in_array($related_product->id_product, json_decode($product->related_product)) ? 'selected' : '';
                       @endphp 
                      <option {{ $selected }} value="{{ $related_product->id_product }}">{{ $related_product->name }}</option>
                      @endforeach
                    </select>
                </div>
         
                
                <div class="form-group row">

                    <div class="col-md-4">
                        <label>Precio Regular</label>
                        <div class="input-group">
                            <input disabled type="number" step="any" name="regular_price" class="form-control text-right" value="{{ $product->regular_price }}" required>
                            <div class="invalid-feedback">Por favor proporcione un precio regular</div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label>Descuento (%)</label>
                        <div class="input-group">
                            <input disabled type="number" value="{{ $product->discount }}"  name="discount" class="form-control text-right" required>
                            <div class="invalid-feedback">Por favor proporcione un descuento</div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label>Precio Online</label>
                        <div class="input-group">
                            <input disabled type="number" step="any" name="online_price" class="form-control text-right" value="{{ $product->online_price }}" required>
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
                                @if($product->image)
                                <img class="img-fluid" src="{{ url('/').$product->image }}" alt="File" />
                                @else
                                <img class="img-fluid" src="{{ asset('assets/img/image-preview.jpg') }}" alt="File" />
                                @endif
                            </div>
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 600px; height: auto;"></div>
                          
                        </div>
                    </div>
                    <!-- controls -->
                </div>

                <div class="form-group row">
                    
                    <div class="col-md-12">
                        <label>link Visa</label>
                        <div class="input-group">
                        <input type="text" disabled value="{{ $product->link_visa }}" name="link_visa" class="form-control" >
                            <div class="invalid-feedback">Por favor proporcione un link de visa</div>
                        </div>
                    </div>
                </div>
                <!-- state -->
                <div class="form-group row">
                    
    

                    <div class="col-md-6">
                        <label>Destacado</label>
                        <select disabled name="outstanding" class="form-control" required>
                            <option {{ $product->outstanding == 0 ? 'selected':'' }} value="0">NO</option>
                            <option {{ $product->outstanding == 1 ? 'selected':'' }} value="1">SI</option>
                            
                        </select>
                    </div>

              

                    <div class="col-md-4">
                        <label>Estado</label>
                        <select disabled name="state" class="form-control" required>
                            <option {{ $product->state == 1 ? 'selected':'' }} value="1">Activo</option>
                            <option {{ $product->state == 0 ? 'selected':'' }} value="0">Inactivo</option>
                        </select>
                    </div>
                    
                </div>
                <!-- state -->
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id_product" value="{{ $product->id_product }}">
                    
                    <a href="{{ route('products') }}" class="btn btn-primary">REGRESAR</a>
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
	$("#id_category").on("change", function() {
        var id_category = $('#id_category').val();
        if (id_category == "") {
            $('#id_subcategory').html('<option value="">[Seleccione una subcategoria]</option>');
            return false;
        }
        var _url = APP_URL+'/admin/product/getsubcategories/'+id_category;
        $.ajax({

            data:  '',
            url:   _url,
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

</script>

@endsection