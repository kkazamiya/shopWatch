<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Category;
use App\Models\Product_img;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Comment;
use App\Models\WishList;
use App\User;
use Hash;
use Auth;


class ClientController extends Controller
{
    public function index(){
        // dd(session('cart'));
    	$banner = Banner::where('status',1)->get();
    	$blog = Blog::all()->take(3);
    	$feature = Product::where('status',1)->take(8)->get();
    	// dd($feature);
    	$new_arrivals = Product::where('status',1)->latest()->take(8)->get();
    	$best_seller = Product::where('status',1)->latest()->take(8)->get();
    	$on_sale = Product::where('sale_price','>',0)->take(8)->get();
        // dd(session('user')['id']);
        // dd(WishList::where('account_id',session('user')['id'])->count());
    	return view ('client\index',compact('banner','feature','new_arrivals','on_sale','blog'));
    }
    public function blog_detail($slug){
    	$blog_list = Blog::all()->take(3);
    	$blog = Blog::where('slug',$slug)->first();
    	// dd($blog);
    	
    	return view ('client.blog.blog_detail',compact('blog','blog_list'));
    }
    public function blog(){
    	$blog = DB::table('blogs')->paginate(6);
        $recent = Blog::orderBy('created_at','desc')->take(3)->get();
        // dd($recent);
    	// dd($blog->slug);
    	return view('client.blog.blogList',compact('blog','recent'));
    }
    public function about(){
    	return view('client\about');
    }
    public function contact(){
    	return view('client\contact');
    }
    public function productList($slug){
    	$cate = Category::where('slug',$slug)->first();

    	$product = Product::where('category_id',$cate->id)->paginate(9);
        // dd($product);
    	return view('client.product_list',compact('cate','product'));
    }
    public function productListSort($slug,Request $request){
        $cate = Category::where('slug',$slug)->first();
        // dd($request->sortby);
        if ($request->sortby == 1) {
            $product = Product::where('category_id',$cate->id)->paginate(9);
        }
        if ($request->sortby == 2) {
            $product = Product::where('category_id',$cate->id)->orderBy('name', 'asc')->paginate(9);
        }
        if ($request->sortby == 3) {
            $product = Product::where('category_id',$cate->id)->orderBy('name', 'desc')->paginate(9);
        }
        if ($request->sortby == 4) {
            $product = Product::where('category_id',$cate->id)->orderBy('price', 'asc')->paginate(9);
        }
        if ($request->sortby == 5) {
            $product = Product::where('category_id',$cate->id)->orderBy('price', 'desc')->paginate(9);
        }
        // dd($product);
        return view('client.product_list',compact('cate','product'));
    }
    public function productDetail($slug){

    	$product = Product::where('slug',$slug)->first();
        $comment = Comment::where('product_id',$product->id)->get();
    	// dd($product);
        $pro = OrderDetail::where('product_id',$product->id)->get();
        // dd($pro->order['account_id']);
        $count=0;
        foreach ($pro as $value) {
            if(session('user')){
                if ($value->order['account_id']==session('user')['id']) {
                    $count +=1;
                }
            }

        }

        $pro_img = Product_img::where('id_product',$product->id)->get();
    	// dd($pro_img);
        return view('client.product',compact('product','pro_img','count','comment')); 
    }
    // public function productDetail($slug){
    // 	$product = Product::where('slug',$slug)->first();
    // 	dd($product);
    // 	$pro_img = Product_img::where('id_product',$product->id);
    // 	return view('client.product',compact('product','pro_img')); 
    // }
    public function search(Request $request){
    	$product = Product::where('name','like','%'.$request->name.'%')->paginate(9);
    	// dd($product);
    	return view('client.product_search',compact('product'));
    }
    public function register(){
    	return view('client.register');
    }
    public function postRegister(Request $request){
    	$request->validate(
    		[
    			'name'=> 'required|unique:Users',
    			'email'=>'required|unique:Users',
    			'password'=>'required'
    		],
    		[
    			'name.required'=>'*Please type in name.',
    			'email.required'=>'*Please type in email.',
    			'password.required'=>'*Please type in password.',
    			'name.unique'=>'*username has been taken.',
    			'email.unique'=>'*email has been taken.'
    		]
    	);
    	$user = User::create([
    		'name'=> $request->name,
    		'password'=> Hash::make($request->password),
    		'email' =>$request->email
    	]);
    	return redirect()->route('clientLogin');
    }
    public function login(){
    	return view('client.login');
    }
    public function postLogin(Request $req){
    	$data = $req->only('email','password');
        if(Auth::attempt($data,$req->has('remember'))){ 
            // dd(Auth::user()->name);
            if(Auth::user()->role==0){
                $users= Auth::user();    
                session([
                    'user'=>$users
                ]);

                return redirect()->route('clientHome');
            }
            elseif (Auth::user()->role==1) {
                return redirect()->route('adminLogin');
            }    
            
        }      
        else{
            return redirect()->route('clientLogin');
        }
        
    }
    public function logout(){
        session()->forget('cart');
        session()->forget('user');
        return redirect()->route('clientHome');
    }
    public function checkout(){
        return view('client.checkout');
    }
    
    public function account(){
        $order = Order::where('account_id',session('user')['id'])->get();
        return view('client.account',compact('order'));
    }
    public function updateAccount(Request $req){
        // dd($req);
        $account = User::find(session('user')['id']);
        $password = ($req->password)? Hash::make($req->password) : session('user')['password'] ;
        // dd($account);
        $account->update([
            'name'=> $req->name,
            'email'=> $req->email,
            'password'=> $password,
            'phone'=> $req->phone,
            'address'=> $req->address
        ]);
        return redirect()->route('account');
    }
    // public function adminLogin(Request $req){
    //     // dd(Auth::attempt($req->only('email','password')));
    //     if(Auth::attempt($req->only('email','password'))){
    //         if (Auth::user()->role==1) {
    //             $user = Auth::user()->name;
    //         // dd($user);
    //             return view('admin.index');
    //         }
    //         else{
    //             return redirect()->route('admin.login');
    //         }
    //         return redirect()->route('clientHome');
    //     }
    // }
}
