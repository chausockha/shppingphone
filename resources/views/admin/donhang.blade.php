@extends('admin.master')
@section('donhang')
<head><link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script></head>
<nav style="margin-top: 50px" aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="{{route('tongquan')}}">Trang chủ</a></li>
		    <li class="breadcrumb-item"><a href="#">Đơn hàng</a></li>
		    <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
		  </ol>
		</nav>
		<div class="row">
			
			<div class="col-sm-12">
				<form  class="form-inline" action="{{route('donhang')}}" method="get" role="form" style="margin-bottom: 20px">
					<div class="form-group">
						<input type="text" name="id" class="form-control" id="" placeholder="ID" value="{{\Request::get('id')}}">
						<input type="text" name="email" class="form-control" id="" placeholder="Email" value="{{\Request::get('email')}}">
					</div>
					<div class="form-group">
						<select name="status" class="form-control">
							  <option value="0"> --Trạng thái--</option> 
							  <option value="1" {{Request::get('status')==1 ? "selected='selected'" : ""}}>Đã nhận đơn  </option>
							  <option value="2" {{Request::get('status')==2 ? "selected='selected'" : ""}}>Đang vẫn chuyển</option>
							  <option value="3" {{Request::get('status')==3 ? "selected='selected'" : ""}}>Đã giao hàng </option>
							  <option value="-1" {{Request::get('status')==-1 ? "selected='selected'" : ""}}>Đã hủy</option>
						</select>
					</div>
					<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
				</form>
			</div>
		</div>
		</div>
		<div class="table-responsive">
			<h2>Quản lý đơn hàng <a href="{{route('themmoisanpham')}}" ></a> </h2>
		    <table class="table table-hover">
		    <thead>
		      <tr>
		        <th>#</th>
		        <th>Thông tin </th>
		        
		        <th>Tổng tiền</th>
		        <th>Trạng thái</th>
		        <th>Time</th>
		        <th>thao tác</th>
		      </tr>
		    </thead>
		    <tbody>
		    	@foreach($transaction as $value)
		    	<td>{{$value->id}}</td>
				<td>
					<ul style="padding-left: 15px">
						<li><span>Name : <i class=""> </i> </span><span>
							{{isset($value->user->name) ? $value->user->name :'[N\A]'}} </span> 
						</li>
						<li><span>Address:  <i class=""> </i> </span> {{$value->tr_address}}<span>
							 </span> 
						</li>
						<li><span>  <i class="fas fa-phone"> </i>  </span>{{$value->tr_phone}}<span>
							 </span> 
						</li>
						
					</ul>
					</td>
				<td>{{number_format($value->tr_total,0,',','.',)}} VNĐ</td>
				  <td>
				  	<span class="label label-{{$value->getstatus($value->tr_status)['class']}}">{{$value->getstatus($value->tr_status)['name']}} </span> </td>
				<td>{{$value->created_at->format('d-m-yy')}}</td>
				<td><a class="btn_customer_action js_order_item " data-id="{{$value->id}} "   href="{{route('view' ,$value->id)}}"><i  class="fas fa-eye "></i ></a>
				@if($value->tr_status ==3 )
				
						<a class="js-delete-confirm" style="padding: 5px 10px;border: 1px solid #999;font-size: 12px" href="{{route('deletedonhang',$value->id)}}" ><i class="fas fa-trash-alt  "></i>deleta</a>
					
					
					
				@else
				<div class="btn-group">
					<button type="button" class="btn btn-success btn-xs">Action</button>
					<button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<span class="caret"></span>
						<span class="sr-only">Toggle Dropdown</span>
					</button>
					
						<ul role="menu" class="dropdown-menu">
					
					<li>
						<a class="js-delete-confirm" style="padding: 5px 10px;border: 1px solid #999;font-size: 12px" href="{{route('deletedonhang',$value->id)}}"><i class="fas fa-trash-alt"></i></a></li>
					<li>
						<a href="{{route('active',['process',$value->id])}}"><i class="fa fa-ban">Đang bàn giao</i></a>
					</li>
					<li>
						<a href="{{route('active',['success',$value->id])}}"><i class="fa fa-ban">Đã bàn giao</i></a>
					</li>
					<li>
						<a href="{{route('active',['cancel',$value->id])}}"><i class="fa fa-ban">Hủy</i></a>
					</li>
				</ul>
				</div>
					
				</td>@endif	
				
				
		  
		    </tbody> 		    
		    @endforeach
		  </table>
    <center> {{ $transaction->appends($query)->links() }}</center>

		</div>  
		  </div>

		<!-- Modal --><div>
		  <div class="modal fade" id="myModalorder" role="dialog">
		    <div class="modal-dialog modal-lg">
		 <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header ">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title">Chi tiết mã đơn hàng # <b class="transaction_id"></b></h4>
		        </div>
		        <div class="modal-body" id="md_content">
		          
		        </div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
		        </div>
		      </div>
		      
		    </div>
		</div>
	</div>

		 
		  
		
@stop

@section('script')
<script > 
	$(function(){
		$('.js_order_item').click(function(event){
			event.preventDefault();
			let $this = $(this);
			let url = $this.attr('href');
			$(".transaction_id").text($this.attr('data-id'));
			$("#myModalorder").modal('show');
			  // console.log(url);
			$.ajax({
				url : url,
			}).done(function(result) {
				
				if (result) {
					$("#md_content").html('').append(result);
				}
			});

		});

		$(".js-delete-confirm").click(function(event){
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

	
})
</script>

@stop