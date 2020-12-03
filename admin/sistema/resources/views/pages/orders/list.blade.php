@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
      
        <div class="ms-panel">
            <div class="ms-panel-header">
                <h6>Pedidos</h6>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="data-table" class="table w-100 thead-primary">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Nro Pedido</th>
                                <th class="text-center">Cliente</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">Fecha</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $index => $be)
                            <tr>
                                <td class="text-center">{{ $index+1 }}</td>
                                <td class="text-center">{{ $be->id_order }} </td>
                                <td>{{ $be->name." ".$be->last_name }}</td>
                                <td class="text-right">{{ $be->total }}</td>
                                <td class="text-center">{{ $be->created_at }}</td>
                  
                                <td class="text-center">
                                    @if($be->state == 1)
                                    <span class="badge badge-warning m-0">Pendiente</span>
                                    @endif
                                    @if($be->state == 2)
                                    <span class="badge badge-success m-0">Finalizado</span>
                                    @endif
                                    @if($be->state == 0)
                                    <span class="badge badge-danger m-0">Inactivo</span>
                                    @endif
                                
                                </td>
                                <td class="text-center">

                                    <a href="{{ route('order-show', ['id' => $be->id_order]) }}" alt="Editar"><i class="fas fa-eye text-success"></i></a>
                                    
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
@endsection