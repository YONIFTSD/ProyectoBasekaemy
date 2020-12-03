<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'id_product';

    public static function ListAll($q){
        
        return DB::table('product')
            ->join('category', 'category.id_category', '=', 'product.id_category')
            ->select('product.*','category.name as name_category')
            ->where('product.state','<>','9')
            ->where(function ($query) use ($q) {
                $query = $query->orWhere('product.code','like',"%$q%");
                $query = $query->orWhere('product.name','like',"%$q%");
                $query = $query->orWhere('category.name','like',"%$q%");
                
            })
            ->orderBy('product.id_product','ASC')
            ->paginate(15);
        
    }

    public static function SearchProductPromotions($q){
        
        return DB::table('product')
            ->join('category', 'category.id_category', '=', 'product.id_category')
            ->select('product.*','category.name as name_category')
            ->where('product.state','<>','9')
            ->where(function ($query) use ($q) {
                $query = $query->orWhere('product.code','like',"%$q%");
                $query = $query->orWhere('product.name','like',"%$q%");
                $query = $query->orWhere('category.name','like',"%$q%");
                
            })
            ->orderBy('product.id_product','ASC')
            ->limit(15)
            ->get();
        
    }

    
}
