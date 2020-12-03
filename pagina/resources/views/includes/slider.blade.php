
<div class="swiper-container swiper-slider slider-main">
  <div class="swiper-wrapper">
    @foreach ($coverpages as $be)
    @if (empty($be->url))
    <div class="swiper-slide"><img class="w-100" src="http://goodyear.cabanasenlaplaya.com/admin{{ $be->image }}" title="{{ $be->title }}" alt="{{ $be->title }}"></div>  
    @else
    <div class="swiper-slide"><a href="{{ $be->url }}"><img class="w-100" src="http://goodyear.cabanasenlaplaya.com/admin{{ $be->image }}" title="{{ $be->title }}" alt="{{ $be->title }}"></a></div>
    @endif
      
    @endforeach
    
  </div>
  <!-- Add Arrows -->
  <div class="swiper-button-next swiper-button-white"></div>
  <div class="swiper-button-prev swiper-button-white"></div>
</div>
