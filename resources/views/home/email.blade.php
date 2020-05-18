	@extends('home.master')
	@section('email')
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
						<h4>Vui lòng nhập email để lấy lại mật khẩu</h4>
						@if(Session::has('loi'))
    			<center> <div class="alert alert-success " style="color:#e74c3c "  >{{Session::get('loi')}} </div>  </center>
    				@endif  
						<form class="row login_form" action="{{route('postresetpassword')}}" method="post" id="contactForm" novalidate="novalidate">
							{{ csrf_field()}}
							<div class="col-md-12 form-group">
								<input type="email" class="form-control" id="name" name="email" placeholder="Email">
								@if ($errors->has('email'))
								<div class="error-tex" style="color:  #e74c3c" >	{{$errors->first('email')}} </div>
								@endif 
							</div>
							
							
							
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="btn submit_btn">Xác nhận</button>
								
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	

@stop


	