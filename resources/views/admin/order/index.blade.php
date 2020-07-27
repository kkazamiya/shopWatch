@extends('admin.master')
@section('title','Danh sách danh mục')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Dashboard
			<small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Dashboard</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-md-8">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Danh sách danh mục</h3>
					</div>
					<div class="panel-body">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>STT</th>
									<th>Tên khách hàng</th>
									<th>Trạng thái</th>
									<th>Ngày tạo</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($order as $value)
								<tr>
									<td>{{$loop->index + 1}}</td>
									<td>{{$value->account['name']}}</td>
									@if($value->status==0)
									<td>Đang xử lý</td>
									@elseif($value->status==1)
									<td>Đang giao hàng</td>
									@elseif($value->status==2)
									<td>Đã thanh toán</td>
									@endif
									<th>{{$value->created_at}}</th>
									<td> <a href="{{route('admin.orderDetail',$value->id)}}" title="" class="btn btn-primary">Xem</a></td>
									
									
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>

		</div>
		<!-- /.row -->
		<!-- Main row -->
		<div class="row">
			<!-- Left col -->
			<section class="col-lg-7 connectedSortable">
				<!-- Custom tabs (Charts with tabs)-->

				<!-- /.nav-tabs-custom -->


				<!-- /.content-wrapper -->


@stop