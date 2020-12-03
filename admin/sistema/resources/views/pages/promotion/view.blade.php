@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="ms-panel">
            <div class="ms-panel-header">
              <h6>Ver Promoción</h6>
            </div>
            <div class="ms-panel-body">
              <form action="{{ route('promotion-update') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                <!-- ous -->

                <div class="form-group row">

         

                    <div class="col-md-8">
                        <label>Nombre</label>
                        <div class="input-group">
                            <input disabled value="{{ $promotion->name }}" type="text" name="name" class="form-control" required>
                            <div class="invalid-feedback">Por favor proporcione un nombre</div>
                        </div>
                    </div>
 
                    <div class="col-md-2">
                        <label>Cantidad de Producto</label>
                        <div class="input-group">
                            <input readonly type="number" value="{{ $promotion->product_quantity }}" name="product_quantity" id="product_quantity" class="form-control text-center" required>
                            <div class="invalid-feedback">Por favor proporcione una cantidad de producto</div>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <label>Cantidad a Pagar </label>
                        <div class="input-group">
                            <input readonly type="number" value="{{ $promotion->amount_payment }}"  name="amount_payment" id="amount_payment" class="form-control text-center" required>
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
                           
                        </div>
                    </div>
                    <!-- controls -->
                </div>

                <div class="form-group row">

                   
                    <div class="col-md-12">
                        <label>Estado</label>
                        <select disabled name="state" class="form-control" required>
                            <option {{ $promotion->state == 1 ? 'selected':'' }} value="1">Activo</option>
                            <option {{ $promotion->state == 0 ? 'selected':'' }} value="0">Inactivo</option>
                        </select>
                    </div>

                </div>


         

                <div class="form-group">
                    <input type="hidden" name="_token" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" id="id_promotion" name="id_promotion" value="{{ $promotion->id_promotion }}">
                    <a href="{{ route('promotions') }}" class="btn btn-primary">REGRESAR</a>
                    
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
<script>

</script>
@endsection