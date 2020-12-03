@extends('layouts.default')
@section('title', 'Mi Pedido')
@section('content')
<section class="main_content_area pt-30">
    <div class="container">   
        


<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul class="ul-list">
                            <li><a href="{{ url('my-account') }}">Mi cuenta</a></li>
                            <li>Pedido #{{ $order->id_order }}</li>
                            <li>Estado: 
                            @if($order->state == 1)
                            <span class="state-r s-warning">Pendiente</span>
                            @elseif($order->state == 2)
                            <span class="state-r s-success">Completado</span>
                            @elseif($order->state == 0)
                            <span class="state-r s-danger">Anulado</span>
                            @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->


<!--shopping cart area start -->
<div class="shopping_cart_area pt-4 bg-white">
        <div class="container">  
            <form action="#"> 
                <div class="row">
                    <div class="col-12">


                        <strong class="state-r">Fecha : </strong><span>{{ $order->created_at }}</span> <br>
                        @if ($coupon)
                        <strong class="state-r">Cúpon : </strong><span>{{ $coupon->code." - ".$coupon->name }}</span> <br>
                        @endif
                        @if($order->payment_type == 1)
                        <span class="state-r">Medio de pago : </span> <span>Tarjeta</span>
                        @elseif($order->payment_type == 2)
                        <span class="state-r">Medio de pago : </span> <span>Transferencia bancaria</span>
                        @elseif($order->payment_type == 3)
                        <span class="state-r">Medio de pago : </span> <span>Yape</span>
                        @elseif($order->payment_type == 4)
                        <span class="state-r">Medio de pago : </span> <span>Culqi</span>
                        @endif
                        <br>
                        @if ($order->payment_status == 1)
                            <span class="state-r">Estado de pago :</span> <span class="state-r s-success">Pagado</span>                                
                        @else
                            <span class="state-r">Estado de pago :</span> <span class="state-r s-danger">Pendiente</span>    
                        @endif
                        
                        
                        
                        <br>
                        <div class="table_desc">
                            <div class="cart_page table-responsive">
                                <table>
                            <thead>
                                <tr>
                                    <th class="product_name">Producto</th>
                                    <th class="product_name">Talla</th>
                                    <th class="product_quantity">Cantidad</th>
                                    <th class="product-price">Precio</th>
                                    <th class="product_total">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($order_detail as $detail)
                                <tr>
                                    <td class="product_name text-left"  >{{ $detail->name }}</td>
                                    <td class="product_name text-center"  >{{ $detail->size }}</td>
                                    <td class="product_quantity"> {{ $detail->quantity }}</td>
                                    <td class="product-price text-right"><span>S/.{{ $detail->unit_price }}</span></td>
                                    <td class="product_total text-right"><span>S/. {{ $detail->total_price }}</span></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>   
                            </div>      
                        </div>
                     </div>
                 </div>
                 <!--coupon code area start-->
                <div class="coupon_area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code right">
                                <h3>Total de pedido</h3>
                                <div class="coupon_inner">
                                   <div class="cart_subtotal">
                                       <p>Subtotal</p>
                                       <p class="cart_amount"><span class="m-0">S/. </span>{{ $order->subtotal }}</p>
                                   </div>
                                   <hr>
                                   <div class="cart_subtotal">
                                    <p>Descuento</p>
                                    <p class="cart_amount"><span class="m-0">S/. </span>{{ $order->discount }}</p>
                                </div>
                                <hr>
                                   <div class="cart_subtotal">
                                       <p>Total</p>
                                       <p class="cart_amount total"><span class="m-0">S/. </span>{{ $order->total }}</p>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--coupon code area end-->
            </form> 
        </div>     
    </div>
     <!--shopping cart area end -->



    </div>        	
</section>
@endsection