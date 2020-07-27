@extends('admin.master')
@section('title','Danh sách danh mục')
@section('content')

<div class="content-wrapper">
  <div class="container">
  	<div class="row">
  		<div class="col-md-12">
        @if(Session::has('success'))

                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  {{Session::get('success')}}
                </div>

        @endif
  			<h3>Danh sách sản phẩm</h3>
  			<div class="panel panel-danger">
  				<div class="panel-heading">
  					<h3 class="panel-title">
  						<a href="{{route('admin.product.create')}}">
                <span class="btn btn-success">+++Thêm mới sản phẩm</span>
              </a>
  					</h3>
  				</div>
  				<div class="panel-body">
  					<table class="table table-condensed table-hover">
  						<thead>
  							<tr>
  								<th>Stt</th>
                  <th>Name</th>
                  <th>Category</th>
                  <th>Image</th>
                  <th>Price</th>
                  <th>Sale_Price</th>
                  <th>Status</th>
                  <th></th>
  							</tr>
  						</thead>
  						<tbody>
                @foreach($product as $pro)
    							<tr>
    								<td>{{$loop->index + 1}}</td>
                    <td style="color:blue">{{$pro->name}}</td>
                    <td>{{$pro->category['name']}}</td>
                    <td><img src="{{$pro->image}}" style="max-height: 80px"></td>
                    <td style="color:red">{{number_format($pro->price,0,',','.')}}<sup>đ</sup></td>
                    <td style="color:red">{{number_format($pro->sale_price,0,',','.')}}<sup>đ</sup></td>

                    @if($pro->status==1)
                     <td><span class="bg-danger">Hiện</span></td>
                    @else
                     <td><span class="bg-info">Ẩn</span></td>
                    @endif
                    
                    <td>
                      <a href="{{route('admin.product.edit',$pro->id)}}" class="btn btn-warning">Sửa</a>
                    </td>
                    <td>
                      <form action="{{route('admin.product.destroy',$pro->id)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger"  onclick="return confirm('Bạn có chắc muốn xóa danh mục này')">Xóa</button>

                  </form>
                    </td>

    							</tr>
                @endforeach
  						</tbody>
  					</table>
  				</div>
  			</div>
  		</div>
  	</div>
  </div>
</div>


@stop