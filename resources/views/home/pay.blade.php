@extends('home.master')
@section('thanhtoan')

<head><link rel="stylesheet" href="{{asset('asset/css/bootstrap.min.css')}}">

</head>




    <hr>
  <div style="margin-left: 13%;" class="main-contact-area">
      <div class="container wrapper">
            <div class="row cart-head">
                <div class="container">
                <div class="row">
                    <p></p>
                </div>
                
                <div class="row">
                    <p></p>
                </div>
                </div>
            </div>    
            <div class="row cart-body">
                <form class="form-horizontal" method="post" action="{{route('postthanhtoan')}}">
                    {{ csrf_field()}}
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                    <!--REVIEW ORDER-->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Danh sách sản phẩm <div class="pull-right"><small><a class="afix-1" href="{{route('danhsach')}}">Cập nhật</a></small></div>
                        </div>
                      <!--   {{dump(get_data_user('web','name'))}} -->
                        <div class="panel-body">
                            @foreach($product as $value)
                            <div class="form-group">
                                <div class="col-sm-3 col-xs-3">
                                    <img style="width: 100px;height: 70px" class="img-responsive" src="\shopping_phone\public\img\{{$value->attributes->avatar}}" />
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="col-xs-12">{{$value->name}}</div>
                                    <div class="col-xs-12"><small>Số lượng x <span>{{$value->quantity}}</span></small></div>
                                </div>
                                <div class="col-sm-3 col-xs-3 text-right">
                                    <h6><span>VNĐ </span>{{ number_format($value->price,0,',','.',) }}</h6>
                                </div>
                            </div>
                            
                            <div class="form-group"><hr /></div>@endforeach
                            
                            
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Tổng tiền:</strong>
                                    <div class="pull-right"><span>{{number_format(\Cart::getSubTotal(),0,',','.',)}}</span> VNĐ</div>
                                </div>
                             
                            </div>
<!--                             <div class="form-group"><hr /></div> -->
                           <!--  <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Order Total</strong>
                                    <div class="pull-right"><span>$</span><span>150.00</span></div>
                                </div>
                            </div> -->
                            
                        </div>
                    </div>
                    <!--REVIEW ORDER END-->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info">
                        <div class="panel-heading">Thông tin thanh toán</div>
                        <div class="panel-body">
                           <div class="form-group">
                                <div class="col-md-12"><strong>Địa chỉ:</strong></div>
                                <div class="col-md-12">
                                    <input address="name" type="text" name="address" class="form-control" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Email Address:</strong></div>
                                <div class="col-md-12"><input type="text" name="email" class="form-control" value="{{get_data_user('web','email')}}" /></div>
                            </div>
                           
                            <div class="form-group">
                                <div class="col-md-12"><strong>Số điện thoại:</strong></div>
                                <div class="col-md-12"><input type="text" name="phone" class="form-control" value="{{get_data_user('web','phone')}}" /></div>
                            </div>
                             <div class="form-group">
                                <div class="col-md-12"><strong>Ghi chú:</strong></div>
                                <div class="col-md-12">
                                    <textarea class="form-control" name="note" cols="30" rows="4"></textarea>
                                </div>
                            </div>
                           
                             <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success">Xác nhận thông tin</button>
                                   
                                        {{ csrf_field()}}
                                   <a href="{{route('payment')}}" class="js_pay" style="width: 200px; background: #288ad6;padding: 10px;color: white;
                                        border-radius: 5px">Thanh toán qua PayPal</a>
                               
                              
                                </div>

                                
                            </div>
                        </div>
                        
                    </div>
                   
                    <!--CREDIT CART PAYMENT-->
                  
                    <!--CREDIT CART PAYMENT END-->
                </div>
                
                </form>
            </div>
            <div class="row cart-footer">
        
            </div>
    </div>
  </div>

    
    




 @stop          

 @section('script')
        <script type="text/javascript">
            $(document).ready(function(){
              $('.btn btn-primay').click(function(event){
            event.preventDefault();
            let $this = $(this);
            let url = $this.attr('href');
            var value = $(this).val();
         

          // let number = $('.id1').val();
          // $(".js_money").text($this.attr('data-price'));
            console.log(url);
            console.log(value);
            // $.ajax({
            //     url : url,
                
            //     data: {
            //             number :number,
            //             url:url,
            //              _token: '{!! csrf_token() !!}',
            //         }
            // }).done(function(result) {
            //     if (result) {
            //         $("#product").html('').append(result);
            //     }
            // });

        
    });


          });
        </script>
 @stop