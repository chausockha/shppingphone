
			<div class="col-sm-12"> 
			<form action="themmoi" method="post" enctype="multipart\formdata">
				{{ csrf_field()}}
	    <div class="form-group">
	      <label for="name">Tên danh mục:</label>
	      <input type="text" class="form-control" id="email" placeholder="Tên danh mục" name="name" value="{{old('name')}}">

	    </div>
	     @if ($errors->has('name'))
				<div class="error-tex" style="color:  #e74c3c" >	{{$errors->first('name')}} </div>
	
			@endif
		
	    <div class="form-group">
	      <label for="name">Icon:</label>
	      <input type="text" class="form-control" id="email" placeholder="fa fa-home" name="icon" value="{{old('icon')}}">
	    </div>
	     @if ($errors->has('icon'))
				<div class="error-tex" style="color:  #e74c3c" >	{{$errors->first('icon')}} </div>
	
	
			@endif 
		<div class="form-group">
	      <label for="name">Meta title:</label>
	      <input type="text" class="form-control"  placeholder="Meta title" name="c_title_seo" value="{{old('c_title_seo')}}">
	    </div>
	    @if ($errors->has('c_title_seo'))
				<div class="error-tex" style="color:  #e74c3c" >	{{$errors->first('c_title_seo')}} </div>
	
	
			@endif 
	     <div class="form-group">
	      <label for="name">Meta description:</label>
	      <input type="text" class="form-control"  placeholder="Meta description" name="c_description_seo" value="{{old('c_description_seo')}}">
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
