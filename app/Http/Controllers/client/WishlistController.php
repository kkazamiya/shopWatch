<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist; 
use App\Models\Product; 

class WishlistController extends Controller
{
	public function index()
	{
		

		$wishlist = Wishlist::where('account_id',session('user')['id'])->get('product_id');
		$a = json_decode($wishlist);
		$pro[] = [];
		foreach ($a as $key => $value) {
			$pro[] = Product::find($value->product_id);
		}
		unset($pro[0]);
           // dd($pro->id);
		return view('client.wishlist',compact('pro'));

	}
	public function add($id)
	{

		if(session('user')){
            
				
				Wishlist::create([
					'product_id' => $id,
					'account_id' => session('user')['id']
				]);
				return redirect()->route('wishlist');
		}
		else{
			return redirect()->route('clientLogin')->with('error','Please login to use this function.');
		}
	}
	public function delete($id)
	{
		$wishlist = Wishlist::where('product_id',$id);
		$wishlist->delete();
         // dd($wishlist);
		return redirect()->route('wishlist');
	}
}
