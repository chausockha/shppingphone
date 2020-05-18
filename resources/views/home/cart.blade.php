
@extends('home.master')
@section('danhsach')
<style type="text/css">
	.main_btn1{
		width: 200px; 
		background: #1641ff;
		padding: 20px;
		color: white;
		border-radius: 5px
	}
</style>

<script type="text/javascript">
	
	function incrementValue(j)
	{
	    //var value = parseInt(document.getElementById('sst'+j).value,10);
	    var value = document.getElementById('sst'+j).value;
	    if( !isNaN(value)){
	    	value++;
	    	document.getElementById('sst'+j).value = value;
	    }
	    
	}
	function decrementValue(j)
	{
		   var value = document.getElementById('sst'+j).value;
	    	if( !isNaN(value)){
	    	value--;
	    	if (value < 0 ) {
	    		value = 0;
	    	}
	    	document.getElementById('sst'+j).value = value;
	    }
	}
</script>
	
	<section class="cart_area">
		<div class="container">
			<div class="cart_inner">
				<div class="table-responsive">
					<table class="table" >
						<thead>
							<tr>
								<th scope="col">STT</th>
								<th scope="col">Sản phẩm</th>
								<th style="width: 10%;" scope="col">Gía</th>
								<th scope="col">Số lượng</th>
								<th scope="col">Thành tiền</th>
								<th style= scope="col" width="10%">Thao tác</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1 ?>
							@foreach($product as $key => $value)
					
							<tr>
								<td>{{$i}}</td>
								<td>
									<div class="media">
										<div class="d-flex">
											<img style="width: 80px;height: 60px" src="\shopping_phone\public\img\{{$value->attributes->avatar}}" alt="">
										</div>
										<div class="media-body">
											<p>{{$value->name}}</p>
										</div>
									</div>
								</td>

								<td >
									<h5 >{{number_format($value->price,0,',','.',)}} đ</h5>
								</td>
								<td class="form-group">
								
									<div  data-id-product="{{$value->id}}" class="product_count">
										<input  qty="{{1}}" sl-giam="{{$value->quantity}}"   type="text" name="qty" id="sst{{$i}}" maxlength="12" value="{{$value->quantity}}" title="Quantity:" > 
										
										  <p  data-url="{{route('updatecart1',$key)}}" data-price="{{$value->price}}" data-id-product="{{$value->id}}" >
										  	<span class="js-reduction" style="width: 15px;display: block;float:left;line-height: 36px;cursor: pointer;text-align: center;font-size: 18px;position:;color: #404040;"  onclick="decrementValue('{{$i}}')"  value="Increment Value"><i style="position: absolute; top: 30%; right: 20%;"  class="fas fa-sort-down"></i></span>
											
											<span class="js-increment" style="width: 15px;display: block; float: left;line-height: 36px;cursor: pointer;text-align: center;font-size: 18px; color: #404040;"   onclick="incrementValue('{{$i}}')" value="Increment Value"><i class="fas fa-sort-up" style="position: absolute; top: 10%; right: 20%;"></i></span>
										</p>
										
									
									</div>
								</td>
								<td >
									<h5 id="price-new" style="width: 95px">	{{number_format($value->quantity * $value->price,0,',','.',)}} đ </h5>
									
								<!-- <input type="hidden" value="{{$key}}" name="idproduct"> -->
								</td>
								<td>
									
									<a class="js-delete" style="padding: 5px 10px;border: 1px solid #999;font-size: 12px" href="{{route('delete',$key)}}"><i class="fas fa-trash-alt"></i>Xóa</a></td>
								
							</tr>
							<?php $i++ ?>
							@endforeach				
							<tr>
								<td>

								</td>
								
								<td>
									<h1 id="product"></h1>
									<h5>Tổng tiền</h5>
								</td>
								<td >
									<h5 id="" >{{number_format(\Cart::getSubTotal(),0,',','.',)}} đ</h5>
								</td>
							</tr>
							
							<tr class="out_button_area">
								<td>

								</td>
								<td>

								</td>
								<td>

								</td>
								<td><!-- main_btn -->
									<div class="pull-right">

										<a style="width: 150%;" link="{{route('dangnhap')}}"  class="{{!\Auth::id() ? 'main_btn1' : 'main_btn' }}" href="{{route('thanhtoan')}}">Thanh toán</a>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
	@stop

	
	@section('script')
	<script type="text/javascript">
				$(document).ready(function(){
			$('.js-increment').click(function(event){
				 //event.preventDefault();
				let $this = $(this);
				let URL = $this.parent().attr('data-url');
				let productID = $this.parent().attr("data-id-product");
				let $input = $this.parent().prev();
				let testNumber = parseInt($input.val());
				let number = parseInt($input.attr('qty'));
				
				console.log(number);
				 if (testNumber >= 11 ) {
					$.confirm({
		    title: "<i style='color:#e74c3c'class='fa fa-warning'> Mỗi sản phẩm chỉ mua tối đa 10 lần </i>",
		    content: '',
		    type: 'red',
		    typeAnimated: true,
			    buttons: {
			        tryAgain: {
			            text: 'Ok',
			            btnClass: 'btn-red',
			            action: function(){
			            	location.reload();
			            }
			        },

			    }
});
				 	
				 	
				 	return false;
				 }
				let price = $this.parent().attr('data-price');	

				
				 //price = $this.parents('tr').find('#price-new').text(price * testNumber);
				 console.log(number );
				 $.ajax({
							url : URL,
							data: {
								idproduct : productID,
								qty:number, 
							}
				}).done(function(result) {
				if (typeof result.totalmoney !== "undefined") 
				{ 
					toastr.success(result.messages);
					 window.location.reload();
					
					//$this.parents('tr').find('#price-new').text(result.totalItem + "đ");
				   $("#sub-total").text(result.totalmoney +"đ" );
				}
				
			});	

			})
				$('.js-reduction').click(function(){
						 //event.preventDefault();
				let $this= $(this);
				let $input = $this.parent().prev();
				let numberadd = parseInt($input.val());
				let number = parseInt($input.val());
				let numberdefault = parseInt($input.val());
				//console.log(numberadd);
				numberadd =numberadd + 1;
				
				 numberdefault = numberdefault - numberadd;
				//console.log(numberadd);
				//console.log(numberdefault);

				if ( number < 1) {
					$.confirm({
		    title: "<i style='color:#e74c3c'class='fa fa-warning'> ít nhất là một sản phẩm  </i>",
		    content: '',
		    type: 'red',
		    typeAnimated: true,
			    buttons: {
			        tryAgain: {
			            text: 'Ok',
			            btnClass: 'btn-red',
			            action: function(){
			            	location.reload();
			            }
			        },

			    }
});
					// toastr.warning('ít nhất 1 sản phẩm ');
					 
					return false;
				}

				let URL = $this.parent().attr('data-url');
				let productID = $this.parent().attr("data-id-product");
				//let price = $this.parent().attr('data-price');
				
				 //$price = $this.parents('tr').find('#price-new').text(price * number);
				  $.ajax({
							url : URL,
							data: {
								idproduct : productID,
								qty:numberdefault, 
							}
				}).done(function(result) {
				if (typeof result.totalmoney !== "undefined") 
				{ 
					toastr.success(result.messages);
					location.reload();
				  //$("#sub-total").text(result.totalmoney +"đ" );
				}
				
			});	

			})

			$('.js-delete').click(function(){
			event.preventDefault();
			
			let URL = $(this).attr('href');
			console.log(URL);
			$.ajax({
				url:URL,
				data:{
					url: URL,
						_token :'{!! csrf_token()!!}',
				}
			}).done(function(result){
				toastr.success(result.messages);
				location.reload();
			});
// 		$.confirm({
//     title: "<i style='color:#e74c3c' class='fa fa-warning'> Bạn có muốn xóa  </i> ",
//     content: 'Giỏ hàng xóa đi sẽ không thể khôi phục',
//     type: 'red',
//     typeAnimated: true,
//     buttons: {
//         tryAgain: {
//             text: 'Ok',
//             btnClass: 'btn-red',
//             action: function(){
//             window.location.href = URL ;
//             }
//         },
//         close: function () {
//         }
//     }
// });
		})
			$('.main_btn1').click(function(){
			event.preventDefault();
			let url =$(this).attr('link');

		$.confirm({
    title: "<i style='' class='fa fa-warning'> Bạn phải đăng nhập    </i> ",
    content: '',
    type: 'dark',
    typeAnimated: true,
    buttons: {
        tryAgain: {
            text: 'ok',
            btnClass: 'btn-dark',
            action: function(result){
         	  window.location.href= url;
            }
        },
        close: function () {
        }
    }
});
		})
		
		});


	</script>

	@stop
	




	