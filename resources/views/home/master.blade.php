<!doctype html>
<html lang="en">

<head>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<title>shop điện thoại</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{asset('asset/css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{asset('asset/css/bootstrap.min.css.map')}}">
	<link rel="stylesheet" href="{{asset('asset/vendors/linericon/style.css')}}">
	<link rel="stylesheet" href="{{asset('asset/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('asset/vendors/owl-carousel/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('asset/vendors/lightbox/simpleLightbox.css')}}">
	<link rel="stylesheet" href="{{asset('asset/vendors/nice-select/css/nice-select.css')}}">
	<link rel="stylesheet" href="{{asset('asset/vendors/animate-css/animate.css')}}">
	<link rel="stylesheet" href="{{asset('asset/vendors/jquery-ui/jquery-ui.css')}}">
	
	<!-- main css -->
	<link rel="stylesheet" href="{{asset('asset/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('asset/css/responsive.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
	<!-- Toastr -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
	
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

<!-- alert-confirm -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
 
   
</head>

<style type="text/css">
	.number-cart{
		position: absolute;
    background: #f36e36;
    color: #fff;
    top: 16px;
    font-weight: 400;
    right: 30px;
    text-align: center;
    border: 3px solid #f36e36;
    font-size: 13px;
    min-width: 14px;
    line-height: 14px;
    border-radius: 50%;

	}
	#back_to_top{
 border:1px solid #4adcff;
 background:#24bde2;
 text-align:center;
 padding:5px;
 position:fixed;
 bottom:35px;
 right:10px;
 cursor:pointer;
 display:none;
 color:#fff;
 font-size:30px;
 font-weight:900
 }
 
 #back_to_top:hover{
 border:1px solid #ffa789;
 background:#ff6734
 }
	
.slideshow-kha {
  max-width: 1000px;
  position: relative;
  margin: auto;
 padding: auto;
}
.img{
	 width: 100%;
  height: 100%;
}
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active1 {
  background-color: #717171;
}
.kha{
  -webkit-animation-name: kha;
  -webkit-animation-duration: 1.5s;
  animation-name: kha;
  animation-duration: 1.5s;
}

@-webkit-keyframes kha {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes kha {
  from {opacity: .4} 
  to {opacity: 1}
}

.khalz {
	display: block;
	width: 90%;
	height: 350px;
	margin-left: auto;
	margin-right: auto;
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}

.slides-js {display: none;}
img {vertical-align: middle;}


.form{
    position: relative;
    top: 40px;
    left: 50%;
    transform: translate(-50%,-50%);
    transition: all 1s;
    width: 50px;
    height: 50px;
   /* background: white;*/
    box-sizing: border-box;
    border-radius: 30px;
    border: 5px solid #f8f9fa;
    padding: 5px;
}
.input{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;;
    height: 42.5px;
    line-height: 30px;
    outline: 0;
    border: 0;
    display: none;
    font-size: 1em;
    border-radius: 20px;
    padding: 0 20px;
}
.form:hover{
    width: 170px;
    height: auto;
    cursor: pointer;
}

.form:hover .input{
    display: block;
}

.form:hover .fa{
    background: #07051a;
    color: white;
}
</style>
<body >

	<!--================Header Menu Area =================-->
	
	<header class="header_area">
		<div class="top_menu row m0">
			<div class="container-fluid">
				<div class="float-left">
					<p>Liên hệ: Chau Sóc Kha </p>
				</div>
				<div class="float-right">
					<ul class="right_side">
						@if(Auth::check())
						<li>
							<a href="{{route('dangxuat')}}">
								Thoát
							</a>

						</li>
						<li>
							<a href="{{route('updatepw')}}">
								{{Auth::user()->name}}
							</a>
						</li>
						<li>
							<a href="contact.html">
								Contact Us
							</a>
						</li>
						@else 
							<li>
								<a href="{{route('dangky')}}">
									Register 
								</a>

							</li>
							<li>
								<a href="{{route('dangnhap')}}">
									Login
								</a>

							</li>
						@endif
					</ul>
				</div>
			</div>
		</div>
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.html">
						<!-- <img src="img/logo.png" alt=""> -->
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
					 aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<div class="row w-100">
							<div class="col-lg-7 pr-0">
								<ul class="nav navbar-nav center_nav pull-right" style="    padding-right: 135px;">
									<li class="nav-item ">
										<a class="nav-link" href="{{route('index')}}">Trang chủ</a>
									</li>
									<li class="nav-item submenu dropdown">
										<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Shop</a>
										<ul class="dropdown-menu">
											<li class="nav-item">
												<a class="nav-link" href="{{route('danhmucsanpham')}}">Danh mục sản phẩm</a>
												<li class="nav-item">
													<a class="nav-link" href="single-product.html">Product Details</a>
													<li class="nav-item">
														<a class="nav-link" href="checkout.html">Product Checkout</a>
														<li class="nav-item">
															<a class="nav-link" href="cart.html">Shopping Cart</a>
														</li>
														<li class="nav-item">
															<a class="nav-link" href="confirmation.html">Confirmation</a>
														</li>
										</ul>
									</li>
									<li class="nav-item submenu dropdown">
										<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog</a>
										<ul class="dropdown-menu">
											<li class="nav-item">
												<a class="nav-link" href="blog.html">Blog</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="single-blog.html">Blog Details</a>
											</li>
										</ul>
									</li>
									<li class="nav-item submenu dropdown">
										<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages</a>
										<ul class="dropdown-menu">
											<li class="nav-item">
												<a class="nav-link" href="login.html">Login</a>
												<li class="nav-item">
													<a class="nav-link" href="tracking.html">Tracking</a>
													<li class="nav-item">
														<a class="nav-link" href="elements.html">Elements</a>
													</li>
										</ul>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="contact.html">Contact</a>
									</li>
								</ul>
							</div>
							@if(Auth::check())
							<div class="col-lg-5">	
								<ul class="nav navbar-nav navbar-right right_nav pull-right">
									<hr>

										<li class="nav-item">
									<div class=" searchBox">
							        <form class="form" action="">
							  			<input id="search-js" class="input" type="search">
							  			<i style="font-size: 20px" class="fas fa-search "></i>
									</form>
									 {{ csrf_field() }}
									
									
 									<div id="productList">
              						</div>
              					</div>
									

									</li>

									<hr>

									<li class="nav-item">
										<a href="{{route('infor')}}" class="icons">
											<i class="fa fa-user" aria-hidden="true"></i>
										</a>
									</li>

									<hr>

									<li class="nav-item">
										<a href="{{route('Viewfavorite')}}" class="icons">
											<i class="fa fa-heart-o" aria-hidden="true">{{get_favorite()}}</i>
										</a>
									</li>

									<hr>

									<li class="nav-item">
										<a href="{{route('danhsach')}}" class="icons">
											<i class="lnr lnr lnr-cart"></i>
											<span class="{{!Cart::getTotalQuantity() >= 1 ? '' :'number-cart' }}">{{Cart::getTotalQuantity()}} </span>
										</a>
									</li>

									<hr>
								</ul>
							</div>@else
									<div class="col-lg-5">	
								<ul class="nav navbar-nav navbar-right right_nav pull-right">
									<hr>
									<li class="nav-item">
									<div class=" searchBox">
							        <form class="form" action="">
							  			<input id="search-js" class="input" type="search">
							  			<i style="font-size: 20px" class="fas fa-search "></i>
									</form>
									 {{ csrf_field() }}
									
									
 									<div id="productList">
              						</div>
              					</div>
									</li>

									<hr>

									<li class="nav-item">
										<a href="" class="icons">
											<i class="fa fa-user" aria-hidden="true"></i>
										</a>
									</li>

									<hr>

									<li class="nav-item">
										<a href="" class="icons">
											<i class="fa fa-heart-o" aria-hidden="true">{{get_favorite()}}</i>
										</a>
									</li>

									<hr>

									<li class="nav-item">
										<a href="{{route('danhsach')}}" class="icons">
											<i class="lnr lnr lnr-cart"></i>
											<span class="{{!Cart::getTotalQuantity() >= 1 ? '' :'number-cart' }}">{{Cart::getTotalQuantity()}} </span>
										</a>
									</li>

									<hr>
								</ul>
							</div> 
							@endif

						</div>
					</div>
				</div>
			</nav>
		</div>
	</header>
	
	<!--================Header Menu Area =================-->

	<!--================Home Banner Area =================-->
<div style="padding-top: 9%;" class="slideshow-kh">
  	
<div class="mySlides-js kha">

  <img src="{{asset('img/banner/laptop-onha-800-300-800x300.png')}}" class="khalz">
  
 
</div>
<div class="mySlides-js kha">

  <img src="{{asset('img/banner/800-300-800x300-21.png')}}"  class="khalz">
 
</div>
<div class="mySlides-js kha">

  <img src="{{asset('img/banner/800-300-800x300-20.png')}}"  class="khalz">
 
</div>




</div>

 </div>
  <div style="text-align:center">
	  <span class="dot" onclick="currentSlide(1)"></span> 
	  <span class="dot" onclick="currentSlide(2)"></span> 
	  <span class="dot" onclick="currentSlide(3)"></span> 
</div>
<script type="text/javascript">
$(function(){
	$('#search-js').keyup(function(event){
		event.preventDefault();
		var key = $(this).val();
		if(key == ""){
		$('#productList').fadeOut();
		}else{
				var _token = $('input[name="_token"]').val();
			$.ajax({
				url:"{{route('search')}}",
				data:{ key:key,
					   _token:_token
						},
				success:function(data){
					// var kq;
					// if(kq.data == ""){
					// 	$('#productList').fadeOut();
					// }
					$('#productList').fadeIn();
					$('#productList').html(data);
				}		
			});

		}


		//console.log(key);
	});

	
});
var slideIndex = 0;
 showSlides();
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

// function currentSlide(n) {
//   showSlides(slideIndex = n);
// }
function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides-js");
  //console.log(slides)
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active1", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active1";
  setTimeout(showSlides, 3000); // Change image every 2 seconds
}

</script>
    @toastr_js
    @toastr_render
    
    	@if(Session::has('message'))<script type="text/javascript">
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }

   
 
</script> @endif


	
<!-- Modal -->

			@if(Session::has('success'))
				 <div class="alert alert-success" style="position:fixed;right: 20px;top:20px;left: 50%;transform: translateX(-50%); z-index: 99999999; text-align: center;">
    	<strong>Chúc mừng!</strong> {{Session::get('success')}}
  </div>
			@endif	
				@if(Session::has('warning'))
				 <div class="alert alert-warning" style="position:fixed;right: 20px;top:20px;left: 50%;transform: translateX(-50%); z-index: 99999999; text-align: center;">
    	<strong>Thông cảm!</strong> {{Session::get('warning')}}
  </div>
			@endif	
			@if(Session::has('danger'))
				 <div class="alert alert-danger" style="position:fixed;right: 20px;top:20px;left: 50%;transform: translateX(-50%); z-index: 99999999; text-align: center;">
    	<strong>Thông cảm!</strong> {{Session::get('danger')}}
  </div>
			@endif	

				@yield('index')
				@yield('category')	
				
				@yield('script')	
				@yield('productdetails')
				@yield('dangky')
				@yield('dangnhap')
				@yield('danhsach')
				@yield('thanhtoan')
				@yield('gia_sp')
				@yield('infor')
				@yield('updatepw')
				@yield('email')
				@yield('reset')
				@yield('favorite')
<div id='back_to_top'><i class="fa-arrow-circle-up fa"></i></div>
	<footer class="footer-area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-3  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6 class="footer_title">About Us</h6>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua.</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6 class="footer_title">Newsletter</h6>
						<p>Stay updated with our latest trends</p>
						<div id="mc_embed_signup">
							<form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
							 method="get" class="subscribe_form relative">
								<div class="input-group d-flex flex-row">
									<input name="EMAIL" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '"
									 required="" type="email">
									<button class="btn sub-btn">
										<span class="lnr lnr-arrow-right"></span>
									</button>
								</div>
								<div class="mt-10 info"></div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-footer-widget instafeed">
						<h6 class="footer_title">Instagram Feed</h6>
						<ul class="list instafeed d-flex flex-wrap">
							<li>
								<img src="" alt="">
							</li>
							<li>
								<img src="" alt="">
							</li>
							<li>
								<img src="" alt="">
							</li>
							<li>
								<img src="" alt="">
							</li>
							<li>
								<img src="" alt="">
							</li>
							<li>
								<img src="" alt="">
							</li>
							<li>
								<img src="" alt="">
							</li>
							<li>
								<img src="" alt="">
							</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-6 col-sm-6">
					<div class="single-footer-widget f_social_wd">
						<h6 class="footer_title">Follow Us</h6>
						<p>Let us be social</p>
						<div class="f_social">
							<a href="#">
								<i class="fa fa-facebook"></i>
							</a>
							<a href="#">
								<i class="fa fa-twitter"></i>
							</a>
							<a href="#">
								<i class="fa fa-dribbble"></i>
							</a>
							<a href="#">
								<i class="fa fa-behance"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row footer-bottom d-flex justify-content-between align-items-center">
				<p class="col-lg-12 footer-text text-center"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				</p>
			</div>
		</div>
	</footer>
	
	
	

	
	 <script src="https://kit.fontawesome.com/440c4e8be2.js" crossorigin="anonymous"></script>
	 <script src="{{asset('asset/js/theme.js')}}"></script> 


<script type="text/javascript">
		$(function(){
	 $(window).scroll(function() {
     if ($(this).scrollTop() >100) {
            $('#back_to_top').fadeIn();
         } else {
            $('#back_to_top').fadeOut();
         }
     });
 
     $('#back_to_top').click(function() {
         $('body,html').animate({scrollTop: 0}, 1000);
     });
 })
</script>
	
</body>

</html>