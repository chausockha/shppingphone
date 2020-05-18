@extends('admin.master')
@section('thanhvien')
<nav style="margin-top: 50px" aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="{{route('tongquan')}}">Trang chủ</a></li>
		    <li class="breadcrumb-item"><a href="#">Thành viên</a></li>
		    <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
		  </ol>
		</nav>
		<div class="row">
			<div class="col-sm-12">
			
			</div>
		</div>
		<div class="table-responsive">
			<h2>Quản lý thành viên  </h2>
		    <table class="table table-hover">
		    <thead>
		      <tr>
		        <th>#</th>
		        <th>Name</th>
		        <th>Email</th>
		        <th>Phone</th>
		        <th>Hình ảnh</th>
		        <th>thao tác</th>
		      </tr>
		    </thead>
		    <tbody>
		    	@if(isset($user))
		    	@foreach($user as $value)
		      <tr>
		        <td>{{$value->id}}</td>
		        <td>{{$value->name}}</td>
		        <td>{{$value->email}}</td>
		        <td>{{$value->phone}}</td>
		        <td>
		        	<img src="\shopping_phone\public\img\{{$value->avater}}" class="img img-responsive" style="width: 80px; height: 80px">
		        </td>
		        <td>
		        	

					<a style="padding: 5px 10px;border: 1px solid #999;font-size: 12px" href="{{route('deletethanhvien',$value->id)}}"><i class="fas fa-trash-alt"></i>Xóa</a>
		        </td>
		      </tr>
				@endforeach
				@endif

		     
		    </tbody>
		  </table>
		</div>  
		  </div>


@stop