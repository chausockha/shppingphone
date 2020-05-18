@extends('admin.master')
@section('updatesanpham')
<nav style="margin-top: 50px" aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="{{route('tongquan')}}">Trang chủ</a></li>
		    <li class="breadcrumb-item"><a href="{{route('sanpham')}}">Sản phẩm</a></li>
		    <li class="breadcrumb-item active" aria-current="page">Update </li>
		  </ol>
		</nav>
			<div class="col-sm-12"> 
				@if(Session::has('thanhcong'))
    <center> <div class="alert alert-success " style="color:#e74c3c "  >{{Session::get('thanhcong')}} </div>  </center>
    @endif  

    <div class="row">
    	<div class="col-sm-8">
    		<!-- <div class="col-sm-12">  -->
			<form action="{{route('updatesanpham')}}" method="post">
				{{ csrf_field()}}
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
	    <div class="form-group">
	      <label for="name">Tên sản phẩm:</label>
	      <input type="text" class="form-control" id="email" placeholder="Tên danh mục" name="pro_name" value="{{old('pro_name',isset($product->pro_name)? $product->pro_name :'' )}}">
	      <input type="hidden" name="id" value="{{$product->id}}" >
		 @if ($errors->has('pro_name'))
						<div class="error-tex" style="color:  #e74c3c" >	{{$errors->first('pro_name')}} </div>
			
			
					@endif 
	    </div>
	   
		
	    <div class="form-group">
	      <label for="name">Mô tả:</label>
	      <textarea   name="pro_description" class="form-control" cols="30" rows="3" placeholder="Mô tả ngắn" >{{old('pro_description',isset($product->pro_description)? $product->pro_description :'' )}}</textarea>
	       @if ($errors->has('pro_description'))
				<div class="error-tex" style="color:  #e74c3c" >	{{$errors->first('pro_description')}} </div>
	
	
			@endif 
	  </div>
	    
		<div class="form-group">
	      <label for="name">Nội dung:</label>
	      <textarea name="pro_content" class="form-control" cols="30" rows="3" placeholder="Nội dung..."> {{old('pro_content',isset($product->pro_content)? $product->pro_content :'' )}}</textarea>
	      @if ($errors->has('pro_content'))
				<div class="error-tex" style="color:  #e74c3c" >	{{$errors->first('pro_content')}} </div>
	
	
			@endif 
	    </div>
	    
	     <div class="form-group">
	      <label for="name">Meta description:</label>
	      <input type="text" class="form-control"  placeholder="Meta description" name="pro_title_seo" value="{{old('pro_title_seo',isset($product->pro_title_seo)? $product->pro_title_seo :'' )}}">
	    </div>
	    @if ($errors->has('c_title_seo'))
				<div class="error-tex" style="color:  #e74c3c" >	{{$errors->first('c_title_seo')}} </div>
	
	
			@endif 
		 <div class="form-group">
	      <label for="name">Meta title:</label>
	      <input type="text" class="form-control"  placeholder="Meta description" name="pro_description_seo" value="{{old('pro_description_seo',isset($product->pro_description_seo)? $product->pro_description_seo :'' )}}">
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
	      	<option value="{{$value->id}}" {{old('pro_categoty_id',isset($product->pro_category_id) ? $product->pro_category_id : '' ==$value->id ? "selected='selected'" :"")}}>{{$value->c_name}} </option>
	      	@endforeach
	      	@endif
	      </select>
	       @if ($errors->has('pro_category_id'))
				<div class="error-tex" style="color:  #e74c3c" >	{{$errors->first('pro_category_id')}} </div>
	
	
			@endif 
	    </div>

	     <div class="form-group">
	      <label for="name">Gía sản phẩm:</label>
	      <input type="number" name="pro_price" value="{{old('pro_price',isset($product->pro_price)? $product->pro_price :'' )}}" class="form-control" placeholder="Gía sản phẩm">
	      @if ($errors->has('pro_price'))
				<div class="error-tex" style="color:  #e74c3c" >	{{$errors->first('pro_price')}} </div>
	
	
			@endif 
	    </div>
	    <div class="form-group">
	      <label for="name">% khuyến mãi:</label>
	      <input type="number" name="pro_sale" value="{{old('pro_sale',isset($product->pro_sale)? $product->pro_sale :'' )}}" class="form-control" placeholder="% giảm giá">
	    </div>
	    <div class="form-group">
	      <label for="name">Số lượng:</label>
	      <input type="number" name="pro_number" value="{{old('pro_number',isset($product->pro_number)? $product->pro_number :'' )}}" class="form-control" placeholder="Số lượng">
	        @if ($errors->has('pro_number'))
				<div class="error-tex" style="color:  #e74c3c" >	{{$errors->first('pro_number')}} </div>
	
	
			@endif 
	    </div>
	   <div class="form-group">
	      <label for="name">Avatar:</label>
	      <img id="blah" style="height: 200px;width: 100%"  src="{{asset('img/default-image.jpg')}}" >
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