<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Product;

class CommentController extends Controller
{
    public function add($id, Request $req){
    	$pro = Product::find($id);
    	$comment = Comment::create([
    		'account_id'=>session('user')['id'],
    		'product_id'=>$id,
    		'content'=>$req->content
    	]);
    	return redirect()->route('productDetail',$pro->slug);
    }
}
