<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Subcategory extends Model
{
    protected $table = 'subcategory';
    protected $primaryKey = 'id_subcategory';

    public static function ListAll(){
        
        return DB::table('subcategory')
            ->join('category', 'category.id_category', '=', 'subcategory.id_category')
            ->select('subcategory.*','category.name as name_category')
            ->orderBy('subcategory.id_subcategory','DESC')
            ->where('subcategory.state','<>',9)
            ->get();
        
    }
}
