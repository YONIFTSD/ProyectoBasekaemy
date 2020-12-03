<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'id_product';

    // public function Photos($product_id)
    // {
    //     return ProductPhoto::where('parent', $product_id)->get();
    // }

    // public function Features($product_id)
    // {
    //     return Feature::where('parent', $product_id)->where('estado', 1)->where('eliminado', 0)->get();
    // }
}
