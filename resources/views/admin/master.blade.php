 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>admin</title>
        <!-- Bootstrap Core CSS -->
        <link href="{{asset ('asset/css/bootstrap.min.css')}}" rel="stylesheet ">

        <!-- MetisMenu CSS -->
        <link href="{{asset ('asset/css/metisMenu.min.css')}}" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="{{asset('asset/css/timeline.css')}} " rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{asset('asset/css/startmin.css')}} " rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="{{asset('asset/css/morris.css')}} " rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="{{asset('asset/css/font-awesome.min.css')}} " rel="stylesheet" type="text/css">
          <script src="https://kit.fontawesome.com/440c4e8be2.js" crossorigin="anonymous"></script>
<!-- hightchart -->      
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<!-- jquery -->
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>



 
        <!-- Toastr -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">

    <!-- alert-confirm -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>


    </head>
    <body>
        

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">Startmin</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="#"><i class="fa fa-home fa-fw"></i> Website</a></li>
                </ul>

                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown navbar-inverse">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-comment fa-fw"></i> New Comment
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                        <span class="pull-right text-muted small">12 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-envelope fa-fw"></i> Message Sent
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-tasks fa-fw"></i> New Task
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a class="text-center" href="#">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                
                   
                     <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i>  <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href=""><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
               
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                </span>
                                </div>
                                <!-- /input-group -->
                            </li>
                            <li class="Route::getCurrentRoute()->getPath() == 'tongquan'? 'active' : ''}}">
                                <a href= "{{route('tongquan')}}" class=""><i class="fas fa-home" ></i> Tổng quan</a>
                            </li>
                        
                            <li class="{{Route::currentRouteName() == 'danhmuc' ? 'active' : ''}}">
                                <a href="{{route('danhmuc')}}" ><i class="fa fa-table fa-fw"></i> Danh mục</a>
                            </li>
                            <li class="{{Route::currentRouteName() == 'sanpham'? 'active' : ''}}">
                                <a href="{{route('sanpham')}}"><i class="fas fa-database"></i>  Sản phẩm</a>
                            </li>
                             <li class="{{Route::currentRouteName() == 'sanpham'? 'active' : ''}}">
                                <a href="{{route('danhgia')}}"><i class="fas fa-pen"></i>Đánh giá</a>
                            </li>
                             <li class="{{Route::currentRouteName() == 'donhang'? 'active' : ''}}">
                                <a href="{{route('donhang')}}" ><i class="fas fa-shopping-cart"></i>  Đơn hàng</a>
                            </li>
                             
                              <li>
                                <a href="{{Route('thanhvien')}}" ><i class="fa fa-user fa-fw"></i>  Thành viên </a>
                            </li>
                      
                      
                            
                            
                        </ul>
                    </div>
                </div>
            </nav>

            <div id="page-wrapper">
                <div class="container-fluid">
                    
                    <!-- /.row -->
                   @if(Session::has('success'))
                 <div class="alert alert-success" style="position:fixed;right: 20px;top:20px;left: 50%;transform: translateX(-50%); z-index: 99999999; text-align: center;">
        <strong>Chúc mừng!</strong> {{Session::get('success')}}
  </div>
            @endif  
            @if(Session::has('warning'))
                 <div class="alert alert-warning" style="position:fixed;right: 20px;top:20px;left: 50%;transform: translateX(-50%); z-index: 99999999; text-align: center;">
        <strong></strong> {{Session::get('warning')}}
  </div>
            @endif  
<!-- @jquery
    @toastr_js
    @toastr_render -->
            @if(Session::has('message'))<script type="text/javascript">
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }


    
        
</script> @endif
                 @yield('content')
                 @yield('danhmuc')
                 @yield('sanpham')
                 @yield('themmoidanhmuc')
                 @yield('updatedanhmuc')
                 @yield('themmoisanpham')
                 @yield('updatesanpham')
                  @yield('script') 
                   @yield('thanhvien')
                   @yield('donhang')
                   @yield('danhgia')
                   @yield('Login')
                   @yield('confirm')
                </div>
                
                
            </div>
            

        </div>
     
      

        <!-- jQuery -->

        <!-- Bootstrap Core JavaScript -->
        <script src="{{asset('asset/js/bootstrap.min.js')}}"></script>

        <!-- Metis Menu Plugin JavaScript -->
       
        <!-- Custom Theme JavaScript -->
       

    </body>

   
</html>
