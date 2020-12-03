<article class="single_product d-flex align-content-between flex-wrap">
    <div class="w-100">
        <div class="product_thumb">
            <a href="{{ url('productos/'.$product->id_product.'/'.str_slug($product->name).'/p') }}" class="text-center">
                @if($product->image)
                <img class="img-fluid" src="http://goodyear.cabanasenlaplaya.com/admin{{ $product->image }}" alt="{{ $product->name }}" title="{{ $product->name }}" />
                @else
                <img class="img-fluid" src="http://goodyear.cabanasenlaplaya.com/admin{{ $product->image }}" alt="{{ $product->name }}" title="{{ $product->name }}" />
                @endif
            </a>
            <div class="quick_button">
                <!-- <a href="#" data-toggle="modal" data-target="#ModalProduct" data-product="{{ $product->id }}" title="Vista rápida"><i class="fas fa-eye"></i></a> -->
            </div>
        </div>
        <div class="product_name w-100 px-3 text-left py-2">
            <h3 class="font-title">
                <a href="{{ url('productos/'.$product->id_product.'/'.str_slug($product->name).'/p') }}">{{ $product->nombre }}</a>
            </h3>
        </div>
    </div>
    <div class="product_content w-100">
        <div class="content_inner">
            <div class="px-3 text-center" style="height: 80px">
                <div class="price_box pb-3 pt-1">
                    
                    <div class="d-flex justify-content-between">
                        <span class="mr-1 text-uppercase font-myrian-pro">{{ $product->name }}</span>
                    </div>
                   
                </div>
            </div>
            <div class="px-3 text-center">
                <div class="price_box pb-3 pt-1">
                    @if($product->regular_price)
                    <div class="d-flex justify-content-between text-pa-c">
                        <span class="mr-1 text-uppercase">Precio Actual:</span>
                        <span class="text-right text-old-l"><span>S/ </span>{{ number_format($product->regular_price, 2) }}</span>
                    </div>
                    @endif
                    <div class="d-flex justify-content-between text-po-c">
                        <span class="mr-1 text-uppercase">Oferta:</span>
                        <span class="text-right"><span>S/ </span>{{ number_format($product->online_price, 2) }}</span>
                    </div>
                </div>
            </div>
            <div class="action_links text-center">
                <ul class="ul-list">
                    <li class="add_to_cart">
                        <a href="{{ url('productos/'.$product->id_product.'/'.str_slug($product->name).'/p') }}" class="_add-to-cart" title="Agregar" data-code="{{ $product->id_product }}">Ver <i class="fas fa-eye"></i></a>
                        <div class="loading-box d-flex justify-content-center">
                            <div class="dot-typing spinner-loading d-none"></div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</article>