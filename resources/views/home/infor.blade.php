@extends('home.master')
@section('infor') 
		
	<h1 style="padding-top: 100px;padding-left: 180px" pull-right class="page-header ">Cập nhật thông tin </h1>
	<div style="padding-top: 50px" class="container">
	 <form method="POST" action="{{route('postinfor')}}">
	 	@csrf
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" disabled="" placeholder=" email" name="email" value="{{$user->email}}">
    </div>
    <div class="form-group">
      <label for="email">Họ tên:</label>
      <input type="text" class="form-control" value="{{$user->name}}"  placeholder="Họ tên" name="name">
    </div>
     <div class="form-group">
      <label for="email">Số điện thoại:</label>
      <input type="text" class="form-control" value="{{$user->phone}}"  placeholder="Số điện thoại" name="phone">
    </div>
     <div class="form-group">
      <label for="email">Địa chỉ:</label>
      <input type="text" class="form-control" value=" {{$user->address}}"  placeholder="Địa chỉ" name="address">
    </div>
    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Cập nhật</button>
  </form>
</div>
@stop