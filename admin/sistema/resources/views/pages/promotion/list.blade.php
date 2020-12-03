@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="text-right mb-2">
            <a href="{{ route('promotion-add') }}" class="btn btn-dark btn-sm text-uppercase"><i class="fas fa-plus"></i> Agregar</a>
        </div>
        <div class="ms-panel">
            <div class="ms-panel-header">
                <h6>Promociones</h6>
            </div>
            <div class="ms-panel-body">
           

                <div class="table-responsive">
                    <table id="data-table" class="table w-100 thead-primary">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Imagen</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Promoción</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($promotions as $index => $be)
                            <tr>
                                <td class="text-center">{{ $index+1 }}</td>
                                <td>
                                    <img src="{{ url('/').$be->image }} " class="img">    
                                </td>
                                <td>{{ $be->name }} </td>
                                <td>{{ $be->product_quantity."x".$be->amount_payment }} </td>
                           
                                <td class="text-center">
                                    @if($be->state == 1)
                                    <span class="badge badge-success m-0">Activo</span>
                                    @else
                                    <span class="badge badge-danger m-0">Inactivo</span>
                                    @endif
                                </td>
                                <td class="text-center">

                                    <a href="{{ route('promotion-show', ['id' => $be->id_promotion]) }}" alt="Ver"><i class="fas fa-eye text-warning"></i></a>
                                    <a href="{{ route('promotion-edit', ['id' => $be->id_promotion]) }}" alt="Editar"><i class="fas fa-edit text-success"></i></a>
                                    <a onclick="fnc_delete( {{ $be->id_promotion }} )" alt="Eliminar"><i class="fas fa-trash text-danger"></i></a>
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('assets/js/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/js/datatables/data-tables.js') }}"></script>
<script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
<script>

function fnc_delete(id) {
    Swal.fire({
        title: 'Producto',
        text: "Esta seguro de eliminar la promoción ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, estoy de acuerdo!'
        }).then((result) => {
        if (result.value) {
            window.location.href = APP_URL+"/promotion/delete/"+id;
        }
    })
}


function fnc_destacar(id) {

    $.ajax({
        data:  '',
        url:   APP_URL+'/promotion/outstanding/'+id,
        type:  'GET',
        dataType: 'json',
        beforeSend: function () {
        },
        success:  function (data) {
            if (data.outstanding == 1) {
                $('#outstanding'+id).removeClass("text-dark");
                $('#outstanding'+id).addClass("text-warning");                
            }else if (data.outstanding == 0) {
                $('#outstanding'+id).removeClass("text-warning");
                $('#outstanding'+id).addClass("text-dark");  
            }
        }
    });	
}


</script>
@endsection