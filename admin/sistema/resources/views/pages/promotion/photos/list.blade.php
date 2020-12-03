@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="text-right mb-2">
            <a onclick="fnc_modal({{ $promotion->id_promotion}})" class="btn btn-dark text-white btn-sm text-uppercase"><i class="fas fa-plus"></i> Agregar</a>
        </div>
        <div class="ms-panel">
            <div class="ms-panel-header">
            <h6>{{ $promotion->name}} - Galeria de Fotos</h6>
            </div>
            <div class="ms-panel-body">
           
            <div class="row">
               @foreach ($promotion_photos as $photo)
                   <div class="col-md-3">
                        <img src="{{ url('/').$photo->image }} " class="img">    
                        <a  href="{{ route('promotion-photo-delete', ['id' => $photo->id_promotion_photo]) }}" class="btn btn-danger btn-sm form-control">ELIMINAR</a>
                   </div>
               @endforeach
            </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Subir Imagenes</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('promotion-photo-store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
        <div class="modal-body">
            
                <div class="form-group row">
                    <div class="col-md-12">
                        <label>Seleccione las imagenes</label>
                        <div class="input-group">
                            <input type="file" name="image[]" multiple  required class="form-control">
                            <input type="hidden" name="_token" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" id="id_promotion" name="id_promotion" required class="form-control">
                            <div class="invalid-feedback">Por favor seleccione las imagenes</div>
                        </div>
                    </div>

                </div>

                
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn  btn-primary">Save changes</button>
        </div>
    </form>
      </div>
    </div>
  </div>
@endsection
@section('scripts')

<script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
<script>



function fnc_modal(id_promotion) {

   $('#exampleModalLong').modal();
   $('#id_promotion').val(id_promotion);
   
}


</script>
@endsection