@extends('layouts.default')

@section('content')
<section class="section-default py-5">
    <div class="container-lg">
        <div class="w-100">
            <!-- c -->
            <div class="checkout_form">
                <form action="{{ url('cart/send-order') }}" method="POST">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
							<h3>Identificación</h3>
							<div class="pb-4">
								<small class="text-info-small">Solicitamos únicamente la información esencial para la finalización del pedido. <b>Actualice los datos en su <a href="{{ url('my-account/edit') }}" class="color-main">Panel de Usuario.</a></b></small>
							</div>
                            <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <label>Nombre <span>*</span></label>
                                    <input type="text" class="form-control form-d" value="{{ auth()->user()->name }}" required readonly>    
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <label>Apellidos <span>*</span></label>
                                    <input type="text" class="form-control form-d" value="{{ auth()->user()->last_name }}" required readonly> 
								</div>
								
								<div class="col-lg-6 mb-4">
                                    <label>Tipo Documento <span>*</span></label>
                                    <select class="form-control form-d" required readonly>
										<option value="DNI">DNI</option>
									</select>
                                </div> 
                                 <div class="col-lg-6 mb-4">
                                    <label>Documento <span>*</span></label>
                                    <input type="text" class="form-control form-d" value="{{ auth()->user()->document_number }}" required readonly> 
								</div> 
								
								<div class="col-lg-12 mb-4">
                                    <label>Correo electrónico <span>*</span></label>
                                    <input type="email" class="form-control form-d" value="{{ auth()->user()->email }}" required readonly> 
								</div> 
								
								<div class="col-lg-12 mb-4">
                                    <label>Teléfono <span>*</span></label>
                                    <input type="text" class="form-control form-d" value="{{ auth()->user()->phone }}" required readonly> 
                                </div> 	    	    	    	    	    
                            </div>
                        </div>
                        <!-- col -->
                        <div class="col-lg-6 col-md-6">
                            <h3>¿Tienes un Cupón o vale de descuento?</h3> 
                            <div class="form-group row p-2">
                                <div class="col-md-8">
                                    <input type="text" id="coupon" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <button type="button" id="btn_coupon" class="btn_coupon btn-warning form-control ">Aplicar</button>
                                </div>
                            </div>

                            <h3>Resumen del Pedido</h3> 
                            <div class="order_table table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @for ($i = 0; $i < count($carrito); $i++)
                                        @if ($carrito[$i]['state'] == 1)
                                        <tr>
                                            <td class="text-left">{{ $carrito[$i]['name'] }}<strong> × {{ $carrito[$i]['quantity'] }}</strong></td>
                                            <td class="text-right"><span>S/ </span>{{ $carrito[$i]['total_price'] }}</td>
                                        </tr> 
                                        @endif
                                        @endfor
                                        
                         
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th class="text-right">Subtotal</th>
                                            <td class="text-right"><span>S/ </span> <span id="subtotal">{{ $sumary['subtotal'] }}</span></td>
                                        </tr>
                                        <tr>
                                            <th class="text-right">Descuento</th>
                                            <td class="text-right"><span>S/ </span> <span  id="discount">{{ $sumary['discount'] }}</span></td>
                                        </tr>
                                        <tr class="order_total">
                                            <th class="text-right">Total del Pedido</th>
                                            <td class="text-right"><strong><span>S/ </span><span id="total">{{ $sumary['total'] }}</span> </strong></td>
                                        </tr>
                                        <input type="hidden" value="" name="id_coupon" id="id_coupon">
                                        
                                    </tfoot>
                                </table>     
                            </div>

                            <div class="tabs-p nav nav-tabs" id="nav-tab" role="tablist">
                                <a data-value="1" class="nav-link-value nav-link active" id="nav-tab-1" data-toggle="tab" href="#nav-one" role="tab" aria-controls="nav-one" aria-selected="true">Pago con Tarjeta</a>
                                <a data-value="2" class="nav-link-value nav-link" id="nav-tab-2" data-toggle="tab" href="#nav-two" role="tab" aria-controls="nav-two" aria-selected="false">Pago con Transferencias Bancarias</a>
                                <a data-value="3" class="nav-link-value nav-link" id="nav-tab-3" data-toggle="tab" href="#nav-three" role="tab" aria-controls="nav-three" aria-selected="false">Pago con Yape</a>
                                <a data-value="4" class="nav-link-value nav-link" id="nav-tab-4" data-toggle="tab" href="#nav-four" role="tab" aria-controls="nav-four" aria-selected="false">Pago con Culqi</a>
                            </div>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-one" role="tabpanel" aria-labelledby="nav-tab-1">
                                    <div class="py-3">
                                        <div class="row align-items-center">
                                            <div class="col-md-6">
                                                <a href="" target="_blank">
                                                    <img class="img-fluid" src="{{ asset('assets/img/resources/pagar-con-visa.jpg') }}">
                                                </a>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="text-mm font-title font-700"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-two" role="tabpanel" aria-labelledby="nav-tab-2">
                                    <div class="py-3">
                                        <div class="row align-items-center">
                                            <div class="col-md-6">
                                                <img class="img-fluid" src="{{ asset('assets/img/resources/scotiabank.png') }}">
                                            </div>
                                            <div class="col-md-6">
                                                <div class="text-mm font-title font-700">
                                                    <div>Nombre: </div>
													<div>Cuenta en Soles</div>
                                                    <div>N° de Cuenta: <strong>00000000</strong></div>
													<div>CCI: <strong>009 000 000000 000</strong></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="nav-three" role="tabpanel" aria-labelledby="nav-tab-3">
                                    <div class="py-3">
                                        <div class="row align-items-center">
                                            <div class="col-md-6 text-center">
                                                <img class="img-fluid" src="{{ asset('assets/img/resources/yape.png') }}">
                                            </div>
                                            <div class="col-md-6">
                                                <div class="text-mm font-title font-700">
                                                    <div>Nombre: </div>
													<div>Cuenta en Soles</div>
                                                    <div>N° de Cuenta: <strong>00000000</strong></div>
													<div>CCI: <strong>009 000 000000 000</strong></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="nav-four" role="tabpanel" aria-labelledby="nav-tab-4">
                                    <div class="py-3">
                                        <div class="row align-items-center">
                                            <div class="col-md-12 text-center">
                                                <img class="img-fluid text-center" src="{{ asset('assets/img/resources/culqi.jpg') }}">
                                            </div>
                                         
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="payment_method">
								<hr>
                                <div class="order_button text-center">
                                    {{ csrf_field() }}
                                    <input type="hidden" class="form-control" id="payment_type" value="1">
                                    <button type="button" id="btn-finalize-order"  class="text-uppercase">Finalizar Pedido</button> 
                                </div>    
                            </div>      
                        </div>
                    </div> 
                </form> 
            </div> 
            <!-- c -->
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script src="https://checkout.culqi.com/js/v3"></script>
<script src="{{ asset('assets/js/payment.js') }}"></script>
<script>
(function($){
    "use strict";
    $(document).on('click', '.btn_coupon', function(e){
    e.preventDefault();
    ValidateCupon();
    });

    function ValidateCupon() {
    
    var _url = APP_URL+'/cart/coupon';
    var coupon = $('#coupon').val();

    $.ajax({
        data:  { coupon : coupon},
        url:   _url,
        type:  'GET',
        dataType: 'json',
        beforeSend: function () {
        },
        success:  function (data) {
            $('#id_coupon').val(data.coupon.id_coupon);
            $('#discount').html(data.sumary.discount);
            $('#total').html(data.sumary.total);
        }
    });	
};


})(jQuery);



// function SendPayment(token){
//     var FormPayOrder = $("#FormPayOrder");
//     $.ajax({
//         type: FormPayOrder.attr("method"),
//         url: FormPayOrder.attr("action"),
//         cache: false,
//         data: FormPayOrder.serialize() + "&token=" + token,
//         beforeSend: function(){
//             $("#dimmer_pay").addClass('active');
//         },
//         success: function (response)
//         {
//             if(response.status == 'success'){
//                 Swal.fire({
//                     icon: 'success',
//                     text: response.message,
//                     confirmButtonColor: '#000000',
//                     confirmButtonText: 'OK'
//                   }).then((result) => {
//                     if (result.value) {
//                         window.location.reload();
//                     }
//                   })
//             }else if(response.status == 'failed'){
//                 Swal.fire({
//                     icon: 'warning',
//                     text: response.message,
//                     confirmButtonColor: '#E20D17',
//                     confirmButtonText: 'OK'
//                   }).then((result) => {
//                     if (result.value) {
//                         window.location.reload();
//                     }
//                   })
//             }
//             $("#dimmer_pay").removeClass('active');
//         }
//     });
// };

</script>
@endsection