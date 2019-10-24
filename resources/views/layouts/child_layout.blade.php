<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>අකුරු මිතුරු</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <!-- Favicons -->
    <link rel="shortcut icon" href="{{asset('')}}child/images/favicon.ico">
    <link rel="apple-touch-icon" href="{{asset('')}}child/images/icon.png">
    <!-- Google font (font-family: 'Dosis', Roboto;) -->
    <link href="https://fonts.googleapis.com/css?family=Dosis:400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{asset('')}}child/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('')}}child/css/plugins.css">
    <link rel="stylesheet" href="{{asset('')}}child/style.css">

    <!-- Cusom css -->
    <link rel="stylesheet" href="{{asset('')}}child/css/custom.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{asset('')}}confirm/jquery-confirm.min.css">

    <style type="text/css">
        .single__event {
            background: #e7e7e7 none repeat scroll 0 0;
            position: relative;
        }
    </style>
@yield('extra-css')
<!-- Modernizer js -->
    <script src="{{asset('')}}child/js/vendor/modernizr-3.5.0.min.js"></script>
</head>
<body>
<!-- Main wrapper -->
<div class="wrapper" id="wrapper">

    <!-- Header -->
    <header id="header" class="jnr__header header--2 clearfix">
        <!-- Start Mainmenu Area -->
        <div class="mainmenu__wrapper bg--white">
            <div class="container">
                <div class="row d-none d-lg-flex">
                    <div class="col-sm-4 col-md-6 col-lg-2 order-1 order-lg-1">
                        <div class="logo">
                            <a href="{{asset('')}}">
                                <img src="{{asset('')}}child/images/logo/2new.jfif" alt="logo images">
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-2 col-lg-7 order-3 order-lg-2">
                        <div class="mainmenu__wrap">
                            <nav class="mainmenu__nav">
                                <ul class="mainmenu">
                                    <li><a href="{{asset('')}}child/find-course">All Courses</a></li>
                                    <li><a href="{{asset('')}}child/my-courses">My Courses</a></li>
                                    <li><a href="{{asset('')}}child/my-suggest">Suggested Courses</a></li>
                                    <li><a href="{{asset('')}}child/my-tests">My Tests</a></li>
                                    <li><a href="{{asset('')}}child/games/list">Games</a></li>
                                    @if(isset($child_pay_requests) AND $child_pay_requests != '')
                                        <li>
                                            <div class="shopbox d-flex justify-content-end align-items-center">
                                                <a class="" href="{{route('readNotiChild')}}">
                                                    <i class="fa fa-external-link"></i>
                                                </a>
                                                <span>{{count($child_pay_requests)}}</span>
                                            </div>
                                        </li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-4 col-md-4 order-2 order-lg-3">
                        <div class="shopbox d-flex justify-content-end align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                        style="background: #fff;">
                                    {{\Illuminate\Support\Facades\Auth::user()->name}} <i class="caret"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li>
                                        <a href="http://localhost:8000/logout" title="Logout"
                                           onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                           style="padding: 0px 19px;background: #fff; color: #ef0808;font-size: 13px;">
                                            <i class="fa fa-sign-out pull-right"
                                               style="padding: 11px 19px;background: #fff; color: #ef0808;"></i> Log Out
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Mobile Menu -->
                <div class="mobile-menu d-block d-lg-none">
                    <div class="logo">
                        <a href="{{asset('')}}"><img src="{{asset('')}}child/images/logo/2new.jfif" alt="logo"></a>
                    </div>
                    <a class="minicart-trigger" href="#">
                        <i class="fa fa-shopping-basket"></i>
                    </a>
                </div>
                <!-- Mobile Menu -->
            </div>
        </div>
        <!-- End Mainmenu Area -->
    </header>
    <!-- //Header -->
    @if(\Illuminate\Support\Facades\Auth::user()->is_completed)
        <div class="row">
            <div class="col-md-12">
                <div class="junior__header__top bg-image--5 sticky__header  ">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-lg-6 col-sm-9 col-12">
                                <div class="jun__header__top__left">

                                </div>
                            </div>
                            <div class="col-md-4 col-lg-6 col-sm-3 col-12">
                                <div class="jun__header__top__right">
                                    {{--<span>03</span>--}}
                                    <div class="text-right"
                                         style=" color: #fff;font-weight: 600;font-size: 25px;">
                                        <span id="score">Level {{\Illuminate\Support\Facades\Auth::user()->level}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endif
@yield('content')

<!-- Footer Area -->
    <footer id="footer" class="footer-area">
        <div class="footer__wrapper poss-relative ftr__btm__image section-padding--lg bg--white">

        </div>
        <div class="copyright">
            <div class="container">
                <div class="row align-items-center copyright__wrapper">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="coppy__right__inner">
                            <p><i class="fa fa-copyright"></i>Copyright, 2019 <span>අකුරු මිතුරු</span></p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="ftr__social__icon">
                            {{--<ul class="dacre__social__link d-flex justify-content-center justify-content-md-end justify-content-lg-end">--}}
                            {{--<li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>--}}
                            {{--<li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>--}}
                            {{--<li class="vimeo"><a href="#"><i class="fa fa-vimeo"></i></a></li>--}}
                            {{--<li class="pinterest"><a href="#"><i class="fa fa-pinterest-p"></i></a></li>--}}
                            {{--</ul>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- //Footer Area -->

</div><!-- //Main wrapper -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
<!-- JS Files -->
<script src="{{asset('')}}child/js/vendor/jquery-3.2.1.min.js"></script>
<script src="{{asset('')}}child/js/popper.min.js"></script>
<script src="{{asset('')}}child/js/bootstrap.min.js"></script>

<script src="{{asset('')}}child/js/plugins.js"></script>
<script src="{{asset('')}}child/js/active.js"></script>
<script src="{{asset('')}}confirm/jquery-confirm.min.js"></script>
<script>
    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
    });

    var score = 0;


</script>

@yield('extra-js')
</body>

</html>
