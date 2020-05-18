@extends('admin.master')
@section('sanpham')
<style type="text/css">
	.rating .active {color: #ff9705 !important;}
</style>
<nav style="margin-top: 50px" aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="{{route('tongquan')}}">Trang chủ</a></li>
		    <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
		    <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
		  </ol>
		</nav>
		<div class="row">
			<div class="col-sm-12">
				<form class="form-inline" action="{{route('sanpham')}}" method="get" role="form" style="margin-bottom: 20px">
					<div class="form-group">
						<input type="text" name="name" class="form-control" id="" placeholder="Tên sản phẩm" value="{{\Request::get('name')}}">
					</div>
					<div class="form-group">
						<select name="cate" class="form-control">
							  <option value="0"  > --Danh mục--</option> 
							 @if(isset($category))
							@foreach($category as $value)
							<option value="{{$value->id}}" {{\Request::get('cate')==$value->id ?"selected='selected'" :"" }} >{{$value->c_name}}</option>
							@endforeach
							@endif

						</select>
					</div>
					<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
				</form>
			</div>
		</div>
		
		<div class="table-responsive">
			<h2>Quản lý sản phẩm <a href="{{route('themmoisanpham')}}" class="pull-right"><i class="fas fa-plus-circle"></i></a> </h2>
		    <table class="table table-hover">
		    <thead>
		      <tr>
		        <th>#</th>
		        <th>Tên sản phẩm</th>
		        <th>Loại sản phẩm</th>
		        <th>Hình ảnh</th>
		        <th>Trạng thái</th>
		        <th>Nổi bật</th>
		        <th>thao tác</th>
		      </tr>
		    </thead>
		    <tbody>
		    
		    	@if(isset($product))
		    	@foreach($product as $value)
					<input type="hidden" id="qty-js{{$value->id}}" name="id"  value="{{$value->id}}">
			<script type="text/javascript">
				$(function(){
				 $( window).on( "load", function() {	
				var id = {{$value->id}};
				//console.log(id);
				
				 $.get("kt-sl/"+id, function(data){
				 	
				 		
				if (data.error){
				<?php 
					
					if($value->pro_number == 0) 
             			?>
             		let URL  = '{{route('editsanpham',$value->id)}}';
					 var text = "Có "+data.qty+" sản phẩm hết hàng" ;
					  
						$.confirm({
			    title: "<i style='color:#e74c3c' class='fa fa-warning'> " +text+ "  </i>  " ,
			    content: ' Bạn có muốn cập nhật',
			    type: 'red',
			    typeAnimated: true,
			    buttons: {
		        tryAgain: {
		            text: 'ok',
		            btnClass: 'btn-red',
		            action: function(data){
		           
		           	 window.location.href = URL ;
		         	 //data.error;
		            }
		        },
		        close: function () {
	        }
	    }
				});
					}
            
      	});
				


				})
				});
			
			</script>
		    	<?php
		    		$age = 0;
		    		if ($value->pro_total_rating) {
		    			$age = round($value->pro_total_number / $value->pro_total_rating,2);
		    		}
		    	?>
		      <tr>
		        <td >{{$value->id}}</td>
		        
		        <td style="width: 40%">{{$value -> pro_name}}
		        	<ul style="padding-left: 15px">
		        		<li><span> <i class=""> </i> </span><span>{{number_format($value->pro_price,0,',','.')}} VNĐ</span> </li>
		        		<li><span>Khuyến mãi: <i class=""> </i> </span><span>{{$value->pro_sale}} %</span> </li>
		        		<li> <span>Đánh giá:</span>
		        			<span class="rating">
		        				@for($i=1 ;$i<=5;$i++)
		        					<i style="color:#999" class="fa fa-star {{$i <= $age ? 'active' : ''}}" ></i>
		        				@endfor
		        			</span>
		        			<span> {{$age}}</span>
		        		</li>
		        		<li>
		        			<span>Số lượng: <span>{{$value->pro_number}} </span></span>
		        		</li>
		        	</ul>
		        </td>
		        <td >{{isset($value->category->c_name) ? $value->category->c_name :'[N\A]'}}</td>
		        <td>
		        	<img src="\shopping_phone\public\img\{{$value->pro_avatar}}" class="img img-responsive" style="width: 80px; height: 80px">
		        </td>
		        <td><a href="{{route('changestatus',['active',$value->id])}}" class="label {{$value->getstatus($value->pro_active)['class']}}">{{$value->getstatus($value->pro_active)['name']}} </a></td>
		        <td><a href="{{route('changestatus',['hot',$value->id])}}" class="label {{$value->gethot($value->pro_hot)['class']}}"> {{$value->gethot($value->pro_hot)['name']}}</a></td>
		        <td>
		        	<a  style="padding: 5px 10px;border: 1px solid #999;font-size:12px;"  href="{{route('editsanpham',$value->id)}}"><i  class="fas fa-pen"></i >Cập nhật</a>
					<a class="js-delete" style="padding: 5px 10px;border: 1px solid #999;font-size: 12px" href="{{route('deletesanpham',$value->id)}}"><i class="fas fa-trash-alt"></i>Xóa</a>
		        </td>
		      </tr>
				@endforeach
				@endif

		     
		    </tbody>
		  </table>
		   <center>{{ $product->appends($query)->links() }}</center>
		</div>  
		  </div>

<script type="text/javascript">
	$(function(){
		$('.js-delete').click(function(){
			event.preventDefault();
			let URL = $(this).attr('href');
		$.confirm({
    title: "<i style='color:#e74c3c' class='fa fa-warning'> Bạn có muốn xóa  </i> ",
    content: 'Dữ liệu xóa đi sẽ không thể khôi phục',
    type: 'red',
    typeAnimated: true,
    buttons: {
        tryAgain: {
            text: 'Ok',
            btnClass: 'btn-red',
            action: function(){
            window.location.href = URL ;
            }
        },
        close: function () {
        }
    }
});
		})

	 $( window).on( "load", function() {
	 	//let $this = $(this);
	 	//let idproduct = $this.attr('data-id');
	 	//var id = $("input[name='id']").val();
	 	//var data = $('form#form_input').serialize();
	 	// var idproduct[];
	 	// for (var i = 0; i < Things.length; i++) {
	 	// 	idproduct[i] = $("#qty-js").val();
	 	// }
	 	
	 	// //var arry =[idproduct];
	 	// for (var i = 0; i < idproduct.length; i++) {
	 	// 	console.log(idproduct[i]);
	 	// }
	 	//console.log(qty);
	 	
		 //var idproduct = $this.attr('data-id');
		
	
	
		
	});	


	});
</script>

@stop

