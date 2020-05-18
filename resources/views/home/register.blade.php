@extends('home.master')
@section('dangky')



	
	<section class="login_box_area p_120">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="img/login.jpg" alt="">
						<div class="hover">
							<h4>Xin chào</h4>
							<p></p>
						
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner reg_form">
						<h3>Create an Account</h3>
						<form action="{{route('postdangky')}}" class="row login_form"  method="post" id="contactForm" novalidate="novalidate">
							{{ csrf_field()}}
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="name" placeholder="Name">
								@if ($errors->has('name'))
								<div class="error-tex" style="color:  #e74c3c" >	{{$errors->first('name')}} </div>
								@endif 
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="phone" placeholder="Phone">
								@if ($errors->has('phone'))
								<div class="error-tex" style="color:  #e74c3c" >	{{$errors->first('phone')}} </div>
								@endif 
							</div>
							<div class="col-md-12 form-group">
								<input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
								@if ($errors->has('email'))
								<div class="error-tex" style="color:  #e74c3c" >	{{$errors->first('email')}} </div>
								@endif 
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="email" name="address" placeholder=" Address">
								@if ($errors->has('address'))
								<div class="error-tex" style="color:  #e74c3c" >	{{$errors->first('address')}} </div>
								@endif 
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="password" name="password" placeholder="Password">
								@if ($errors->has('password'))
								<div class="error-tex" style="color:  #e74c3c" >	{{$errors->first('password')}} </div>
								@endif 
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="pass" name="pass" placeholder="Confirm password">
								@if ($errors->has('pass'))
								<div class="error-tex" style="color:  #e74c3c" >	{{$errors->first('pass')}} </div>
								@endif 
							</div>
							<div class="col-md-12 form-group">
								<div class="creat_account">
									<input type="checkbox" id="f-option2" name="selector">
									<label for="f-option2">Keep me logged in</label>
								</div>
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="btn submit_btn">Register</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

@stop




	
