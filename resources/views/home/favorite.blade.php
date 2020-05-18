@extends('home.master')

@section('favorite')

	<section class="py-lg-5" style="background: white; padding: 20px">
	<h2>Danh sách sản phẩm yêu thích </h2>
	<div class="row mb-5">
	<div class="col-sm-12">
		    <table class="table table-hover">
		    <thead>
		      <tr>
		        <th>#</th>
		        <th>Name</th>
		        <th>Category</th>
		        <th>Avatar</th>
		        <th>Price</th>
		        <th>Action</th>
		       
		      </tr>
		    </thead>
		    <tbody>
		    	@if(isset($product))
		    	@foreach($product as $value)
		      <tr>
		        <td>{{$value->id}}</td>
		        <td>{{$value->pro_name}}</td>
		        <td>{{$value->category->c_name}}</td>
		        <td>
		        	<img src="\shopping_phone\public\img\{{$value->pro_avatar}}" class="img img-responsive" style="width: 80px; height: 80px">
		        </td>
		        <td>{{number_format($value->pro_price,0,',','.')}} VND</td>
		      
		        <td>
					<a style="padding: 5px 10px;border: 1px solid #999;font-size: 12px" href="{{route('deletefavorite',$value->id)}}"><i class="fas fa-trash-alt"></i>Hủy bỏ</a>
		        </td>
		      </tr>
				@endforeach
				@endif
		    </tbody>
	
		  </table>
		</div>  
</div>
</section>
@stop