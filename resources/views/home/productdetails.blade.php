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

.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;

  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 50%;
  max-width: 500px;
  padding-top: 5%;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
	
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}
.close {
  position: absolute;
  top: 15%;
  right: 100px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */


</style>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
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
</script>
	<!--================Single Product Area =================-->
	<div class="product_image_area">
		<div class="container" id="id-product"data-id="{{$producthot->id}}">
			<div class="row s_product_inner">
				<div class="col-lg-6">
					<div class="s_product_img">
						<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
							<!-- <ol class="carousel-indicators">
								<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
									<img src="" alt="">
								</li>
								<li data-target="#carouselExampleIndicators" data-slide-to="1">
									<img src="img/product/single-product/s-product-s-3.jpg" alt="">
								</li>
								<li data-target="#carouselExampleIndicators" data-slide-to="2">
									<img src="img/product/single-product/s-product-s-4.jpg" alt="">
								</li>
							</ol> -->
							<div class="carousel-inner">
								<div class="carousel-item active" >
									<img id="myImg" class="d-block w-100" src="\shopping_phone\public\img\{{$producthot->pro_avatar}}" alt="" style="height: 450px">
								</div>
								
							</div>
							<div id="myModal" class="modal">
								  <span class="close">&times;</span>
								  <img class="modal-content" id="img01">
							  <div id="caption">
							  </div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
						<h1>{{$producthot->pro_name}}</h1>
						<h2 style=" color: #f57224">{{number_format($producthot->pro_price,0,',','.',)}} đ</h2>
						@if ($producthot->pro_sale) 	
							<span style="color: #9e9e9e; text-decoration:line-through">{{number_format($producthot->pro_price*(100 - $producthot->pro_sale)/100,0,',','.')}}</span>
							@endif
						<ul class="list">
							<li>
								<a class="active" href="#">
									<span>View : {{$producthot->pro_view}}</span> </a>
							</li>
							<!-- <li>
								<a href="#">
									<span>Availibility</span> : In Stock</a>
							</li> -->
						</ul>
						<p>{{$producthot->pro_description}}</p>
					
						<div class="card_area">
							<a  class="main_btn add-cart"  href="{{route('add',$producthot->id)}}">Add to Cart</a>
							
							<a class=" {{!\Auth::id() ? 'js-show-login' : 'js-favorite' }}" href="{{route('favorite',$producthot->id)}} ">
										<i class="lnr lnr-heart"></i>
									</a>
						</div>
			
					</div>
				</div>
			</div>
		</div>
	</div>


	
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
		    		if ($producthot->pro_total_rating) {
		    		$age = round($producthot->pro_total_number / $producthot->pro_total_rating,2);
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
										<h6>{{$producthot->pro_total_rating}} lượt đánh giá</h6>
									</div>
								</div>
								
								<div class="col-6">
									<div class="rating_list">
										<h3>Đánh giá</h3>
										<ul class="list">
											@foreach($arrayRating as $key => $value )	
											<?php 
											$itemage =round(($value['total']/$producthot->pro_total_rating) *100,0);
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
							<a href="{{route('get-raiting',$producthot->id)}}" class="btn-load-rating" >Xem tất cả đánh giá <i class="fas fa-angle-right"></i></a>
							

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
										<a href="{{route('postrating',$producthot)}}"  class="{{!\Auth::id() ? 'js-show-login' : 'js_rating_product' }}" style="width: 200px; background: #288ad6;padding: 10px;color: white;
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
				console.log(content,number);
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
							//location.reload();
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
					if (result.messages1) {
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
		var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
})



	</script>
@stop

