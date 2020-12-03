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
                                        <img class="img-fluid" src="http://goodyear.cabanasenlaplaya.com/admin/{{ $product->image }}" alt="{{ $product->nombre }}" />
                                    </div>
                                    @foreach($product_photos as $photo)
                                    <div>
                                        <img class="img-fluid" src="http://goodyear.cabanasenlaplaya.com/admin/{{ $photo->image }}" alt="{{ $product->nombre }}" />
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
                                        <img class="w-100"  src="http://goodyear.cabanasenlaplaya.com/admin/{{ $product->image }}"  alt="{{ $product->name }}" />
                                    </div>
                                    @foreach($product_photos as $photo)
                                    <div>
                                        <img class="w-100" src="http://goodyear.cabanasenlaplaya.com/admin/{{ $photo->image }}" alt="{{ $product->name }}" />
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
							<h1 class="product-detail-title font-title">{{ $product->name }}</h1>
							<div class="aditional-info d-flex pb-3 align-items-center font-helvetica">
								<span class="code">Código de producto: <span class="skuReference">{{ $product->code }}</span></span>
							</div>
                            <div class="product_price">
                                @if($product->regular_price)
                                <span class="old_price"><span>S/ </span>{{ number_format($product->regular_price, 2) }}</span>
                                @endif
                                <span class="current_price"><span>S/ </span>{{ number_format($product->online_price, 2) }}</span>
                            </div>
                            <div class="w-100 mb-4 pb-1">
                                <div class="d-flex align-items-center">
                                    <div class="stock-text font-700 font-title text-uppercase">Talla</div>
                                    <div class=" font-title ml-3">
                                        <select name="size" id="size" class="form-control">
                                            <option value="">-- Seleccione --</option>
                                            <option value="38">38</option>
                                            <option value="39">39</option>
                                            <option value="40">40</option>
                                            <option value="41">41</option>
                                            <option value="42">42</option>
                                            <option value="43">43</option>
                                            <option value="44">44</option>
                                            <option value="45">45</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="product_variant quantity">
                                <label>Cantidad</label> 
                                <input id="qty" min="1" max="100" value="1" type="number">
                                <button class="button text-uppercase add-to-cart-detail add_to_cart_detail" data-code="{{ $product->id_product }}">Agregar al carrito</button>
                                <div class="loading-box d-flex justify-content-center">
                                    <div class="dot-typing spinner-loading d-none"></div>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="priduct_social pt-2">
                            <ul class="ul-list">
                                <li class="ico-facebook"><a href="https://www.facebook.com/Goodyearfootwearperuoficial" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>           
                                <li class="ico-instagram"><a href="https://www.instagram.com/goodyearfootwearperu/" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a></li>           
                                <li class="ico-whatsapp-color"><a href="https://wa.link/0mt39u" target="_blank" title="WhatsApp"><i class="fab fa-whatsapp"></i></a></li>
                                
                            </ul>      
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>
    <!--product details end-->
</section>
@if (count($product_colors) > 0)
<section class="section-default bg-white pt-5 pb-5">
    <div class="container-lg">
        <div class="text-center pb-4">
            <h1 class="section-title font-900 font-title text-uppercase">Variedad de Colores </h1>
        </div>
        <div class="row">
            @for ($i = 0; $i < count($product_colors); $i++)
            @php
            $product = $product_colors[$i];
            @endphp
            <div class="col-sm-6 col-md-4 col-lg-3 d-flex align-items-stretch my-3">
                @include('components.product')
            </div>   
            @endfor
        </div>
    </div>
</section>
@endif

<section class="section-default bg-white pt-5 pb-5">
    <div class="container-lg">
        <div class="text-center pb-4">
            <h1 class="section-title font-900 font-title text-uppercase">Productos Relacionados</h1>
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