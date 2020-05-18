
@extends('home.master') 
	@section('index')
<script type="text/javascript">
	$(function(){
 $(".js-show-login").click(function (event){
    	event.preventDefault();
    			$.confirm({
			    title: "<i style='color:#e74c3c' class='fa fa-warning'> Bạn phải đăng nhập</i>  ",
			    content: '',
			    type: 'red',
			    typeAnimated: true,
			    buttons: {
		        tryAgain: {
		            text: 'ok',
		            btnClass: 'btn-red',
		            action: function(result){
		         	 result.error;
		            }
		        },
		        close: function () {
	        }
	    }
				});
    	return false ;
    });
})
 

   window.addEventListener('unload', function (e) { 
            e.preventDefault(); 
            e.returnValue = ''; 
             sessionStorage.clear();
        }); 
		</script>


	<section class="feature_product_area section_gap" style="padding-top: 5%">
		<div class="main_box">
			<div class="container-fluid">
				<div class="row">
					<div class="main_title">
						<h2>Sản phẩm nổi bật</h2>
						<p></p>
					</div>
				</div>
				

				<div class="row">
					@if(isset($producthot))
				@foreach($producthot as $value)	
					<div class="col col1">
						<div class="f_p_item">
							<div class="f_p_img">
								<a href="{{route('chitiet',$value->id)}}">
								@if($value->pro_number == 0)
								<span style="position: absolute;background: #e91e63;color:white;border-radius: 6px;font-size: 10px;padding: 2px 6px ">Tạm hết hàng</span>
								@endif
								@if($value->pro_sale >0)
								<span style="position: absolute;background-image: linear-gradient(-90deg,#ec1f1f 0%,#ff9c00 100%); border-radius: 10px; padding: 1px 7px; color: white;font-size: 13px; right: 0px; padding: 1px 7px;">{{$value->pro_sale}} %</span>
								@endif
								<img class="img-fluid" src="\shopping_phone\public\img\{{$value->pro_avatar}}" alt=""> </a>
								<div class="p_icon">
									<a class=" {{!\Auth::id() ? 'js-show-login' : 'js-favorite' }}" href="{{route('favorite',$value->id)}} ">
										<i class="lnr lnr-heart"></i>
									</a>
									<a class="add-cart" href="{{route('add',$value->id)}}">
										<i class="lnr lnr-cart"></i>
									</a>
								</div>
							</div>
							<a href="#">
								<h4>{{$value->pro_name}}</h4>
							</a>
							<h5 style=" color: #f57224">{{number_format($value->pro_price,0,',','.')}} đ</h5>
							@if ($value->pro_sale) 	
							<span style="color: #9e9e9e; text-decoration:line-through">{{number_format($value->pro_price*(100 - $value->pro_sale)/100,0,',','.')}}</span>
							@endif
						</div>
					</div>
					@endforeach
					@endif
					</div>
					<div class="row">
					<nav class="cat_page mx-auto" aria-label="Page navigation example">
						<ul class="pagination">
							
							{{ $producthot->links() }}
							
						
						</ul>
					</nav>
				</div>
						
				
			</div>
		</div>
	</section>
	@include('component.productSuggest')
<section  class="feature_product_area section_gap" id="viewproduct">
	
</section>
	<section class="feature_product_area section_gap">
		<div class="main_box">
			<div class="container-fluid">
				<div class="row">
					<div class="main_title">
						<h2></h2>
						<p></p>
					</div>
				</div>
				

				<div class="row">
					@if(isset($product))
				@foreach($product as $value)	
					<div class="col col1">
						<div class="f_p_item">
							<div class="f_p_img">
								<a href="{{route('chitiet',$value->id)}}">
									@if($value->pro_number == 0)
								<span style="position: absolute;background: #e91e63;color:white;border-radius: 6px;font-size: 10px;padding: 2px 6px ">Tạm hết hàng</span>
								@endif
								@if($value->pro_sale >0)
								<span style="position: absolute;background-image: linear-gradient(-90deg,#ec1f1f 0%,#ff9c00 100%); border-radius: 10px; padding: 1px 7px; color: white;font-size: 13px; right: 0px; padding: 1px 7px;">{{$value->pro_sale}} %</span>
								@endif
								<img class="img-fluid" src="\shopping_phone\public\img\{{$value->pro_avatar}}" alt=""> </a>
								<div class="p_icon">
									<a class="{{!\Auth::id() ? 'js-show-login' : 'js-favorite' }}" href="{{route('favorite',$value->id)}}">
										<i class="lnr lnr-heart"></i>
									</a>
									<a class="add-cart" href="{{route('add',$value->id)}}">
										<i class="lnr lnr-cart"></i>
									</a>
								</div>
							</div>
							<a href="#">
								<h4>{{$value->pro_name}}</h4>
							</a>
							<h5  style=" color: #f57224">{{number_format($value->pro_price,0,',','.')}} đ</h5>
							@if ($value->pro_sale) 	
							<span style="color: #9e9e9e; text-decoration:line-through">{{number_format($value->pro_price*(100 - $value->pro_sale)/100,0,',','.')}}</span>
							@endif
						</div>
					</div>@endforeach
					@endif
					</div>
					

			<div class="row">
					<nav class="cat_page mx-auto" aria-label="Page navigation example">
						<ul class="pagination">
							
							
							
						
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</section>

	@stop
	@section('script')
	<script type="text/javascript">
		$(function(){

				
				
			let routeRenderProduct = '{{route('view-product')}}';
			checRenderProduct = false;
		$(document).on('scroll',function(){
			if($(window).scrollTop() > 400 && checRenderProduct ==false){
				checRenderProduct = true;
				//console.log('scroll');
				let products = localStorage.getItem('products');
				//console.log(products);
				products= $.parseJSON(products)

				if (products.length > 0 ) {
					$.ajax({
						url : routeRenderProduct,
						method:"POST",
						   
						data : { id: products,
						 _token: '{!! csrf_token() !!}'},
						
						success : function(result)
						{
							// console.log(result);

							 $("#viewproduct").html('').append(result.data);
							 //localStorage.removeItem('products');
							//localStorage.clear();
						}
					});
				}
	}
	
				});

		$(".js-favorite").click(function(e){
				event.preventDefault();
				let $this = $(this);
				let url = $this.attr('href');
				//console.log(url);
				if (url) {
				 $.ajax({
				url : url,
				method : "POST",
				data: {
						
						url:url,
						 _token: '{!! csrf_token() !!}',
					}
			}).done(function(result) {
			location.reload();

				//toastr.success(result.messages);
				
				alert(result.messages);
			});
				}
			})

		$(".add-cart").click(function(event){
			event.preventDefault();
			let url = $(this).attr('href');
			console.log(url);
			if (url) {
				$.ajax({
					url:url,
					data:{
						url:url,
						_token :'{!! csrf_token()!!}',
					}
				}).done(function(result){
					if (result.messages1){
						toastr.success(result.messages1);
						 location.reload();
					}else{
						$.confirm({
			    title: "<i style='color:#e74c3c' class='fa fa-warning'> Sản phẩm đã hết</i>  ",
			    content: '',
			    type: 'red',
			    typeAnimated: true,
			    buttons: {
		        tryAgain: {
		            text: 'ok',
		            btnClass: 'btn-red',
		            action: function(result){
		         	 result.error;
		            }
		        },
		        close: function () {
	        }
	    }
				});
					}
					
			
				})
			}
		})
	})
	</script>
	@stop

	