@extends('admin.master')
@section('updatedanhmuc')

<nav style="margin-top: 50px" aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="{{route('tongquan')}}">Trang chủ</a></li>
		    <li class="breadcrumb-item"><a href="{{route('danhmuc')}}">Danh mục</a></li>
		    <li class="breadcrumb-item active" aria-current="page">Update </li>
		  </ol>
		</nav>
		
		<div class="col-sm-12"> @if(Session::has('thanhcong'))
    <center> <div class="alert alert-success " style="color:#e74c3c "  >{{Session::get('thanhcong')}} </div>  </center>
    @endif  
			<form action="{{route('updatedanhmuc')}}" method="post">
				{{ csrf_field()}} 
	    <div class="form-group">
	      <label for="name">Tên danh mục:</label>
	 
	      <input type="text" class="form-control" id="email" placeholder="Tên danh mục" name="name" value="{{old('name',isset($category->c_name)? $category->c_name :'' )}}">
	      <input type="hidden" name="id" value="{{$category->id}}">
 @if ($errors->has('name'))
				<div class="error-text" style="color:  #e74c3c" >	{{$errors->first('name')}} </div>
	
	
			@endif 
	    </div>
	   
		
	    <div class="form-group">
	      <label for="name">Icon:</label>
	      <input type="text" class="form-control" id="email" placeholder="fa fa-home" name="icon" value="{{old('icon',isset($category->c_icon)? $category->c_icon :'')}}">
	    </div>
	     @if ($errors->has('icon'))
				<div class="error-tex" style="color:  #e74c3c" >	{{$errors->first('icon')}} </div>
	
	
			@endif 
		<div class="form-group">
	      <label for="name">Meta title:</label>
	      <input type="text" class="form-control"  placeholder="Meta title" name="c_title_seo" value="{{old('c_title_seo',isset($category->c_title_seo)? $category->c_title_seo :'')}}">
	    </div>
	    @if ($errors->has('c_title_seo'))
				<div class="error-tex" style="color:  #e74c3c" >	{{$errors->first('c_title_seo')}} </div>
	
	
			@endif 
	     <div class="form-group">
	      <label for="name">Meta description:</label>
	      <input type="text" class="form-control"  placeholder="Meta description" name="c_description_seo" value="{{old('c_description_seo',isset($category->c_description_seo)? $category->c_description_seo :'')}}">
	    </div>
	    @if ($errors->has('c_description_seo'))
				<div class="error-tex" style="color:  #e74c3c" >	{{$errors->first('c_description_seo')}} </div>
	
	
			@endif 
	   <div class="checkbox">
    <label><input type="checkbox" name="hot">Nổi bật</label>
  </div>
	    
    <button type="submit" class="btn btn-success">Lưu danh mục</button>
	    	
	    </div>
	</div> 	

@stop