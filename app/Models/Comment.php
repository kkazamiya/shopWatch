<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['account_id','product_id','content'];
    public function user(){
    	return $this->belongsTo('App\User','account_id');
    }
}
