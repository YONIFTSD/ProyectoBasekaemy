@extends('layouts.default')
@section('title', 'Mis Pedidos')
@section('content')
<section class="main_content_area pt-30">
    <div class="container">   
        <div class="account_dashboard">
            <div class="row">
                <!-- col -->
                <div class="col-sm-12 col-md-3 col-lg-3">
                    @include('auth.blocks.nav') 
                </div>
                <!-- col -->
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <!-- Tab panes -->
                    <div class="tab-content dashboard_content">
                        <!-- tab -->
                        <div class="w-100">
                            <h3>Pedidos</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Pedido</th>
                                            <th>Fecha</th>
                                            <th>Estado</th>
                                            <th>Total</th>
                                            <th>Acciones</th>	 	 	 	
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order)
                                        <tr>
                                            <td>{{ $order->id_order }}</td>
                                            <td>{{ $order->created_at }}</td>
                                            <td>
                                            @if($order->state == 1)
                                            <span class="state-r s-warning">Pendiente</span>
                                            @elseif($order->state == 2)
                                            <span class="state-r s-success">Completado</span>
                                            @elseif($order->state == 3)
                                            <span class="state-r s-danger">Anulado</span>
                                            @endif
                                            </td>
                                            <td><span>S/. </span>{{ number_format($order->total, 2) }}</td>
                                            <td><a href="{{ url('my-account/orders/'.$order->id_order) }}" class="view">Ver Detalle</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- tab -->                    
                    </div>
                </div>
            </div>
        </div>  
    </div>        	
</section>
@endsection