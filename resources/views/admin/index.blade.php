@extends('admin.master')
@section('content')

 <div style="margin-top: 60px" class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-comments fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">{{$ratings}}</div>
                                            <div>Đánh giá</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{Route('danhgia')}}">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fas fa-database fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">{{$product}}</div>
                                            <div>Sản phẩm</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{Route('sanpham')}}">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-shopping-cart fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">{{$sldh}}</div>
                                            <div>Đơn hàng</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{Route('donhang')}}">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-user fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">13</div>
                                            <div>Thành viên</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{Route('thanhvien')}}">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div> 

    <div class="row">
    <div class="col-sm-8">
        
         <div  id="container1" style="min-width: 500px;height: 400px;margin: 0 auto;">
         </div>
     </div>
     <div class="col-sm-4" style="">
         <figure class="highcharts-figure">
         <div id="container"></div>
         </figure>
     </div>
    </div>

 <div class="row">
        <div class="col-sm-6">
            <h2 class="sub-header">Danh sách đánh giá mới nhất</h2>
            <div class="table-responsive">
            
            <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Tên</th>
                <th>Sản phẩm</th>
                <th>Sao</th>
              </tr>
            </thead>
            <tbody>
                @if(isset($rating))
                @foreach($rating as $value)
              <tr>
                <td>{{$value->id}}</td>
               <td>{{isset($value->user->name) ? $value->user->name :'[N\A]'}}</td>
               <td><a>{{isset($value->product->pro_name) ? $value->product->pro_name :'[N\A]'}} </a></td>
                <td>{{$value->ra_number}}</td>
                
                
              </tr>
                @endforeach
                @endif

             
            </tbody>
          </table>
        </div>  
        </div>
            <div class="col-sm-6">
        <h2>Danh sách đơn hàng mới </h2>
            <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Tên khách hàng</th>
                <th>Số điện thoại</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
              </tr>
            </thead>
            <tbody>
                @foreach($transaction as $value)
                <td>{{$value->id}}</td>
                <td>{{isset($value->user->name) ? $value->user->name :'[N\A]'}}</td>
                
                <td>{{$value->tr_phone}}</td>
                <td>{{number_format($value->tr_total,0,',','.',)}}</td>
                <td>
                    <span class="label label-{{$value->getstatus($value->tr_status)['class']}}">{{$value->getstatus($value->tr_status)['name']}} </span> 
                </td>
            </tbody>
            @endforeach
          </table>
        </div>
    </div>
 
@stop
@section('script')
    <script type="text/javascript">

// Create the chart
  let data="{{$datamoney}}";
  datachart = JSON.parse(data.replace(/&quot;/g,'"'));
  let listday= "{{$listDay}}" ;
  //$("#container1").attr("list-day");
  listday = JSON.parse(listday.replace(/&quot;/g,'"'));
  // var datachart = jQuery.parseJSON(data);
  //console.log(datachart); 

// Highcharts.chart('container', {
//     chart: {
//         type: 'column'
//     },
//     title: {
//         text: 'Biểu đồ doanh thu ngày / tháng'
//     },
    
//     accessibility: {
//         announceNewData: {
//             enabled: true
//         }
//     },
//     xAxis: {
//         type: 'category'
//     },
//     yAxis: {
//         title: {
//             text: 'Mức độ tăng trưởng'
//         }

//     },
//     legend: {
//         enabled: false
//     },
//     plotOptions: {
//         series: {
//             borderWidth: 0,
//             dataLabels: {
//                 enabled: true,
//                 format: '{point.y:.1f} VNĐ'
//             }
//         }
//     },

//     tooltip: {
//         headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
//         pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
//     },

//     series: [
//         {
//             name: "Browsers",
//             colorByPoint: true,
//             data: datachart
//         }
//     ],
  
// });

Highcharts.chart('container1', {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'Biểu đồ doanh thu các ngày trong tháng'
    },
    subtitle: {
        text: 'Source: WorldClimate.com'
    },
    xAxis: {
        categories: listday
    },
    yAxis: {
        title: {
            text: 'Temperature'
        },
        labels: {
            formatter: function () {
                return this.value + '°';
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#666666',
                lineWidth: 1
            }
        }
    },
    series: [{
        name: 'Tokyo',
        marker: {
            symbol: 'square'
        },
        data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2,23,,112,45,23,43,234,234,45,,56,,233,234,234,24,23,34,45,45,,23,34,23, {
            y: 26.5,
            marker: {
                symbol: 'url(https://www.highcharts.com/samples/graphics/sun.png)'
            }
        }, 23.3, 18.3, 13.9, 9.6]

    },]
});

Highcharts.chart('container', {

    chart: {
        styledMode: true
    },

    title: {
        text: 'Thống kê trạng thái đơn hàng'
    },

    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },

    series: [{
        type: 'pie',
        allowPointSelect: true,
        keys: ['name', 'y', 'selected', 'sliced'],
        data: [
            ['hoàn tất', 29.9, false],
            ['đang vẫn chuyển', 71.5, false],
            ['tiếp nhận', 106.4, false],
            ['hủy bỏ', 129.2, false],
        ],
        showInLegend: true
    }]
});
    </script>
@stop