@extends('layouts.default')
@section('title', 'Mi Carrito')
@section('content')
@if(!$carrito)
<section class="section-default py-5">
    <div class="container-lg">
        <div class="w-100">
        <!-- cart empty-->
        <div class="w-100 py-3">
            <div class="container">   
                <div class="row">
                    <div class="col-12">
                        <div class="w-100 text-center">
                            <div class="pb-4">
                                <img class="img-fluid" width="150px" src="{{ asset('assets/img/resources/cart-empty.png') }}">
                            </div>
                            <h3 class="font-title font-700">Tu carrito está vacío</h3>
                            <div class="mt-5">
                                <a href="{{ url('productos') }}" class="btn btn-main text-uppercase">Ir a comprar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
        <!-- cart empty--> 
        </div>
    </div>
</section>
@else
<section class="section-default py-5">
    <div class="container-lg">
        <div class="w-100">
            <div class="text-center pb-2">
                <h1 class="section-title font-900 font-title text-uppercase">Mi Carrito</h1>
            </div>
            <!-- cart -->
            <div class="shopping_cart_area pt-30">
                <div class="container">  
                    <form> 
                        <div class="row">
                            <div class="col-12">
                                <div class="table_desc">
                                    <div id="block_detail_cart" class="cart_page table-responsive">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th class="product_remove"></th>
                                                    <th class="product_thumb">Imagen</th>
                                                    <th class="product_name">Producto</th>
                                                    <th class="product_name">Talla</th>
                                                    <th class="product-price">Precio</th>
                                                    <th class="product_quantity">Cantidad</th>
                                                    <th class="product_total">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
              
                                                @for ($i = 0; $i < count($carrito); $i++)
                                                @if ($carrito[$i]['state'] == 1)
                                                <tr>
                                                    <td class="product_remove"><a href="#" class="item-from-remove remove_from_cart" data-size="{{ $carrito[$i]['size'] }}" data-row="{{ $carrito[$i]['id_product'] }}" title="Eliminar"><i class="fas fa-trash-alt"></i></a></td>
                                                    <td class="product_thumb">
                                                        <a href="{{ url('productos/'.$carrito[$i]['id_product'].'/'.str_slug($carrito[$i]['name']).'/p') }}">
                                                            <img class="img-fluid" src="http://goodyear.cabanasenlaplaya.com/admin/{{ $carrito[$i]['image'] }}" alt="{{$carrito[$i]['name'] }}" title="{{$carrito[$i]['name'] }}">
                                                        </a>
                                                    </td>
                                                    <td class="product_name text-left"><a href="{{ url('productos/'.$carrito[$i]['id_product'].'/'.str_slug($carrito[$i]['name']).'/p') }}">{{ $carrito[$i]['name'] }}</a></td>
                                                    <td class="product_name text-center">{{ $carrito[$i]['size'] }}</td>
                                                    <td class="product-price"><span>S/ </span>{{ $carrito[$i]['unit_price'] }}</td>
                                                    <td class="product_quantity text-center"><div class="d-flex justify-content-center align-items-center">
                                                        <input id="cquatity" class="update_to_cart_input" 
                                                        data-code="{{ $carrito[$i]['id_product'] }}" 
                                                        data-size="{{ $carrito[$i]['size'] }}" 
                                                        min="1" max="100" value="{{ $carrito[$i]['quantity'] }}" type="number"></div></td>
                                                    <td class="product_total"><span>S/ </span><span id="price_total{{ $carrito[$i]['id_product'] }}">{{  $carrito[$i]['total_price'] }}</span></td>
                                                    
                                                </tr>
                                                @endif
                                                @endfor
                                            </tbody>
                                        </table>   
							        </div> 
							        <!-- update cart -->
							        <div></div>   
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
                                        <h3>Total de Pedido</h3>
                                        <div class="coupon_inner">
                                            <div class="cart_subtotal">
                                                <p>Subtotal</p>
                                                <p class="cart_amount"><span class="m-0">S/ </span><span id="subtotal">{{ $sumary['subtotal'] }}</span></p>
                                            </div>
                                            <hr>
                                            <div class="cart_subtotal">
                                                <p>Descuento</p>
                                                <p class="cart_amount"><span class="m-0">S/ </span><span id="discount">{{ $sumary['discount'] }}</span></p>
                                            </div>
                                            <hr>
                                            <div class="cart_subtotal">
                                                <p>Total</p>
                                                <p class="cart_amount total"><span class="m-0">S/ </span><span id="total">{{ $sumary['total'] }}</span></p>
                                            </div>
                                            <div class="checkout_btn">
                                                <a href="{{ url('cart/checkout') }}" class="text-uppercase"><i class="fas fa-shopping-cart mr-2"></i>Realizar Pedido</a>
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
            <!-- cart -->
        </div>
    </div>
</section>
@endif
@endsection
