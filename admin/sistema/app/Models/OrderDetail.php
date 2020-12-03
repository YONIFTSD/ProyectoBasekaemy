<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderDetail extends Model
{
    protected $table = 'order_detail';
    protected $primaryKey = 'id_orden_detail';


    public static function List($id){
        
        return DB::table('order_detail')
            ->join('product', 'product.id_product', '=', 'order_detail.id_product')
            ->select('order_detail.*','product.name','product.code')
            ->where('order_detail.state','<>','9')
            ->where('order_detail.id_order',$id)
            ->orderBy('order_detail.id_order_detail','ASC')
            ->get();
        
    }
}
