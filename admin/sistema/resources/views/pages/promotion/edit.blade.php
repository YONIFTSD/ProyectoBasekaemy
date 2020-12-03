@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="ms-panel">
            <div class="ms-panel-header">
              <h6>Editar Promoción</h6>
            </div>
            <div class="ms-panel-body">
              <form action="{{ route('promotion-update') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                <!-- ous -->

                <div class="form-group row">

                    

                    <div class="col-md-8">
                        <label>Nombre</label>
                        <div class="input-group">
                            <input value="{{ $promotion->name }}" type="text" name="name" class="form-control" required>
                            <div class="invalid-feedback">Por favor proporcione un nombre</div>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <label>Cantidad de Producto</label>
                        <div class="input-group">
                            <input type="number" value="{{ $promotion->product_quantity }}" name="product_quantity" id="product_quantity" class="form-control text-center" required>
                            <div class="invalid-feedback">Por favor proporcione una cantidad de producto</div>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <label>Cantidad a Pagar </label>
                        <div class="input-group">
                            <input type="number" value="{{ $promotion->amount_payment }}"  name="amount_payment" id="amount_payment" class="form-control text-center" required>
                            <div class="invalid-feedback">Por favor proporcione una cantidad a pagar </div>
                        </div>
                    </div>

                   

                </div>

                <div class="form-group">
                    <label class="">Imagen <small>Tamaño recomendado (1300x300)px</small></label>
                    <!-- controls -->
                    <div class="controls">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="max-width: 600px; height: auto;">
                                @if($promotion->image)
                                <img class="img-fluid" src="{{ url('/').$promotion->image }}" alt="File" />
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
                                    <input name="file_value" type="hidden" id="file_value" value="{{ $promotion->image }}"/>
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- controls -->
                </div>

                <div class="form-group row">


                    <div class="col-md-12">
                        <label>Estado</label>
                        <select name="state" class="form-control" required>
                            <option {{ $promotion->state == 1 ? 'selected':'' }} value="1">Activo</option>
                            <option {{ $promotion->state == 0 ? 'selected':'' }} value="0">Inactivo</option>
                        </select>
                    </div>

                </div>



                <div class="form-group">
                    <input type="hidden" name="_token" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" id="id_promotion" name="id_promotion" value="{{ $promotion->id_promotion }}">
                    <button type="submit" class="btn btn-info">Guardar</button>
                    
                </div>

              </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="modal-product" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Productos</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            <div class="col-md-12">
                <label class="control-label" for="">Buscar Producto</label>
                <input type="text" class="form-control" id="search-product">
            </div>
          </div>

          <div class="w-100" id="block-product">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

@endsection
@section('scripts')
<script src="{{ asset('assets/js/bootstrap-fileupload/bootstrap-fileupload.js') }}"></script>
<script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
<script>

$(document).ready(function() {

    $("#discount").on("change", function() {
        discount();
    })

    $("#regular_price").on("change", function() {
        discount();
    })

    $("#btn-modal-product").on("click", function() {
       $('#modal-product').modal('show');
    })

    $("#search-product").on("keyup", function() {
        SearchProduct(this.value);
    })

    ListDetailPromotion();
    
});



function discount() {
    var regular_price = $('#regular_price').val();
    var discount = $('#discount').val();
    var online_price = parseFloat(regular_price) - ((parseFloat(regular_price) * parseFloat(discount)) / 100) ;

    $('#regular_price').val(parseFloat(regular_price).toFixed(2));
    $('#discount').val(discount);
    $('#online_price').val(online_price.toFixed(2));
}

    function SearchProduct(q) {

        var _url = APP_URL+'/product/search-product-promotions';
        var parameters = {
                            'q' : q,
                            'view' : 'edit',
                         };
        $.ajax({

            data:  parameters,
            url:   _url,
            type:  'GET',
            beforeSend: function () {
            },
            success:  function (data) {
                $('#block-product').html(data);
            }
        });	

    }

    function AddDetailPromotion(id_product) {

        var id_promotion = $('#id_promotion').val();
        var quantity = $('#mQuantity'+id_product).val();
        if (quantity == "") {
            Swal.fire({
                position: 'top-center',
                icon: 'error',
                title: 'Ingrese una cantidad',
                showConfirmButton: false,
                timer: 1500
            })
            return false;
        }
        var _url = APP_URL+'/promotion/add-detail';
        var parameters = {
                            'id_product' : id_product,
                            'id_promotion' : id_promotion,
                            'quantity' : quantity,
                            'view' : 'edit',
                         };
        $.ajax({
            data:  parameters,
            url:   _url,
            type:  'GET',
            dataType: 'json',
            beforeSend: function () {
            },
            success:  function (data) {
                if (data.status == 200) {
                    ListDetailPromotion(); 
                }else{

                }
            }
        });	
    }

    function EditDetailPromotion(id_product) {

        var id_promotion = $('#id_promotion').val();
        var quantity = $('#dQuantity'+id_product).val();
        var _url = APP_URL+'/promotion/edit-detail';
        var parameters = {
                            'id_product' : id_product,
                            'id_promotion' : id_promotion,
                            'quantity' : quantity,
                            'view' : 'edit',
                        };
        $.ajax({
            data:  parameters,
            url:   _url,
            type:  'GET',
            dataType: 'json',
            beforeSend: function () {
            },
            success:  function (data) {
                if (data.status == 200) {
                    // ListDetailPromotion(); 
                }else{

                }
            }
        });	
    }

    function DeleteDetailPromotion(id_product) {

        var id_promotion = $('#id_promotion').val();
        var _url = APP_URL+'/promotion/delete-detail';
        var parameters = {
                            'id_product' : id_product,
                            'id_promotion' : id_promotion,
                            'view' : 'edit',
                        };
        $.ajax({
            data:  parameters,
            url:   _url,
            type:  'GET',
            dataType: 'json',
            beforeSend: function () {
            },
            success:  function (data) {
                if (data.status == 200) {
                    ListDetailPromotion(); 
                }else{

                }
            }
        });	
    }
    
    
    function ListDetailPromotion() {
 
        var id_promotion = $('#id_promotion').val();
        var _url = APP_URL+'/promotion/list-detail';
        var parameters = {
                            'id_promotion' : id_promotion,
                            'view' : 'edit',
                        };
        $.ajax({
            data:  parameters,
            url:   _url,
            type:  'GET',
            beforeSend: function () {
            },
            success:  function (data) {
                $('#block-promotion-detail').html(data);
            }
        });	
    }


</script>

@endsection