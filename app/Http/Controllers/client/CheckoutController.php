<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\OrderDetail;

class CheckoutController extends Controller
{
    public function index(){
    	
    	return view('client.checkout');
    }
    public function postCheckout(Request $req){
    	$order = Order::create([
    		'account_id' => session('user')['id'],
    		'total_price' => $req->total_price
    	]);
    	$data=DB::table('orders')->latest('created_at')->first();;
    	foreach (session('cart') as $value) {
    		$orderDetail = OrderDetail::create([
    		'order_id' => $data->id,
    		'product_id' => $value['id'],
    		'quantity' => $value['quantity'],
    		'price' => $value['price']

    	]);
    	}
    	session()->forget('cart');
    	return redirect()->route('clientHome');
    }
}
