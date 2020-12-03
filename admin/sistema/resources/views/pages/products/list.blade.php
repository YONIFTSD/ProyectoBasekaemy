@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="text-right mb-2">
            <a href="{{ route('product-add') }}" class="btn btn-dark btn-sm text-uppercase"><i class="fas fa-plus"></i> Agregar</a>
        </div>
        <div class="ms-panel">
            <div class="ms-panel-header">
                <h6>Productos</h6>
            </div>
            <div class="ms-panel-body">
            <form action="{{ route('product-search') }}" method="GET" class="class="form-inline"">
                <div class=" row">
                    <div class="col-md-8">
                        
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                           
                            <input class="form-control" placeholder="Buscar productos" required type="text" name="q" value="{{ isset($_GET['q']) ? $_GET['q'] : ''  }}">
                            
                            <div class="input-group-prepend">
                                <button class="btn btn-sm btn-info" type="submit">BUSCAR</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

                <div class="table-responsive">
                    <table id="data-tabled" class="table w-100 thead-primary">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Imagen</th>
                                <th class="text-center">Categoria</th>
                                <th class="text-center">Codigo</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Destacado</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $index => $be)
                            <tr>
                                <td class="text-center">{{ $index+1 }}</td>
                                <td>
                                    <img src="{{ url('/').$be->image }} " class="img">    
                                </td>
                                <td>{{ $be->name_category }} </td>
                                
                                <td>{{ $be->code }} </td>
                                <td>{{ $be->name }} </td>
                                <td class="text-center">
                                    <a onclick="fnc_destacar( {{ $be->id_product }} )" title="Destacar">
                                    <i id="outstanding{{ $be->id_product }}" class="fas fa-star {{ $be->outstanding == 1 ? 'text-warning':'text-dark' }}"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    @if($be->state == 1)
                                    <span class="badge badge-success m-0">Activo</span>
                                    @else
                                    <span class="badge badge-danger m-0">Inactivo</span>
                                    @endif
                                </td>
                                <td class="text-center">

                                    <a href="{{ route('product-show', ['id' => $be->id_product]) }}" alt="Ver"><i class="fas fa-eye text-warning"></i></a>
                                    <a href="{{ route('product-edit', ['id' => $be->id_product]) }}" alt="Editar"><i class="fas fa-edit text-success"></i></a>
                                    <a href="{{ route('product-photos', ['id' => $be->id_product]) }}" alt="Fotos"><i class="fas fa-images text-info"></i></a>
                                    <a onclick="fnc_delete( {{ $be->id_product }} )" alt="Eliminar"><i class="fas fa-trash text-danger"></i></a>
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    {{ $products->links() }}
                    
                    
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
        text: "Esta seguro de eliminar el producto ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, estoy de acuerdo!'
        }).then((result) => {
        if (result.value) {
            window.location.href = APP_URL+"/product/delete/"+id;
        }
    })
}


function fnc_destacar(id) {

    $.ajax({
        data:  '',
        url:   APP_URL+'/product/outstanding/'+id,
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