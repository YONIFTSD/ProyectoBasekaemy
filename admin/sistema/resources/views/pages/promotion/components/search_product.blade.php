<div class="table-responsive">
    <table class="table w-100 thead-primary">
        <thead>
            <tr>
                <th width="5%" class="text-center">#</th>
                <th width="10%" class="text-center">Código</th>
                <th width="40%" class="text-center">Nombre</th>
                <th width="20%" class="text-center">Categoria</th>
                <th width="15%" class="text-center">Cantidad</th>
                <th width="10%" class="text-center">Acc.</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $item => $product)
            <tr>
                <td class="text-center">{{ $item + 1 }}</td>
                <td class="text-left">{{ $product->code }}</td>
                <td class="text-left">{{ $product->name }}</td>
                <td class="text-left">{{ $product->name_category }}</td>
                <td class="text-center">
                    <input type="number" min="1" value="1" class="form-control" 
                    id="mQuantity{{ $product->id_product }}">
                </td>
                <td class="text-center">
                    <button class=" btn-sm btn-info" onclick="AddDetailPromotion({{ $product->id_product }})"><i class="fas fa-eye m-0"></i></button> 
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
