@extends('admin.master')
@section('themmoisanpham')
<nav style="margin-top: 50px" aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="{{route('tongquan')}}">Trang chủ</a></li>
		    <li class="breadcrumb-item"><a href="{{route('sanpham')}}">Sản phẩm</a></li>
		    <li class="breadcrumb-item active" aria-current="page">Thêm mới </li>
		  </ol>
		</nav>
			
				@if(Session::has('thanhcong'))
     <div class="alert alert-success" style="right: 20px ">
    <strong>Thành công!</strong> {{Session::get('thanhcong')}}
  </div>
    @endif  
    

    <div class="row">
    	<div class="col-sm-8">
    		<!-- <div class="col-sm-12">  -->
			<form action="store" method="post" enctype="multipart\formdata">
				{{ csrf_field()}}
	    <div class="form-group">
	      <label for="name">Tên sản phẩm:</label>
	      <input type="text" class="form-control" id="email" placeholder="Tên danh mục" name="pro_name" value="{{old('pro_name')}}">
		 @if ($errors->has('pro_name'))
						<div class="error-tex" style="color:  #e74c3c" >	{{$errors->first('pro_name')}} </div>
			
			
					@endif 
	    </div>
	   
		
	    <div class="form-group">
	      <label for="name">Mô tả:</label>
	      <textarea name="pro_description" class="form-control" cols="30" rows="3" placeholder="Mô tả ngắn" ></textarea>
	       @if ($errors->has('pro_description'))
				<div class="error-tex" style="color:  #e74c3c" >	{{$errors->first('pro_description')}} </div>
	
	
			@endif 
	  </div>
	    
		<div class="form-group">
	      <label for="name">Nội dung:</label>
	      <textarea name="pro_content" class="form-control" cols="30" rows="3" placeholder="Nội dung..."></textarea>
	      @if ($errors->has('pro_content'))
				<div class="error-tex" style="color:  #e74c3c" >	{{$errors->first('pro_content')}} </div>
	
	
			@endif 
	    </div>
	    
	     <div class="form-group">
	      <label for="name">Meta description:</label>
	      <input type="text" class="form-control"  placeholder="Meta description" name="pro_title_seo" value="{{old('c_title_seo')}}">
	    </div>
	    @if ($errors->has('c_title_seo'))
				<div class="error-tex" style="color:  #e74c3c" >	{{$errors->first('c_title_seo')}} </div>
	
	
			@endif 
		 <div class="form-group">
	      <label for="name">Meta title:</label>
	      <input type="text" class="form-control"  placeholder="Meta description" name="pro_description_seo" value="{{old('pro_description_seo')}}">
	    </div>	
			
	    
    <button type="submit" class="btn btn-success">Lưu danh mục</button>
    <!-- 	</div> -->

</div>
    	<div class="col-sm-4">
    		  <div class="form-group">
	      <label for="name">Loại sản phẩm:</label>
	      <select name="pro_category_id" class="form-control">
	      	<option value="">--Chọn loại sản phẩm--</option>
	      	@if(isset($category))
	      	@foreach($category as $value)
	      	<option value="{{$value->id}}">{{$value->c_name}} </option>
	      	@endforeach
	      	@endif
	      </select>
	       @if ($errors->has('pro_category_id'))
				<div class="error-tex" style="color:  #e74c3c" >	{{$errors->first('pro_category_id')}} </div>
	
	
			@endif 
	    </div>

	     <div class="form-group">
	      <label for="name">Gía sản phẩm:</label>
	      <input type="number" name="pro_price" value="" class="form-control" placeholder="Gía sản phẩm">
	      @if ($errors->has('pro_price'))
				<div class="error-tex" style="color:  #e74c3c" >	{{$errors->first('pro_price')}} </div>
	
	
			@endif 
	    </div>
	    <div class="form-group">
	      <label for="name">% khuyến mãi:</label>
	      <input type="number" name="pro_sale" value="0" class="form-control" placeholder="% giảm giá">
	    </div>
	     <div class="form-group">
	      <label for="name">Số lượng:</label>
	      <input type="number" name="pro_number" value="0" class="form-control" placeholder="Số lượng">
	        @if ($errors->has('pro_number'))
				<div class="error-tex" style="color:  #e74c3c" >	{{$errors->first('pro_number')}} </div>
	
	
			@endif 
	    </div>
	    
	    <div class="form-group">
	      <label for="name">Avatar:</label>
	      <img id="blah" style="height: 200px;width: 100%" src="{{asset('img/default-image.jpg')}}" >
	      <input onchange="readURL(this);" type="file"  name="avatar"  class="form-control" >
	    </div>
	    
	
    		 <div class="checkbox">
    <label><input type="checkbox" name="hot">Nổi bật</label>
  			</div>
    	</div>
    	</form>
    </div>
    @section('script')
<script type="text/javascript">
	  function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
@endsection
	 
	    
	
@stop
