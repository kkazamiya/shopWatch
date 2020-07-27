<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = ['order_id','product_id','quantity','price'];
    public function pro(){
    	return $this->belongsTo('App\Models\Product','product_id');
    }
    public function order(){
    	return $this->belongsTo('App\Models\Order','order_id');
    }
}
