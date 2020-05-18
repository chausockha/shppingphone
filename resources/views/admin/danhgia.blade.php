@extends('admin.master')
@section('danhgia')


<nav style="margin-top: 50px" aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="{{route('tongquan')}}">Trang chủ</a></li>
		    <li class="breadcrumb-item"><a href="#">Đánh giá</a></li>
		    <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
		  </ol>
		</nav>
		<div class="row">
			<div class="col-sm-12">
			
			</div>
		</div>
		<div class="table-responsive">
			<h2>Quản lý đánh giá  </h2>
		    <table class="table table-hover">
		    <thead>
		      <tr>
		        <th>#</th>
		        <th>Tên</th>
		        <th>Sản phẩm</th>
		        <th>Nội dung</th>
		        <th>Sao</th>
		        <th>thao tác</th>
		      </tr>
		    </thead>
		    <tbody>
		    	@if(isset($rating))
		    	@foreach($rating as $value)
		      <tr>
		        <td>{{$value->id}}</td>
		       <td>{{isset($value->user->name) ? $value->user->name :'[N\A]'}}</td>
		       <td><a>{{isset($value->product->pro_name) ? $value->product->pro_name :'[N\A]'}} </a></td>
		        <td>{{$value->ra_content}}</td>
		        <td>{{$value->ra_number}}</td>
		      <!--   href="{{route('deletedanhgia',$value->id)}}" -->
		        <td>
					<a   class="js" style="padding: 5px 10px;border: 1px solid #999;font-size: 12px" ><i id="myForm" class="fas fa-trash-alt"></i>Xóa</a>
		        </td>
		      </tr>
				@endforeach
				@endif

		     
		    </tbody>
		  </table>
		   <center> {{ $rating->links() }}</center>
		</div>  
		  </div>





@stop
@section('script')
	
<script type="text/javascript">
	$(function(){
		$('.js').click(function(event){
			event.preventDefault();
			let URL = $(this).attr('href');
			$.confirm({
    title: "<i style='color:#e74c3c' class='fa fa-warning'> Bạn có muốn xóa  </i> ",
    content: 'Dữ liệu xóa đi sẽ không thể khôi phục',
    type: 'red',
    typeAnimated: true,
    buttons: {
        tryAgain: {
            text: 'Ok',
            btnClass: 'btn-red',
            action: function(){
            window.location.href = URL ;
            }
        },
        close: function () {
        }
    }
});
		});
	});
</script>

@stop

	

