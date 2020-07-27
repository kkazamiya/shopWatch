@extends('admin.master')

@section('title', 'Thêm mới banner')
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
				<form action="{{route('admin.banner.store')}}" method="POST" role="form" enctype="multipart/form-data">
					<legend>Thêm mới banner</legend>
					@csrf
					
					<div class="form-group">
						<label for="">Tên banner</label>
						<input type="text" class="form-control" id="name" placeholder="Input field" name="name" >
					</div>
					<div class="form-group">
						<label for="">Ảnh banner</label>
						<div class="form-group">
						<label for="">Ảnh banner</label>
						<a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Thêm ảnh</a>
						<input type="text" name="image" id="image">
						<div>
							<img src="" alt="" id="img" width="100px">
						</div>
						
					</div>
					
					</div>
						<div class="form-group">
					<label for="">Trạng thái</label>
					<div class="radio">
						<label>
							<input type="radio" name="status" id="input" value="1" checked="checked">Hiện
						</label>
						<label>
							<input type="radio" name="status" id="input" value="0" checked="">Ẩn
						</label>
					</div>
				</div>
				<div class="form-group">
						<label for="">Nội dung</label>
						<textarea name="content" id="" rows="10" cols="80"></textarea>
						
				</div>
					
				
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
			<div class="modal fade" id="modal-id">
			<div class="modal-dialog" style="width: 90%">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Modal title</h4>
					</div>
					<div class="modal-body" >
						<iframe src="http://localhost:8012/shopWatch/filemanager/dialog.php?field_id=image" width="100%" height="700px"></iframe>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					</div>
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