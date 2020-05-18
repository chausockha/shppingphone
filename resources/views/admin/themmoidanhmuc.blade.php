@extends('admin.master')
@section('themmoidanhmuc')
<nav style="margin-top: 50px" aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="{{route('tongquan')}}">Trang chủ</a></li>
		    <li class="breadcrumb-item"><a href="{{route('danhmuc')}}">Danh mục</a></li>
		    <li class="breadcrumb-item active" aria-current="page">Thêm mới </li>
		  </ol>
		</nav>
			<div class="col-sm-12"> 
				@if(Session::has('thanhcong'))
    <center> <div class="alert alert-success " style="color:#e74c3c "  >{{Session::get('thanhcong')}} </div>  </center>
    @endif  
			@include('admin.formdanhmuc')
@stop