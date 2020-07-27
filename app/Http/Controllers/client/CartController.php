<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\Cart;
use App\Models\Product; 


class CartController extends Controller
{
	public function addCart($id, cart $cart){
		if(session('user')){
			$product = Product::find($id)->toArray();
		$cart->add($product);
		
		return redirect()->route('clientHome');
		}
		else{return redirect()->route('clientLogin');}
		
	}
	public function viewCart(cart $cart){
		// dd($cart->items);
		return view('client.view-cart',[
			'cart'=> $cart
		]);
	}
	public function updateCart(cart $cart, Request $req){
		// dd($req);

		$cart->update_carts($req->id,$req->quantity);
		
		return redirect()->route('view-cart');
	}
	public function deleteCart($id,cart $cart){
		$cart->delete_cart($id);
		return redirect()->route('view-cart');
	}
	
}
