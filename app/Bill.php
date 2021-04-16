<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    function product(){
        return $this->belongsTo('App\Product','product_id');
    }
}
