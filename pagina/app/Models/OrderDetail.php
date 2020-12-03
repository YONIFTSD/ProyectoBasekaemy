<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class OrderDetail extends Model
{
    protected $table = 'order_detail';
    protected $primaryKey = 'id_order_detail';

    public static function List($id_order){
        
        return DB::table('order_detail')
            ->join('product', 'product.id_product', '=', 'order_detail.id_product')
            ->select('order_detail.*','product.code','product.name','product.image')
            ->where('order_detail.id_order','=',$id_order)
            ->get();
        
    }
}
