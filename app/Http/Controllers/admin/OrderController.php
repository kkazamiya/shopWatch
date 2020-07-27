<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\User;

class OrderController extends Controller
{
    public function index(){
    	$order = Order::all();
    	return view('admin.order.index',compact('order'));
    }
    public function detail($id){
    	$order = Order::where('id',$id)->get()[0];
    	
    	$detail = OrderDetail::where('order_id',$id)->get();
        // dd($order);

    	return view('admin.order.detail',compact('order','detail'));
    }
    public function postDetail($id, Request $req){
    	// dd($req);
    	$order = Order::where('id',$id);
    	$order->update([
    		'status'=>$req->status
    	]);
        return redirect()->route('admin.orderIndex');
    }
}
