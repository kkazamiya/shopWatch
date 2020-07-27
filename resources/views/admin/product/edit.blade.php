@extends('admin.master')
@section('title','Thêm mới danh mục')
@section('content')

<div class="content-wrapper">
  <div class="container">
  	<div class="row">
  		
        <div class="col-md-9">
        	<div class="panel panel-primary">
        		<div class="panel-heading">
        			<h3 class="panel-title">Sửa sản phẩm</h3>
        		</div>
        		<div class="panel-body">
        			<form action="{{route('admin.product.update',$product->id)}}" method="POST" role="form" enctype="multipart/form-data">
                        @method('PUT')
        				@csrf
        				<legend>New product</legend>
        			   
        				<div class="form-group">
        					<label for="">Tên sản phẩm</label>
        					<input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên sản phẩm..." value="{{$product->name}}" onkeyup="ChangeToSlug()">
        					@if($errors->has('name'))
        				    <div class="helper" style="color:red">
        				    	<span>{{$errors->first('name')}}</span>
        				    </div>
        				    @endif
        				</div>

        				<div class="form-group">
        					<label for="">Slug</label>
        					<input type="text" class="form-control" id="slug" name="slug" placeholder="Nhập slug..." value="{{$product->slug}}">
        				</div>
        			
        				<div class="form-group">
        					<label for="">Danh mục sản phẩm</label>
        					<select name="category_id" id="input" class="form-control">
        						<option value="{{$product->category_id}}">----Thuộc thương hiệu----</option>
	        						@foreach($category as $cate)
	        						   <option value="{{$cate->id}}">{{$cate->name}}</option>
	        						@endforeach
        					</select>
        					@if($errors->has('category_id'))
        				    <div class="helper" style="color:red">
        				    	<span>{{$errors->first('category_id')}}</span>
        				    </div>
        				    @endif
        				</div>

        				<div class="form-group">
        					<label for="">Giá sản phẩm</label>
        					<input type="text" class="form-control" name="price" placeholder="Nhập giá..." value="{{$product->price}}">
        					@if($errors->has('price'))
        				    <div class="helper" style="color:red">
        				    	<span>{{$errors->first('price')}}</span>
        				    </div>
        				    @endif
        				</div>

        				<div class="form-group">
        					<label for="">Giá khuyến mãi</label>
        					<input type="text" class="form-control" name="sale_price" placeholder="Giá khuyễn mãi ..." value="{{$product->sale_price}}">
        				</div>

                        {{-- Ảnh đại diện sản phẩm --}}
        				<div class="form-group">
        					<label for="">Ảnh sản phẩm</label>
        					<div>
        						<a class="btn btn-danger btn-xs" data-toggle="modal" href='#modal-file'>Chọn ảnh</a>
        						<input type="text" name="image" id="image" value="{{$product->image}}">
        					<div>
                                <img src="{{$product->image}}" alt="" id="img" width="100px">
                            </div>
                        </div>
                            
        					@if($errors->has('image'))
        				    <div class="helper" style="color:red">
        				    	<span>{{$errors->first('image')}}</span>
        				    </div>
        				    @endif
        				</div>

        				<div class="form-group">
        					<img src="" style="max-height:150px" id=img>
        				</div>

                        {{-- Ảnh mô tả sản phẩm --}}
                        <div class="form-group">
        					<label for="">Ảnh mô tả sản phẩm</label>
        					<div>
        						<a class="btn btn-danger btn-xs" data-toggle="modal" href='#modal-file-list'>Chọn ảnh mô tả</a>
        						<input type="text" name="image_list[]" id="image_list" multiple="multiple">
                                <input type="hidden" name="images_list" value="{{$imag}}" placeholder="">
                                <div>
                                    
                               
                                @foreach($product_img as $value)

                                    <img src="{{$value->image}}" alt="" id="img" width="100px">
                           
                                
                                @endforeach 
                            </div>
        					</div>	
        				</div>

        				<div class="form-group">
        					<div class="row" id="show">
        						
        					</div>
        				</div>

        				{{-- End Ảnh mô tả --}}

        				<div class="form-group">
        					<label for="">Trạng thái</label>
        					<div class="radio">
        						<label>
        							<input type="radio" name="status" id="inputStatus" value="1" checked="checked">
        							Hiện
        						</label>
        						<label>
        							<input type="radio" name="status" id="inputStatus" value="0">
        							Ẩn
        						</label>
        					</div>
        				</div>

        				<div class="form-group">
                            <label for="">Mô tả</label>
                            input
	                        <textarea id="dess" name="description" class="form-control" rows="3" value="{{$product->description}}"></textarea>
                        </div>
        			
        				<button type="submit" class="btn btn-primary">Thêm mới</button>

        				{{-- Modal cho  phần ảnh sản phẩm --}}
        				<div class="modal fade" id="modal-file">
        					<div class="modal-dialog" style="width: 70%">
        						<div class="modal-content">
        							<div class="modal-header">
        								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        								<h4 class="modal-title">Modal title</h4>
        							</div>
        							<div class="modal-body">
        								<iframe src="http://localhost:8012/shopWatch/filemanager/dialog.php?field_id=image" width="100%" height="500px"></iframe>
        							</div>
        							<div class="modal-footer">
        								<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        							</div>
        						</div>
        					</div>
        				</div>

        				{{-- Modal cho ảnh mô tả sản phẩm --}}
                        
                        <div class="modal fade" id="modal-file-list">
        					<div class="modal-dialog" style="width: 70%">
        						<div class="modal-content">
        							<div class="modal-header">
        								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        								<h4 class="modal-title">Modal title</h4>
        							</div>
        							<div class="modal-body">
        								<iframe src="http://localhost:8012/shopWatch/filemanager/dialog.php?field_id=image_list" width="100%" height="500px"></iframe>
        							</div>
        							<div class="modal-footer">
        								<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        							</div>
        						</div>
        					</div>
        				</div>

        			</form>
        		</div>
        	</div>
        </div>

  	</div>
  </div>
</div>

@stop()