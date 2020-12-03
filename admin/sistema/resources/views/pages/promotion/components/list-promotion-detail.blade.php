@if ($view == "add")
<div class="table-responsive">
    <table class="table w-100 thead-primary">
        <thead>
            <tr>
                <th width="5%" class="text-center">#</th>
                <th width="10%" class="text-center">Código</th>
                <th width="50%" class="text-center">Nombre</th>
                <th width="10%" class="text-center">Cantidad</th>
                <th width="5%" class="text-center">Acc.</th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < count($detail_promotion); $i++) 
            @if ($detail_promotion[$i]['state'] == 1)
            @php
                $product = \App\Models\Product::find($detail_promotion[$i]['id_product']);
            @endphp
            <tr>
                <td class="text-center">{{ $i + 1 }}</td>
                <td class="text-left">{{ $product->code }}</td>
                <td class="text-left">{{ $product->name }}</td>
                <td class="text-center">
                    <input type="number" class="form-control" 
                    value="{{ $detail_promotion[$i]['quantity'] }}"
                    id="dQuantity{{ $detail_promotion[$i]['id_product'] }}"
                    onchange="EditDetailPromotion({{ $detail_promotion[$i]['id_product'] }})"
                    >
                </td>
                <td class="text-center">
                    <a   onclick="DeleteDetailPromotion({{ $detail_promotion[$i]['id_product'] }})" ><i class="fas fa-trash text-danger"></i></a>
                </td>
            </tr>
            @endif  
            @endfor
        </tbody>
    </table>
</div> 
@endif

@if ($view == "edit")
<div class="table-responsive">
    <table class="table w-100 thead-primary">
        <thead>
            <tr>
                <th width="5%" class="text-center">#</th>
                <th width="10%" class="text-center">Código</th>
                <th width="50%" class="text-center">Nombre</th>
                <th width="10%" class="text-center">Cantidad</th>
                <th width="5%" class="text-center">Acc.</th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < count($detail_promotion); $i++)        
            @if ($detail_promotion[$i]['state'] == 1)
            @php
                $product = \App\Models\Product::find($detail_promotion[$i]['id_product']);
            @endphp
            <tr>
                <td class="text-center">{{ $i + 1 }}</td>
                <td class="text-left">{{ $product->code }}</td>
                <td class="text-left">{{ $product->name }}</td>
                <td class="text-center">
                    <input type="number" class="form-control" 
                    value="{{ $detail_promotion[$i]['quantity'] }}"
                    id="dQuantity{{ $detail_promotion[$i]['id_product'] }}"
                    onchange="EditDetailPromotion({{ $detail_promotion[$i]['id_product'] }})"
                    >
                </td>
                <td class="text-center">
                    <a   onclick="DeleteDetailPromotion({{ $detail_promotion[$i]['id_product'] }})" ><i class="fas fa-trash text-danger"></i></a>
                </td>
            </tr>
            @endif  
            @endfor
        </tbody>
    </table>
</div> 
@endif
