@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="text-right mb-2">
            <a href="{{ route('client-add') }}" class="btn btn-dark btn-sm text-uppercase"><i class="fas fa-plus"></i> Agregar</a>
        </div>
        <div class="ms-panel">
            <div class="ms-panel-header">
                <h6>Clientes</h6>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="data-table" class="table w-100 thead-primary">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Nro Documento</th>
                                <th class="text-center">Nombres</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clients as $index => $be)
                            <tr>
                                <td class="text-center">{{ $index+1 }}</td>
                                <td>{{ $be->document_type == 1 ? 'DNI':'RUC' }} {{ $be->document_number }} </td>
                                <td>{{ $be->name }} {{ $be->last_name }} </td>
                                <td>{{ $be->email }}</td>
                  
                                <td class="text-center">
                                    @if($be->state == 1)
                                    <span class="badge badge-success m-0">Activo</span>
                                    @else
                                    <span class="badge badge-danger m-0">Inactivo</span>
                                    @endif
                                </td>
                                <td class="text-center">

                                    <a href="{{ route('client-show', ['id' => $be->id_client]) }}" alt="Ver"><i class="fas fa-eye text-warning"></i></a>
                                    <a href="{{ route('client-edit', ['id' => $be->id_client]) }}" alt="Editar"><i class="fas fa-edit text-success"></i></a>
                                    <a onclick="fnc_delete( {{ $be->id_client }} )" alt="Eliminar"><i class="fas fa-trash text-danger"></i></a>
                                    
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
        title: 'Clientes',
        text: "Esta seguro de eliminar el cliente ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, estoy de acuerdo!'
        }).then((result) => {
        if (result.value) {
            window.location.href = APP_URL+"/client/delete/"+id;
        }
    })
}

</script>
@endsection