<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	 
    protected $fillable = ['name','slug','image','price','sale_price','category_id','status','desscription'];
    public function category(){
    	return $this->belongsTo('App\Models\Category','category_id');
    }
}
