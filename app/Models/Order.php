<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable =['account_id','total_price'];
    public function account(){
    	return $this->belongsTo('App\User','account_id');
    }
}
