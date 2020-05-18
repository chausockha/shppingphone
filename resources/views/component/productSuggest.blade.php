@if(!empty($productsuggest))
<script type="text/javascript">
	$(function(){
 $(".js-show-login2").click(function (event){
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
 

   window.addEventListener('unload', function (e) { 
            e.preventDefault(); 
            e.returnValue = ''; 
             sessionStorage.clear();
        }); 
		</script>

<section class="feature_product_area section_gap">
		<div class="main_box">
			<div class="container-fluid">
				<div class="row">
					<div class="main_title">
						<h2>Sản phẩm cùng danh mục bạn đã mua</h2>
						<p></p>
					</div>
				</div>
				

				<div class="row">
					
				@foreach($productsuggest as $value)	
					<div class="col col1">
							<div class="f_p_item">
							<div class="f_p_img">
								<a href="{{route('chitiet',$value->id)}}">
									@if($value->pro_number == 0)
								<span style="position: absolute;background: #e91e63;color:white;border-radius: 6px;font-size: 10px;padding: 2px 6px ">Tạm hết hàng</span>
								@endif
								@if($value->pro_sale >0)
								<span style="position: absolute;background-image: linear-gradient(-90deg,#ec1f1f 0%,#ff9c00 100%); border-radius: 10px; padding: 1px 7px; color: white;font-size: 13px; right: 0px; padding: 1px 7px;">{{$value->pro_sale}} %</span>
								@endif
								<img class="img-fluid" src="\shopping_phone\public\img\{{$value->pro_avatar}}" alt=""> </a>
								<div class="p_icon">
									<a class="{{!\Auth::id() ? 'js-show-login2' : 'js-favorite2' }}" href="{{route('favorite',$value->id)}}">
										<i class="lnr lnr-heart"></i>
									</a>
									<a class="add-cart2" href="{{route('add',$value->id)}}">
										<i class="lnr lnr-cart"></i>
									</a>
								</div>
							</div>
							<a href="#">
								<h4>{{$value->pro_name}}</h4>
							</a>
							<h5  style=" color: #f57224">{{number_format($value->pro_price,0,',','.')}} đ</h5>
							@if ($value->pro_sale) 	
							<span style="color: #9e9e9e; text-decoration:line-through">{{number_format($value->pro_price*(100 - $value->pro_sale)/100,0,',','.')}}</span>
							@endif
						</div>
					</div>@endforeach
					
					</div>
					

				<div class="row">
					<nav class="cat_page mx-auto" aria-label="Page navigation example">
						<ul class="pagination">
							<li class="page-item">
								<a class="page-link" href="#">
									<i class="fa fa-chevron-left" aria-hidden="true"></i>
								</a>
							</li>
							<li class="page-item active">
								<a class="page-link" href="#">01</a>
							</li>
							<li class="page-item">
								<a class="page-link" href="#">02</a>
							</li>
							<li class="page-item">
								<a class="page-link" href="#">03</a>
							</li>
							<li class="page-item blank">
								<a class="page-link" href="#">...</a>
							</li>
							<li class="page-item">
								<a class="page-link" href="#">09</a>
							</li>
							<li class="page-item">
								<a class="page-link" href="#">
									<i class="fa fa-chevron-right" aria-hidden="true"></i>
								</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</section>
	@endif
<script type="text/javascript">
		$(function(){
		$(".js-favorite2").click(function(e){
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

		$(".add-cart2").click(function(event){
			event.preventDefault();
			let url = $(this).attr('href');
			//console.log(url);
			if (url) {
				$.ajax({
					url:url,
					data:{
						url:url,
						_token :'{!! csrf_token()!!}',
					}
				}).done(function(result){
					if (result.messages1){
						toastr.success(result.messages1);
						 location.reload();
						 //return false;
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
	})
	</script>
	