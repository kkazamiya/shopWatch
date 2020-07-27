<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\Order;
use App\Models\Product;
use Auth;
use Session;


class AdminController extends Controller
{
    public function index(){
        $user = (User::all()->count()) -1;
        $order = Order::all()->count();
        $product = Product::all()->count();
         return view('admin.index',compact('user','order','product'));
        
}
    public function register(){
    	return view('auth.register');
    }
    public function postRegister(Request $request)
        {   

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            return redirect()->route('adminLogin')->with('success','Đăng ký thành công. Mời đăng nhập');
        }

    public function login(){
    	// dd('adff');
    	return view('admin.login');
    }
    public function postLogin(Request $request){
        // dd($request);
    	if (Auth::attempt($request->only('email','password'),$request->has('remember'))) {
            // dd(Auth::user()->role);
    		if(Auth::user()->role==1){
                // dd(Auth::user());
                $users = Auth::user();  
                // dd($users);  
                 $users= Auth::user();    
                session([
                    'admin'=>$users
                ]);
                return redirect()->route('admin.adminHome');
            }
            elseif (Auth::user()->role==0) {
                    return redirect()->route('clientLogin');
                }    
            
        }      
        else{
            return redirect()->route('adminLogin');
        }
    }


}
