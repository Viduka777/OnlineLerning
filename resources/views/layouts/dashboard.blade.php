<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, Book-Readers, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/Book-Reader.ico" type="image/ico"/>
    <meta name="csrf-token" content="{{csrf_token()}}">

    <title>අකුරු මිතුරු</title>

    <!-- Bootstrap -->
    <link href="{{asset('')}}assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('')}}assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('')}}assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('')}}assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="{{asset('')}}assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css"
          rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{asset('')}}assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('')}}assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('')}}assets/build/css/custom.css?v=1.0" rel="stylesheet">
    <!-- book reader -->
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css'
          integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
    <!-- bootstrap child account icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('')}}confirm/jquery-confirm.min.css">
    @yield('extra-css')

</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
    @yield('left-nav')

    <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                <img src="{{asset('')}}images/icons/dashboard/{{$layout}}.png" alt="">
                                {{ str_limit(\Illuminate\Support\Facades\Auth::user()->name, $limit = 100, $end = '...') }}
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                {{--<li><a href="javascript:;"> Profile</a></li>--}}
                                {{--<li>--}}
                                {{--<a href="javascript:;">--}}
                                {{--<span class="badge bg-red pull-right">50%</span>--}}
                                {{--<span>Settings</span>--}}
                                {{--</a>--}}
                                {{--</li>--}}
                                {{--<li><a href="javascript:;">Help</a></li>--}}
                                <li>
                                    <a href="{{ route('logout') }}" title="Logout"
                                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out pull-right"></i> Log Out
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @if(isset($new_educators) AND $new_educators != '')
                            <li role="presentation" class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"
                                   aria-expanded="false">
                                    <i class="fa fa-user-plus"></i>
                                    <span class="badge bg-green">{{count($new_educators)}}</span>
                                </a>
                                <!-- list of msg -->
                                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">

                                    @foreach($new_educators as $edu)
                                        <li>
                                            <a href="{{route('listChild')}}">
                                                <span class="image">
                                                    <img src="{{asset('')}}images/icons/teacher.png"
                                                         alt="Profile Image"/>
                                                </span>
                                                <div>
                                                    <span><b>{{$edu->name}}</b></span>
                                                    <span class="time">{{\Carbon\Carbon::parse($edu->created_at)->diffForHumans()}}</span>
                                                </div>
                                                <span class="text-muted">{{$edu->email}}</span>
                                                <hr style="margin: 4px 0px">
                                                <span class="message">{{substr($edu->education_qualifications,0,150)}}</span>
                                            </a>
                                        </li>

                                    @endforeach
                                    <li>
                                        <div class="text-center">
                                            <a href="{{route('listChild')}}">
                                                <strong>See All Pending Educator</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                                <!-- list of msg -->
                            </li>
                        @endif
                        @if(isset($new_lessions) AND $new_lessions != '')
                            <li role="presentation" class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"
                                   aria-expanded="false">
                                    <i class="fa fa-book"></i>
                                    <span class="badge bg-green">{{count($new_lessions)}}</span>
                                </a>
                                <!-- list of msg -->
                                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">

                                    @foreach($new_lessions as $edu)
                                        <li>
                                            <a href="{{route('pendingLessions')}}">
                                                <span class="image">
                                                    <img src="{{asset('')}}images/book.png"
                                                         alt="Profile Image"/>
                                                </span>
                                                <div>
                                                    <span><b>{{$edu->title}}</b></span>
                                                    <span class="time">{{\Carbon\Carbon::parse($edu->created_at)->diffForHumans()}}</span>
                                                </div>
                                                <br>
                                                <span class="text-muted">Lesson Type - {{$edu->lesson_type}}</span><br>
                                                <span class="text-muted">Lesson Category - {{str_replace('_',' ',$edu->lesson_category)}}</span>
                                                <hr style="margin: 4px 0px">
                                                <span class="message">{{substr($edu->description,0,150)}}</span>
                                            </a>
                                        </li>

                                    @endforeach
                                    <li>
                                        <div class="text-center">
                                            <a href="{{route('pendingLessions')}}">
                                                <strong>See All Pending Lesson</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                                <!-- list of msg -->
                            </li>
                        @endif
                        @if(isset($pay_requests) AND $pay_requests != '')
                            <li role="presentation" class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"
                                   aria-expanded="false">
                                    <i class="fa fa-book"></i>
                                    <span class="badge bg-green">{{count($pay_requests)}}</span>
                                </a>
                                <!-- list of msg -->
                                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">

                                    @foreach($pay_requests as $edu)
                                        <li>
                                            <a href="{{route('requestPayLessons')}}">
                                                <span class="image">
                                                    <img src="{{asset('')}}images/book.png"
                                                         alt="Profile Image"/>
                                                </span>
                                                <div>
                                                    <span><b>{{$edu->title}}</b></span>
                                                    <span class="time">{{\Carbon\Carbon::parse($edu->created_at)->diffForHumans()}}</span>
                                                </div>
                                                <br>
                                                <span class="text-muted">Lesson Type - {{$edu->lesson_type}}</span><br>
                                                <span class="text-muted">Lesson Category - {{str_replace('_',' ',$edu->lesson_category)}}</span>
                                                <hr style="margin: 4px 0px">
                                                <span class="message">{{substr($edu->description,0,150)}}</span>
                                            </a>
                                        </li>

                                    @endforeach
                                    <li>
                                        <div class="text-center">
                                            <a href="{{route('requestPayLessons')}}">
                                                <strong>See All Pending Lesson Requests</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                                <!-- list of msg -->
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->
        @yield('content')
    </div>


    <!-- footer content -->
    <footer>
        <div class="pull-right">
            <a href="">2016/MIT/022</a>
        </div>
        <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->
</div>
</div>

<!-- jQuery -->
<script src="{{asset('')}}assets/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{asset('')}}assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="{{asset('')}}assets/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="{{asset('')}}assets/vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="{{asset('')}}assets/vendors/Chart.js/dist/Chart.min.js"></script>
<!-- Raphael.js -->
<script src="{{asset('')}}assets/vendors/raphael/raphael.min.js"></script>
<!-- Morris.js -->
<script src="{{asset('')}}assets/vendors/morris.js/morris.min.js"></script>
<!-- gauge.js -->
<script src="{{asset('')}}assets/vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="{{asset('')}}assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="{{asset('')}}assets/vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="{{asset('')}}assets/vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="{{asset('')}}assets/vendors/Flot/jquery.flot.js"></script>
<script src="{{asset('')}}assets/vendors/Flot/jquery.flot.pie.js"></script>
<script src="{{asset('')}}assets/vendors/Flot/jquery.flot.time.js"></script>
<script src="{{asset('')}}assets/vendors/Flot/jquery.flot.stack.js"></script>
<script src="{{asset('')}}assets/vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="{{asset('')}}assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="{{asset('')}}assets/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="{{asset('')}}assets/vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="{{asset('')}}assets/vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="{{asset('')}}assets/vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="{{asset('')}}assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="{{asset('')}}assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{asset('')}}assets/vendors/moment/min/moment.min.js"></script>
<script src="{{asset('')}}assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- Custom Theme Scripts -->
<script src="{{asset('')}}assets/build/js/custom.js"></script>
<script src="{{asset('')}}confirm/jquery-confirm.min.js"></script>
@yield('extrs-js')
@if(\Illuminate\Support\Facades\Auth::user()->status != 1 AND \Illuminate\Support\Facades\Auth::user()->user_regster_type == 'educator')
    <script>
        $.confirm({
            title: 'You are not activated',
            content: 'Please Contact admin for more information.<br> Email: @php echo \Illuminate\Support\Facades\Auth::user()->email @endphp',
            icon: 'fa fa-question-circle',
            theme: 'modern',
            closeIcon: false,
            animation: 'scale',
            type: 'red',
            buttons: {
                somethingElse: {
                    text: 'Logout',
                    btnClass: 'btn-blue',
                    keys: ['enter', 'shift'],
                    action: function () {
                        document.getElementById('logout-form').submit()
                    }
                }
            }
        });
    </script>
@endif

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });
</script>
</body>
</html>
