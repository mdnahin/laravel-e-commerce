<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'product_name',
        'category_id',
        'subcategory_id',
        'product_price',
        'product_quantity',
        'product_summery',
        'product_description',
        'product_thumbnail',
        'updated_at',
    ];

    function get_category(){
        return $this->belongsTo('App\Category','category_id');
    }

    function get_subcategory(){
        return $this->belongsTo('App\SubCategory','subcategory_id');
    }

}
