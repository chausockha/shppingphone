@extends('home.master')
@section('category')
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<style type="text/css">
	.money-active .active{color: #ff9705 !important;}
</style>
	<section class="cat_product_area section_gap">
		<div class="container-fluid">
			<div class="row flex-row-reverse">
				<div class="col-lg-9">
					<div class="product_top_bar">
						
						<div class="left_dorp">
							<!-- select id="id"  class="sorting" name="id">
								
							 @if(isset($category))
							@foreach($category as $value)
							<option value="{{$value->id}}"  >{{$value->c_name}}</option>
							@endforeach
							@endif

							</select> -->
							 <select id="id" class="form-control js_category_id "  name="id">
							 <option>Danh mục</option>
							  @foreach($category as $value) 
        				<option data-id="{{$value->id}}" value="{{$value->id}}">
        					{{$value->c_name}}
        				</option>
       		 			@endforeach 
      </select>
       <!-- <p  id="id1">hien thị </p> -->

       <input type="hidden" class="id1" name="" >
      	<select style="position: absolute; right: 60%;top: 8px;" class="form-control show" id="id-sp">
								<option value="desc">Mới nhất </option>
								<option value="asc">Sản phẩm cũ</option>
								<option value="price_max">Gía tăng dần</option>
								<option value="price_min">Gía giảm dần</option>
		</select>
      <input type="hidden" name="" class="number_id">			
						</div>
						<div class="right_page ml-auto">
							<nav class="cat_page" aria-label="Page navigation example">
								<ul class="pagination">
									<!-- <li class="page-item">
										<a class="page-link" href="#">
											<i class="fa fa-long-arrow-left" aria-hidden="true"></i>
										</a>
									</li> -->
									
								</ul>
							</nav>
						</div>
					</div>
			<div class="latest_product_inner row" id="product">
						@foreach($product as $value)							
                          <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="f_p_item">
                                 <div class="f_p_img">
                                    <a href="{{route('chitiet',$value->id)}}">
                           		@if($value->pro_number == 0)
								<span style="position: absolute;background: #e91e63;color:white;border-radius: 6px;font-size: 10px;padding: 2px 6px ">Tạm hết hàng</span>
								@endif
								@if($value->pro_sale >0)
								<span style="position: absolute;background-image: linear-gradient(-90deg,#ec1f1f 0%,#ff9c00 100%); border-radius: 10px; padding: 1px 7px; color: white;font-size: 13px; right: 0px; padding: 1px 7px;">{{$value->pro_sale}} %</span>
								@endif
                                <img class= "img-fluid" src="\shopping_phone\public\img\{{$value->pro_avatar}}"> </a>
                                    <div class="p_icon">
                                        <a class="js-favorite" href = "{{route('favorite',$value->id)}}" >
                                        <i class="lnr lnr-heart"></i>
                                    </a>
                                    <a href="{{route('add',$value->id)}}">
                                        <i class="lnr lnr-cart"></i>
                                    </a>
                                    </div>
                                </div>
                                <a >
                                    <h4>{{$value->pro_name}}</h4>
                                </a>
                               <h5 style=" color: #f57224">{{number_format($value->pro_price,0,',','.')}} đ</h5>
							@if ($value->pro_sale) 	
							<span style="color: #9e9e9e; text-decoration:line-through">{{number_format($value->pro_price*(100 - $value->pro_sale)/100,0,',','.')}}</span>
							@endif
                            </div>
                        </div> 
                        @endforeach  
                            
	

			</div>
					
					
				</div>
				<div class="col-lg-3">
					<div class="left_sidebar_area">
						<aside class="left_widgets cat_widgets">
							<div class="l_w_title">
								<h3>Khoảng giá</h3>
							</div>
							<div class="widgets_inner">
						
								<ul class="list">
									<li id="value" >
						
										<a class="js_money " data-price ="1"  href="{{route('getmoney',$value=1)}}" >  Dưới 1 triệu</a>
								 	
									</li>
									<li    id="value" >
										<a  class="js_money  "   href="{{route('getmoney',$value=2)}}">1.000.000 - 3.000.000 VNĐ</a>
										<input value="2" type="hidden" name="value">
									</li>
									<li   value="3" id="value" >
										<a   class="js_money " data-price ="3" href="{{route('getmoney',$value=3)}}">3.000.000 - 5.000.000 VNĐ</a>
									
									</li>
									<li  value="1" id="value" >
										<a   class="js_money" data-price ="4" href="{{route('getmoney',$value=4)}}">5.000.000 - 7.000.000 VNĐ</a>
										
									</li>
									<li  value="1" id="value" >
										<a  class="js_money" data-price ="5" href="{{route('getmoney',$value=5)}}">7.000.000 - 10.000.000 VNĐ</a>
										
									</li>
									<li  value="1" id="value" >
										<a  class="js_money" data-price ="6" href="{{route('getmoney',$value=6)}}">Trên 10.000.000 VNĐ</a>
									</li>
								</ul>
								
							</div>
						</aside>
						
					</div>
				</div>
			</div>

			<!-- <div class="row">
				<nav class="cat_page mx-auto" aria-label="Page navigation example">
					<ul class="pagination">
						<li class="page-item">
							<a class="page-link" href="#">
								<i class="fa fa-chevron-left" aria-hidden="true"></i>
							</a>
						</li>
						<li class="page-item active">
							<a class="page-link" href="#">01</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="#">02</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="#">03</a>
						</li>
						<li class="page-item blank">
							<a class="page-link" href="#">...</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="#">09</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="#">
								<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</li>
					</ul>
				</nav>
			</div> -->
		</div>
	</section>
	@endsection
	
	@section('script')
	
	<script type="text/javascript" > 

	


$(document).ready(function()
   {
    $(".js_category_id").change(function(){
    	 var value = $( "#id" ).val();
  		
    	 
    	    $( ".id1" ).val(value);
          console.log(value);

        $.get("getdanhmuc/" + value, function(data){

             $("#product").html(data);
      	});
      
       	});
    $(".show").change(function(){
    	var value = $("#id-sp").val();
    	var id1 = $(".id1").val();
    	//console.log(value);
    	 //console.log(id1);
    	 $.get("getgia/" + value+"/"+id1, function(data){

             $("#product").html(data);
      	});
    })
    $('.js_money').click(function(event){
    	  event.preventDefault();
    	  let $this = $(this);
		  let url = $this.attr('href');
		  let number = $('.id1').val();
		  // $(".js_money").text($this.attr('data-price'));
		    console.log(url);
    	    $.ajax({
				url : url,
				data: {
						number :number,
						//url:url,
						 _token: '{!! csrf_token() !!}',
					}
			}).done(function(data) {
				if (data) {
					$("#product").html('').append(data);
					//$("#product").html(data);
				}
			});

    	
    });


          });
</script>
	@stop
	