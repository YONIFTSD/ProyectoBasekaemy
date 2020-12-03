<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    protected $table = 'order';
    protected $primaryKey = 'id_order';

    public static function GetById($id){
        
        return DB::table('order')
            ->join('client', 'client.id_client', '=', 'order.id_client')
            ->select('order.*','client.name','client.last_name','client.document_type','client.document_number','client.email','client.phone','client.address')
            ->where('order.id_order',$id)
            ->first();
        
    }

    public static function List(){
        
        return DB::table('order')
            ->join('client', 'client.id_client', '=', 'order.id_client')
            ->select('order.*','client.name','client.last_name','client.document_type','client.document_number')
            ->where('order.state','<>','9')
            ->orderBy('order.id_order','DESC')
            ->get();
        
    }

}
