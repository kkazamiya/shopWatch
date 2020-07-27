<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Product_img;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $product = Product::all();
        return view('admin.product.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.product.add',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //Validate from product
        $request->validate([
           'name'=> 'required|unique:Products',
           'category_id'=>'required',
           'price'=>'required',
           'image'=>'required'
        ],[
           'name.required'=>'* Tên sản phẩm không được trống',
           'name.unique'=>'* Tên sản phẩm đã tồn tại vui lòng xem lại',        
           'category_id.required'=>'* Bạn phải chọn danh mục',
           'price.required'=>'* Giá sản phẩm không được bỏ rỗng',
           'image.required'=>'* Đừng quên chọn ảnh đại diện cho sản phẩm nhé',

        ]);

        //Insert product
        $images = ($request->image_list['0']);
        // dd($images);
        $image = json_decode($images);
        // $image = is_array($images) ? $images : array($images);
        // dd($image);

        $img = trim($request->image,url('/uploads'));
        // dd($request->all());
        $product = Product::create([
           'name' =>$request->name,
           'slug' =>$request->slug,
           'image' =>$request->image,
           'price' =>$request->price,
           'sale_price' =>$request->sale_price,
           'status' =>$request->status,
           'category_id' =>$request->category_id,
           'description' =>$request->description,

        ]);
        // dd($request);
        foreach ($image as $key => $value) {
            $product_img = Product_img::create([
              'id_product'=>$product->id,
              'image'=>$value
            ]);
        }
        
        

        return redirect()->route('admin.product.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        // return view('admin.product.edit-product',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $category = Category::all();
        $product = Product::find($id);
        $product_img = Product_img::where('id_product',$id)->get();
        // dd($product_img);
        $img[] = [];
        foreach ($product_img as $value) {
           $img[]= $value->image;
        }
        unset($img[0]);
        $imag = implode(" ",$img);
        // dd($img);
        return view('admin.product.edit',compact('product','category','product_img','imag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $product = Product::find($id);
        $product->update($request->all());
        $product_img = Product_img::where('id_product',$id);
        // dd($product_img);
        $product_img->delete();

        $images = ($request->image_list['0']);
        $imag = $request->images_list;
        $image = [];
        if ($images == '') {
            $image = explode(" ",$imag);
        }
        else{
            $image = json_decode($images);
        }
        // $image = is_array($images) ? $images : array($images);
        // dd($image);

        foreach ($image as $key => $value) {
            $product_img = Product_img::create([
              'id_product'=>$product->id,
              'image'=>$value
            ]);
         }

        // $request->validate([
        //    'name'=> 'required',
        //    'category_id'=>'required',
        //    'price'=>'required',
        // ],[
        //    'name.required'=>'* Tên sản phẩm không được trống',    
        //    'category_id.required'=>'* Bạn phải chọn danh mục',
        //    'price.required'=>'* Giá sản phẩm không được bỏ rỗng',
        // ]);

        // $images = json_decode($request->image_list);
        // // dd($images);
        // $img = trim($request->image,url('/uploads'));
        // // dd($request->all());
        // // 
        // $image = request('image');
        
        // if($image){
        //     // $file = $request->image;
        //     $img = trim($request->image,url('/uploads'));
        //     $edit_product->update([
        //        'name'=>$request->name,
        //        'slug'=>$request->slug,
        //        'image'=>$img,
        //        'price'=>$request->price,
        //        'sale_price'=>$request->sale_price,
        //        'status'=>$request->status,
        //        'category_id'=>$request->category_id,
        //        'description'=>$request->description
            
        //             $product_img->update([
        //               'id_product'=>$product->id,
        //               'image'=>$value               
        //             ]);
        //     ]);

        // }
        // else{

        //     $edit_product->update([
        //        'name'=>$request->name,
        //        'slug'=>$request->slug,
        //        'price'=>$request->price,
        //        'sale_price'=>$request->sale_price,
        //        'status'=>$request->status,
        //        'category_id'=>$request->category_id,
        //        'description'=>$request->description
               
        //     ]);
        // }
        
        return redirect()->route('admin.product.index');
          
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id)->delete();
        return redirect()->route('admin.product.index')->with('success','Xóa thành công!!!');
        
    }
}
