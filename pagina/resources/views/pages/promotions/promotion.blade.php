@extends('layouts.default')

@section('content')
<section class="section-default">
    <!--product details start-->
    <div class="product_details pt-5">
        <div class="container-lg">
            <div class="row">
                <div class="col-lg-7 col-md-6">
                    <div class="row no-gutters align-items-center">
                        <div class="col-md-0 col-lg-1 d-none d-lg-block">
                            <!-- slider -->
                            <div class="thumb-s">
                                <div class="slider slider-nav">
                                    <div>
                                        <img class="img-fluid" src="http://goodyear.cabanasenlaplaya.com/admin/{{ $promotion->image }}" alt="{{ $promotion->nombre }}" />
                                    </div>
                                    @foreach($promotion_photos as $photo)
                                    <div>
                                        <img class="img-fluid" src="http://goodyear.cabanasenlaplaya.com/admin/{{ $photo->image }}" alt="{{ $promotion->nombre }}" />
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- slider -->
                        </div>
                        <!-- c -->
                        <div class="col-md-12 col-lg-11">
                            <!-- slider -->
                            <div>
                                <div class="slider slider-for" id="image-viewer">
                                    <div>
                                        <img class="w-100"  src="http://goodyear.cabanasenlaplaya.com/admin/{{ $promotion->image }}"  alt="{{ $promotion->name }}" />
                                    </div>
                                    @foreach($promotion_photos as $photo)
                                    <div>
                                        <img class="w-100" src="http://goodyear.cabanasenlaplaya.com/admin/{{ $photo->image }}" alt="{{ $promotion->name }}" />
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- slider -->
                            <div class="text-center">
                                <button type="button" id="image-viewerbutton" class="s-btn-zoom" data-zoomin-text="Zoom in" data-zoomout-text="Zoom out" zoomtype="in"><span>Zoom in</span></button>
                            </div>
                        </div>
                        <!-- c -->
                    </div>
                    <!-- row -->
                </div>
                <!-- col -->
                <div class="col-lg-5 col-md-6 mt-5 mt-lg-0">
                    <div class="product_d_right">
                       <form action="#">
							<h1 class="product-detail-title font-title">{{ $promotion->name }}</h1>
							<div class="aditional-info d-flex pb-3 align-items-center">
								<span class="code">Código de promoción: <span class="skuReference">{{ $promotion->code }}</span></span>
							</div>
                            <div class="product_price">
                                @if($promotion->regular_price)
                                <span class="old_price"><span>S/ </span>{{ number_format($promotion->regular_price, 2) }}</span>
                                @endif
                                <span class="current_price"><span>S/ </span>{{ number_format($promotion->online_price, 2) }}</span>
                            </div>
                            <div class="w-100 mb-4 pb-1">
                                <div class="d-flex align-items-center">
                                    <div class="stock-text font-700 font-title text-uppercase">Stock Disponible</div>
                                    <div class="stock-value font-700 font-title ml-3">{{ $promotion->stock ? $promotion->stock : 0 }} {{ $promotion->stock == 1 ? 'Unidad' : 'Unidades'}}</div>
                                </div>
                            </div>
                            <div class="product_variant quantity">
                                <label>Cantidad</label> 
                                <input id="qty" min="1" max="100" value="1" type="number">
                                <button class="button text-uppercase add-to-cart-detail add_to_cart_detail" type_detail="promotion" data-code="{{ $promotion->id_promotion }}">Agregar al carrito</button>
                                <div class="loading-box d-flex justify-content-center">
                                    <div class="dot-typing spinner-loading d-none"></div>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <!-- p -->
                        <div>
                            <!-- t -->
                            <div class="tabs-p nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-link active" id="nav-tab-1" data-toggle="tab" href="#nav-one" role="tab" aria-controls="nav-one" aria-selected="true">Pago con Tarjeta</a>
                                <a class="nav-link" id="nav-tab-2" data-toggle="tab" href="#nav-two" role="tab" aria-controls="nav-two" aria-selected="false">Pago con Transferencias Bancarias</a>
                            </div>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-one" role="tabpanel" aria-labelledby="nav-tab-1">
                                    <div class="py-3">
                                        <div class="row align-items-center">
                                            <div class="col-md-6">
                                                <a href="{{ $promotion->link_visa }}" target="_blank">
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
                            </div>
                            <!-- t -->
                        </div>
                        <!-- p -->
                        <hr>
                        <div class="priduct_social pt-2">
                            <ul class="ul-list">
                                <li class="ico-facebook"><a href="https://www.facebook.com/Goodyearfootwearperuoficial" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>           
                                <li class="ico-whatsapp-color"><a href="https://wa.me/5198673589" target="_blank" title="WhatsApp"><i class="fab fa-whatsapp"></i></a></li>
                            </ul>      
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>
    <!--product details end-->
</section>
<section class="section-product-info">
    <div class="container-lg">
        <!-- accordion -->
        <div class="accordion accordion-info" id="accordionpinfo">
            <!-- i -->
            <div class="accordion-item accordion-product-info accordion-item-collapsed">
                <div class="accordion-item-title" id="Adescription" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" title="Click para expandir.">
                    <span>Descripción</span>
                    <div class="plus-minus-toggle accordion-item-collapsed"></div>
                    <div class="toggle-message">VER MÁS</div>
                </div>
                <div id="collapseOne" class="collapse accordion-item-wrapper" aria-labelledby="Adescription">
                    <div class="accordion-item-content">
                        <div class="table-responsive">
                        {!! $promotion->description !!}
                        </div>
                    </div>
                </div>
            </div>
            <!-- i -->
            <div class="accordion-item accordion-product-info accordion-item-collapsed">
                <div class="accordion-item-title" id="AEspecificaciones" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" title="Click para expandir.">
                    <span>Especificaciones</span>
                    <div class="plus-minus-toggle accordion-item-collapsed"></div>
                    <div class="toggle-message">VER MÁS</div>
                </div>
                <div id="collapseTwo" class="collapse accordion-item-wrapper" aria-labelledby="AEspecificaciones">
                    <div class="accordion-item-content">
                        <div class="table-responsive">
                        {!! $promotion->specification !!}
                        </div>
                    </div>
                </div>
            </div>
            <!-- i -->
        </div>
        <!-- accordion -->
    </div>
</section>

<section class="section-default bg-white pt-5 pb-5">
    <div class="container-lg">
        <div class="text-center pb-4">
            <h1 class="section-title font-900 font-title text-uppercase">Promociones Relacionados</h1>
        </div>
        <div class="row">
            @foreach($relateds as $related)
            @php
            $product = $related;
            @endphp
            <div class="col-sm-6 col-md-4 col-lg-3 d-flex align-items-stretch my-3">
                @include('components.product')
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
@section('scripts')
<link href="{{ url('assets/slick/slick.css') }}" type="text/css" rel="stylesheet">
<link href="{{ url('assets/viewer/viewer.min.css') }}" type="text/css" rel="stylesheet">
<link href="{{ url('assets/swiper/css/swiper.min.css') }}" type="text/css" rel="stylesheet">
<script src="{{ asset('assets/slick/slick.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/viewer/viewer.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/swiper/js/swiper.min.js') }}" type="text/javascript"></script>
<script>
$('.slider-for').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  dots: false,
  asNavFor: '.slider-nav',
  autoplay: true,
  responsive: [
        {
            breakpoint: 1024,
            settings: {
                dots: true
            }
        },
            {
            breakpoint: 600,
            settings: {
                dots: true
            }
        },
            {
            breakpoint: 480,
            settings: {
                dots: true
            }
        }
    ]
});
$('.slider-nav').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  asNavFor: '.slider-for',
  dots: false,
  centerMode: true,
  focusOnSelect: true,
  vertical: true,
  verticalSwiping: true,
  arrows: false
});
$(document).on('click', '#image-viewerbutton', function(e) {
    e.preventDefault();
    var gallery = new Viewer(document.getElementById("image-viewer"), {
        movable:true,
        hidden: function () {
            gallery.destroy();
        },
    });
    gallery.show();
})
var swiper = new Swiper('.swiper-features', {
    slidesPerView: 3,
    spaceBetween: 30,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        640: {
          slidesPerView: 1,
          spaceBetween: 0,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 15,
        },
        1024: {
          slidesPerView: 2,
          spaceBetween: 25,
        },
    }
});
</script>
@endsection