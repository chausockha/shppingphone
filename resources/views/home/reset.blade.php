	@extends('home.master')
	@section('reset')
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
						<form class="row login_form" action="{{route('getlinkresetpassword')}}" method="post" id="contactForm" novalidate="novalidate">
							 @csrf
							 <input type="hidden" name="code" value="{{$checkuser->code}}">
							 <input type="hidden" name="email" value="{{$checkuser->email}}">

							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="name" name="password" placeholder="Mật khẩu mới">
								<a style="position: absolute; top: 54% ;right: 10px; color: #333"  href="javascript:void(0)"><i class="fa fa-eye"></i> </a>
								@if ($errors->has('password'))
								<div class="error-tex" style="color:  #e74c3c" >	{{$errors->first('password')}} </div>
								@endif 
							</div>

							<div class="col-md-12 form-group">
							<input type="password" class="form-control"  name="password_confirm" placeholder="Xác nhận mật khẩu">
							<a style="position: absolute; top: 54% ;right: 10px; color: #333"  href="javascript:void(0)"><i class="fa fa-eye"></i> </a>
								@if ($errors->has('password_confirm'))
								<div class="error-tex" style="color:  #e74c3c" >	{{$errors->first('password_confirm')}} </div>
								@endif 
							</div>
							
							
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="btn submit_btn">Reset Password</button>
								
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	

@stop
@section('script')
  <script type="text/javascript">
    $(function(){
   
    $(".form-group a").click(function(){
      let $this = $(this);
      if ($this.hasClass('active')) {
        $this.parents('.form-group').find('input').attr('type','password');
        $this.removeClass('active');
      }else{
       
          $this.parents('.form-group').find('input').attr('type','text');
       
         $this.addClass('active');
      }

    });
  });
  </script>
@stop

	