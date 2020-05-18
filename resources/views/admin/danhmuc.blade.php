@extends('admin.master')
@section('danhmuc')
			<nav style="margin-top: 50px" aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="{{route('tongquan')}}">Trang chủ</a></li>
		    <li class="breadcrumb-item"><a href="#">Danh mục</a></li>
		    <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
		  </ol>
		</nav>
		<div class="table-responsive">
			<h2>Quản lý danh mục <a href="{{route('themmoidanhmuc')}}" class="pull-right"><i class="fas fa-plus-circle"></i></a> </h2>
		    <table class="table table-hover">
		    <thead>
		      <tr>
		        <th>#</th>
		        <th>Tên danh mục</th>
		        <th>Tittle seo</th>
		       <!--  <th>Trang chủ</th> -->
		        <th>Trạng thái</th>
		        <th>Thao tác</th>
		      </tr>
		    </thead>
		    <tbody>
		    	@if(isset($category))
		    	@foreach($category as $category1 )

		      <tr>
		        <td>{{$category1->id}}</td>
		        <td>{{$category1->c_name}}</td>
		        <td>{{$category1->c_title_seo}}</td>
		       <!--  <td>
		        	<a href="{{route('changestatus_c',['home',$category1->id])}}" class= " label {{$category1->gethome($category1->c_home)['class']}}">{{$category1->gethome($category1->c_home)['name']}}  </a>
		        </td> -->
		        <td>
		        	<a href="{{route('changestatus_c',['active',$category1->id])}}" class= " label {{$category1->getstatus($category1->c_active)['class']}}"> {{$category1->getstatus($category1->c_active)['name']}} </a>
		        </td>
		        <th> 
					<a style="padding: 5px 10px;border: 1px solid #999;font-size:12px;" href="{{route('editdanhmuc',$category1->id)}}"><i  class="fas fa-pen"></i >Cập nhât</a>
					<a style="padding: 5px 10px;border: 1px solid #999;font-size:12px;" href="{{route('deletedanhmuc',$category1->id)}}"><i  class="fas fa-trash-alt"></i >Xóa</a>
		        </th>
		      </tr>
		      @endforeach
		    	@endif
		    </tbody>
		  </table>
		</div>  
		  </div>


@stop
  
