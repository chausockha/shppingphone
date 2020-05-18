@extends('home.master')
@section('updatepw') 
		
	<h1 style="padding-top: 100px;padding-left: 180px" pull-right class="page-header ">Cập nhật mật khẩu </h1>

	<div style="padding-top: 50px" class="container">
	 <form method="POST" action="{{route('postpw')}}">
	 	@csrf
    <div class="form-group" style="position: relative;">
      <label for="email">Mật khẩu cũ:</label>
      <input type="password" class="form-control"  placeholder="******" name="password_old" value="">
      <a style="position: absolute; top: 54% ;right: 10px; color: #333"  href="javascript:void(0)"><i class="fa fa-eye"></i> </a>
      @if ($errors->has('password_old'))
                <span class="error-text" style="color:  #e74c3c"  > {{$errors->first('password_old')}} </span>
                @endif 
    </div>
    <div class="form-group" style="position: relative;">
      <label for="">Mật khẩu mới:</label>
      <input type="password" class="form-control" value=""  placeholder="******" name="password">
       <a style="position: absolute; top: 54% ;right: 10px; color: #333"  href="javascript:void(0)"><i class="fa fa-eye"></i> </a>
         @if ($errors->has('password'))
                <div class="error-tex" style="color:  #e74c3c" >  {{$errors->first('password')}} </div>
                @endif 
    </div>
     <div class="form-group" style="position: relative;">
      <label for="email">Nhập lại mật khẩu mới:</label>
      <input type="password" class="form-control" value=""  placeholder="******" name="password_confirm">
       <a style="position: absolute; top: 54% ;right: 10px; color: #333"  href="javascript:void(0)"><i class="fa fa-eye"></i> </a>
        @if ($errors->has('password_confirm'))
                <div class="error-tex" style="color:  #e74c3c" >  {{$errors->first('password_confirm')}} </div>
                @endif 
    </div>
    
    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Cập nhật</button>
  </form>
</div>



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