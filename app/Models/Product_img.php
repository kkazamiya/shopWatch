<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_img extends Model
{
   protected $fillable = ['id_product','image'];
   public function product()
    {
        return $this->belongsTo('App\Product','id_product');
    }
}
