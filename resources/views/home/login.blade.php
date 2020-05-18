	@extends('home.master')
	@section('dangnhap')
	<section class="login_box_area p_120">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="img/login.jpg" alt="">
						<div class="hover">
							<h4>Xin chào</h4>
							
							<a class="main_btn" href="{{route('dangky')}}">Create an Account</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Log in to enter</h3>
						@if(Session::has('loi'))
    			<center> <div class="alert alert-success " style="color:#e74c3c "  >{{Session::get('loi')}} </div>  </center>
    				@endif  
						<form class="row login_form" action="{{route('postdangnhap')}}" method="post" id="contactForm" novalidate="novalidate">
							{{ csrf_field()}}
							<div class="col-md-12 form-group">
								<input type="email" class="form-control" id="name" name="email" placeholder="Email">
								@if ($errors->has('email'))
								<div class="error-tex" style="color:  #e74c3c" >	{{$errors->first('email')}} </div>
								@endif 
							</div>
							<div class="col-md-12 form-group">
							<input type="password" class="form-control" id="name" name="password" placeholder="Password">
								@if ($errors->has('password'))
								<div class="error-tex" style="color:  #e74c3c" >	{{$errors->first('password')}} </div>
								@endif 
							</div>
							
							<div class="col-md-12 form-group">
								<div class="creat_account">
									<input type="checkbox" id="f-option2" name="selector">
									<label for="f-option2">Keep me logged in</label>
								</div>
							</div>
							<div class="col-md-12 form-group">
								<button id="search-js" type="submit" value="submit" class="btn submit_btn">Log In</button>
								<a href="{{route('lay-lai-mk')}}">Forgot Password?</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
<script type="text/javascript">
	$(function(){
	$('#search-js').keyup(function(event){
		event.preventDefault();
		var key = $(this).val();
		console.log(key);
		// if(key == ""){
		// $('#productList').fadeOut();
		// }else{
		// 		var _token = $('input[name="_token"]').val();
		// 	$.ajax({
		// 		url:"{{route('search')}}",
		// 		data:{ key:key,
		// 			   _token:_token
		// 				},
		// 		success:function(data){
		// 			// var kq;
		// 			// if(kq.data == ""){
		// 			// 	$('#productList').fadeOut();
		// 			// }
		// 			$('#productList').fadeIn();
		// 			$('#productList').html(data);
		// 		}		
		// 	});

		// }


		//
	});

	
});
</script>
	

@stop


	