@extends('admin.master')

@section('title', 'Chi tiết blog')
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
			<h3>Tên khách hàng:</h3>
			<h4>{{$order->account['name']}}</h4>
			
			<h3>Chi tiết đơn hàng</h3>
			<div>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Chi tiết đơn hàng</h3>
					</div>
					<div class="panel-body">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>STT</th>
									<th>Tên sản phẩm</th>
									<th>Số lượng</th>
									<th>Đơn giá</th>
									<th>Thành tiền</th>
								</tr>
							</thead>
							<tbody>
								@foreach($detail as $value)
								<tr>
									<td>{{$loop->index + 1}}</td>
									<td>{{$value->pro['name']}}</td>
									<td>{{$value->quantity}}</td>
									<th>{{$value->price}}</th>
									<th>{{$value->price*$value->quantity}}</th>
									
									
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<div>
					<h3>Tổng tiền: {{$order->total_price}} đ</h3>
				</div>
				<div>
					<form action="" method="POST">
						@csrf
						<legend>Cập nhật trạng thái đơn hàng</legend>

						<select name="status" id="input">
							<option value="1">Đang giao hàng</option>
							<option value="2">Đã thanh toán</option>
							
						</select>

						

						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
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