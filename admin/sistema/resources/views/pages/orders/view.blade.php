@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="ms-panel">
            <div class="ms-panel-header">
            <h6>Pedido N° {{ $order->id_order}}</h6>
            </div>
            <div class="ms-panel-body">
              <form action="" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>

                @php
                    $state = "";
                    $document_type = "";
                    switch ($order->state) {
                        case 1: $state = "Pendiente"; break;
                        case 2: $state = "Realizado"; break;
                        case 0: $state = "Anulado"; break;
                    }

                    switch ($order->document_type) {
                        case 1: $document_type = "DNI"; break;
                        case 6: $document_type = "RUC"; break;
                    }
                @endphp
     
                <div class="form-group">
                    <strong>PEDIDO N° {{ $order->id_order }} / ESTADO: {{ $state }}</strong> <br>
                    @if ($coupon)
                    <strong>Cúpon de Descuento : </strong> <span> {{ $coupon->code." - ".$coupon->name }}</span><br>    
                    @endif
                    <strong>Fecha de Pedido : </strong> <span> {{ $order->created_at }}</span><br>    
                    <strong>Tipo de Documento: </strong> <span> {{ $document_type}}</span><br>
                    <strong>N° de Documento: </strong> <span> {{ $order->document_number}}</span><br>
                    <strong>Cliente: </strong> <span> {{ $order->name}}</span><br>
                    <strong>Correo Electronico: </strong> <span> {{ $order->email}}</span><br>
                    <strong>Teléfono: </strong> <span> {{ $order->phone}}</span><br>
                    <strong>Dirección: </strong> <span> {{ $order->address}}</span><br>
                    <br>
                    @if($order->payment_type == 1)
                    <strong class="state-r">Medio de pago : </strong> <span>Tarjeta</span>
                    @elseif($order->payment_type == 2)
                    <strong class="state-r">Medio de pago : </strong> <span>Transferencia bancaria</span>
                    @elseif($order->payment_type == 3)
                    <strong class="state-r">Medio de pago : </strong> <span>Yape</span>
                    @elseif($order->payment_type == 4)
                    <strong class="state-r">Medio de pago : </strong> <span>Culqi</span>
                    @endif
                    <br>
                    @if ($order->payment_status == 1)
                        <strong class="state-r">Estado de pago :</strong> <span class="state-r s-success">Pagado</span>  <br>                              
                        <strong class="state-r">Id Cargo :</strong> <span class="state-r s-success">{{ $order->c_charge_id }}</span>                                
                    @else
                        <strong class="state-r">Estado de pago :</strong> <span class="state-r s-danger">Pendiente</span>    
                    @endif
                </div>

                <div class="table-responsive">
                    <table id="data-table" class="table w-100 thead-primary">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Código</th>
                                <th class="text-center">Producto</th>
                                <th class="text-center">Talla</th>
                                <th class="text-center">Cantidad</th>
                                <th class="text-center">P. Unit</th>
                                <th class="text-center">P. Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order_detail as $index => $be)
                            <tr>
                                <td class="text-center">{{ $index + 1}}</td>
                                <td class="text-left">{{ $be->code }}</td>
                                <td class="text-left">{{ $be->name }}</td>
                                <td class="text-left">{{ $be->size }}</td>
                                <td class="text-center">{{ $be->quantity }}</td>
                                <td class="text-right">{{ $be->unit_price }}</td>
                                <td class="text-right">{{ $be->total_price }}</td>
                            </tr>  
                            @endforeach
                            <tr>
                                <td class="text-right" colspan="6" ><h6>Subtotal: S/</h6></td>
                                <td class="text-right"><h6>{{ $order->subtotal}}</h6></td>
                            </tr>
                            <tr>
                                <td class="text-right" colspan="6" ><h6>Descuento: S/</h6></td>
                                <td class="text-right"><h6>{{ $order->discount}}</h6></td>
                            </tr>
                            <tr>
                                <td class="text-right" colspan="6" ><h4>Total: S/</h4></td>
                                <td class="text-right"><h4>{{ $order->total}}</h4></td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>

            

           
                <!-- state -->
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id_order" value="{{ $order->id_order }}">
                    @if ($order->state == 1)
                    <a href="{{ route('change-to-confirm', ['id' => $order->id_order]) }}" }}" class="btn btn-success">CONFIRMAR</a>
                    <a href="{{ route('change-to-cancel', ['id' => $order->id_order]) }}" }}" class="btn btn-danger">ANULAR</a>
                    @endif
                    <a href="{{ route('orders') }}" class="btn btn-info">REGRESAR</a>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection