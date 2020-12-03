@extends('layouts.default')

@section('slider')
    @include('includes.slider')
@endsection

@section('content')
@if ($promotion && $promotion->id_promotion > 0)
<section class="bg-promotion mt-1">
    <div class="row text-center">
        <img class="img-fluid img-promociones-lg" src="http://goodyear.cabanasenlaplaya.com/admin{{ $promotion->image }}" alt="">
    </div>
</section>
@endif

<section class="w-100">
    <div class="row no-gutters">
        @foreach($categories_photo as $category)
        <div class="col-md-6">
            <a href="{{ url('productos/'.$category->id_category.'/'.str_slug($category->name).'/c') }}">
                <img class="img-fluid" src="http://goodyear.cabanasenlaplaya.com/admin{{ $category->image }}" alt="{{ $category->name }}" title="{{ $category->name }}" />
            </a>
        </div>
        @endforeach
    </div>
</section>



<section class="section-default py-5">
    <div class="container-lg">
        <div class="w-100">
            <div class="text-center pb-2">
                <h1 class="section-title font-900 font-title text-color-p text-uppercase">Productos Destacados</h1>
            </div>
            <div class="pt-4">
                <!-- products -->
                <div class="row" id="products-slick" data-slick='{"slidesToShow": 4, "slidesToScroll": 4}'>
                    @foreach($products as $product)
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 d-flex align-items-stretch">
                        @include('components.product')
                    </div>
                    @endforeach
                </div>
                <!-- products -->
            </div>
        </div>
    </div>
</section>

<section class="section-default py-5 section-foot-home">
    <div class="container-lg">
        <div class="w-100 text-center">
            <span>Goodyear (and Winged Foot Design) and Blimp Design are trademarks of The Goodyear Tire & Rubber Company used under license by Name of the Company, Address/Country. Copyright 2020 The Goodyear Tire & Rubber Company.</span>
        </div>
    </div>
</section>

@endsection
@section('scripts')
<link href="{{ url('assets/swiper/css/swiper.css') }}" type="text/css" rel="stylesheet">
<link href="{{ url('assets/slick/slick.css') }}" type="text/css" rel="stylesheet">
<script src="{{ asset('assets/swiper/js/swiper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/slick/slick.min.js') }}" type="text/javascript"></script>
<script>
var swiper = new Swiper('.swiper-slider', {
  loop: true,
  autoplay: {
      delay: 5000,
      disableOnInteraction: false,
  },
  navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
  },
});
$('#products-slick').slick({
    autoplay: true,
    arrows: true,
    dots: false,
    autoplaySpeed: 5000,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                arrows: false,
                dots: true
            }
        },
            {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                arrows: false,
                dots: true
            }
        },
            {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                dots: true
            }
        }
    ]
});
//var stHeight = $('.slick-track').height();
//$('.slick-slide').css('height',stHeight + 'px');
$('#brands-slick').slick({
    autoplay: true,
    arrows: false,
    dots: false,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                arrows: false,
                dots: false
            }
        },
            {
            breakpoint: 600,
            settings: { 
                slidesToShow: 2,
                slidesToScroll: 2,
                arrows: false,
                dots: false
            }
        },
            {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                dots: false
            }
        }
    ]
});
$('#categories-slick').slick({
    autoplay: true,
    arrows: false,
    dots: false,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 4,
                arrows: false,
                dots: false
            }
        },
            {
            breakpoint: 600,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                arrows: false,
                dots: false
            }
        },
            {
            breakpoint: 480,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                arrows: false,
                dots: false
            }
        }
    ]
});


</script>
@endsection