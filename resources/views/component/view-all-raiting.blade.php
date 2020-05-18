@extends('home.master')
@section('productdetails')

<style type="text/css">
	.list_text{
		display: inline-block;
    margin-left: 10px;
    position: relative;
    background: #52b858;
    color: #fff;
    padding: 2px 8px;
    box-sizing: border-box;
    font-size: 12px;
    border-radius: 2px;
    display: none;

	}
	.list_text:after{
		right: 100%;
    top: 50%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    border-color: rgba(82,184,88,0);
    border-right-color: #52b858;
    border-width: 6px;
    margin-top: -6px;
	}
	
	.list_start .rating_active{
		color: #fbd600;
		
	}
	.star-user .active{color: #ff9705 !important;}
	.list .active{color: #ff9705 !important;}



</style>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<script type="text/javascript">
	$(function(){
		$(".js-show-login").click(function(event){
			event.preventDefault();
    	toastr.warning("Bạn phải đăng nhập");
    	return false ;
		});

		
	})
</script>
	<!--================Single Product Area =================-->


	
	<section class="product_description_area">
		<div class="container">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				
				
				<li class="nav-item">
					<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Comments</a>
				</li>
				
			</ul>
			<div class="tab-content" id="myTabContent">
				
				<?php
		    		$age = 0;
		    		if ($product->pro_total_rating) {
		    		$age = round($product->pro_total_number / $product->pro_total_rating,2);
		    						}
		    	?>
				
				<div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
					<div class="row">
						<div class="col-lg-6">
							<div class="row total_rate">
								<div class="col-6">
									<div class="box_total">
										<h5>Tổng điểm</h5>
										<h4>{{$age}}</h4>
										<h6>{{$product->pro_total_rating}} lượt đánh giá</h6>
									</div>
								</div>
								
								<div class="col-6">
									<div class="rating_list">
										<h3>Đánh giá</h3>

										<ul class="list">
											@foreach($arrayRating as $key => $value )	
											<?php 
											$itemage =round(($value['total']/$product->pro_total_rating) *100,0);
											?>
											<li>
												<a href="#">{{$key}} Sao
												<span class="fa fa-star"></span> 
												<span>{{$value['total']}} Đánh giá</span>
									<div style="width:150px;color: color: #ff9705">
									<div class="progress" style="height:16px; margin:8px 0; color: #ff9705">
									<div class="progress-bar bg-warning " role="progressbar" style="width:{{$itemage}}% ">
										{{$itemage}} %
								 	 </div>
									</div>
									</div> 
												
												</a>
												
													</li>
											
													

												@endforeach
												<span></span>
									
													
											
										</ul>
									</div>
								</div>
							</div>
			

							@if(isset($rating))
								@foreach($rating as $value)
							<div style="padding: 10px 0" class="rating_item">
								<div>
									<span style="color: #333;font-weight: bold;text-transform: capitalize;">{{isset($value->user->name) ? $value->user->name : '[N\A]'}}</span>
									<a href="" style="color: #3ba832"><i class="fa fa-check-circle-o"></i>Đã mua hàng tại website</a>
								</div>
								<p style="" >
									<span class="star-user">
										@for($i=1;$i<=5;$i++)
										<i  style="color: #999"  class="fa fa-star {{$i<= $value->ra_number ? 'active' : ''}}"></i>
										@endfor
									</span><!-- {{$value->ra_content}} -->
									<span style="color: #333" >{{isset($value->ra_content) ? $value->ra_content : ''}}</span>
								</p> 
								<div>
									<span><i class="fa fa-clock-o"></i>{{$value->created_at}}</span>
								</div>
							</div>
							@endforeach
							@endif
							<div>
								{{ $rating->links() }}
							</div>
								
							

						</div>
						<div class="col-lg-6">
							<div class="review_box">
								<h4>Đánh giá sản phẩm</h4>
								<p>Đánh giá của bạn:</p>
								<ul class="list">
									<li class="list_start">
										<a style="color: whitesmoke" href="#">
											@for($i=1; $i<=5; $i++)
											<i style="" class="fa fa-star" data-key={{$i}}></i>
											@endfor
										</a>
									</li>
								</ul>
								<span class="list_text" >Outstanding</span>
								<input type="hidden" name="" class="number_rating">
								<form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
									<div class="col-md-12">
									
									<div class="col-md-12">
										<div class="form-group">
											<textarea class="form-control" name="message" id="ra_content" rows="1" placeholder="Review"></textarea>
										</div>
									</div>
									<div class="col-md-12 text-right">
										<a href="{{route('postrating',$product)}}"  class="{{!\Auth::id() ? 'js-show-login' : 'js_rating_product' }}" style="width: 200px; background: #288ad6;padding: 10px;color: white;
										border-radius: 5px">Gửi đánh giá</a>
									</div>
 									
								</form>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


@stop

@section('script')
	<script type="text/javascript">
	
		$(function(){
			let listStar = $(".list_start .fa");

			listRatingText = {
				1:'Không thích',
				2:'Tạm được',
				3:'Bình thường' ,
				4:'Rất tốt',
				5:'Tuyệt vời quá',
			}
			listStar.mouseover(function(){
				let $this = $(this);
				let number  = $this.attr('data-key');
				listStar.removeClass('rating_active');
				
				$(".number_rating").val(number);

				$.each(listStar, function(key,value){
					if(key + 1 <= number){
						$(this).addClass('rating_active')
					}
				})
				$(".list_text").text('').text(listRatingText[number]).show();
				//console.log($this.attr('data-key'))
			});
			$(".js_rating_product").click(function(e){
				event.preventDefault();
				let content = $('#ra_content').val();
				let number = $('.number_rating').val();
				//console.log(content,number);
				let url = $(this).attr('href');
				if(content && number){
					$.ajax({
					url: url,
					type: 'POST',
					data: {
						number :number,
						content:content,
						 _token: '{!! csrf_token() !!}',
					}
					}).done(function(result){
						// console.log(result);
						if (result.code == 1) {
							location.reload();
							toastr.success('Gửi đánh giá thành công');
							
						}
					});
				}
			})

		
			let idproduct = $("#id-product").attr('data-id');
			 //console.log(idproduct);
			// let products = localStorage.key="products";
			let products = localStorage.getItem('products');
			if (products == null) {
				arrayProduct = new Array();
				arrayProduct.push(idproduct);
				localStorage.setItem('products',JSON.stringify(arrayProduct));
			}else{
				//lấy giá trị mảng id đã lưu
				let products = localStorage.getItem('products');
				//chuyển về mảng
				products = $.parseJSON(products)

				if (products.indexOf(idproduct) == -1) {
					products.push(idproduct);
					localStorage.setItem('products',JSON.stringify(products));
				}
				//console.log(products);
			}
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

		})

	</script>
@stop

