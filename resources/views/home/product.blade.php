@extends('home.master')

@section('gia_sp')
@if($product)
@foreach ($product as  $value) {
                    
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="f_p_item">
                                 <div class="f_p_img">
                                    <a href="route('chitiet',$value->id)">
                           
                                <img class= "img-fluid" src=\shopping_phone\public
                                \img\{{$value->pro_avatar}}"> </a>
                                    <div class="p_icon">
                                        <a >
                                        <i class="lnr lnr-heart"></i>
                                    </a>
                                    <a href="route('add',$value->id)">
                                        <i class="lnr lnr-cart"></i>
                                    </a>
                                    </div>
                                </div>
                                <a >
                                    <h4>{{$value->pro_name}}</h4>
                                </a>
                                <h5>{{number_format($value->pro_price)}} đ</h5>
                            </div>
                        </div>";
                        @endforeach
@endif
@stop
