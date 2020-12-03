<div class="cart_page table-responsive">
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