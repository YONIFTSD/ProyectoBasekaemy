<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'subcategory';
    protected $primaryKey = 'id_subcategory';

    public static function SubCategories($category_id)
    {
        return SubCategory::where('id_category', $category_id)->where('state', 1)->get();
    }
}
