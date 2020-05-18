<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
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
          <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<!-- jquery -->
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

 
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
                      
                      
                            
                          <button class="js">clickme</button>  
                        </ul>
                    </div>
                </div>
            </nav>


<script type="text/javascript">
	$(function(){
		$('.js').click(function(event){
			event.preventDefault();
			$.confirm({
    title: 'What is up?',
    content: 'Here goes a little content',
    type: 'red',
    buttons: {   
        ok: {
            text: "ok!",
            btnClass: 'btn-primary',
            keys: ['enter'],
            action: function(){
                 console.log('the user clicked confirm');
            }
        },
        cancel: function(){
                console.log('the user clicked cancel');
        }
    }
});
		});
	});
</script>

