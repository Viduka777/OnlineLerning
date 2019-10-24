<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
           <!--  <a href="{{route('home')}}" class="site_title"><i class='fas fa-book-reader' style='font-size:24px'></i>
                <span>අකුරු මිතුරු</span></a> -->

  <a href="{{route('home')}}" class="site_title">
  <img src="http://127.0.0.1:8000/child/images/logo/2new.jfif" alt="logo images"></a> 

               
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{asset('')}}images/icons/dashboard/{{$layout}}.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <h2>{{ str_limit(\Illuminate\Support\Facades\Auth::user()->name, $limit = 100, $end = '...') }}</h2>
                <small class="text-muted">{{ucfirst(\Illuminate\Support\Facades\Auth::user()->user_regster_type)}}</small>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br/>

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a href="{{route('home')}}"><i class="fa fa-home"></i> Home </a>
                        <!-- <ul class="nav child_menu">
                          <li><a href="index.html">Dashboard</a></li>
                          <li><a href="index2.html">Dashboard2</a></li>
                          <li><a href="index3.html">Dashboard3</a></li>
                        </ul> -->
                    </li>

                </ul>
                @if(\Illuminate\Support\Facades\Auth::user()->user_regster_type == 'parent')
                    <ul class="nav side-menu">
                        <li><a><i class="fa fa-child" style="font-size:24px"></i> Child Accounts <span
                                        class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('child.add')}}">Add Child Accounts</a></li>
                                <li><a href="{{route('child.list')}}">List all children</a></li>
                                {{--<li><a href="index3.html">Dashboard3</a></li>--}}
                            </ul>
                        </li>
                        <li>
                            <a><i class="fa fa-book" aria-hidden="true"></i> Lessons<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu" >
                                <li><a href="{{route('allEducatorLessons')}}">All Lessons</a>

                            </ul>
                        </li>
                        <li>
                            <a><i class="fa fa-book" aria-hidden="true"></i> Educators<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu" >
                                <li><a href="{{route('allEducatorsParents')}}">All Educators</a>

                            </ul>
                        </li>
                        <li>
                            <a><i class="fa fa-book" aria-hidden="true"></i> Requested Lessons<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu" >
                                <li><a href="{{route('requestPayLessons')}}">All Requested Lessons</a>

                            </ul>
                        </li>
                        <li>
                            <a><i class="fa fa-book" aria-hidden="true"></i> Papers<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu" >
                                <li><a href="{{route('parentChildPapersView')}}">Answered Papers</a>

                            </ul>
                        </li>
                    </ul>
                @endif
                @if(\Illuminate\Support\Facades\Auth::user()->user_regster_type == 'educator')
                    <ul class="nav side-menu" style="">
                        <li><a><i class="fa fa-book" aria-hidden="true"></i> Lessons <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu" >
                                <li class="current-page"><a href="{{route('educator.addlesson')}}">Add lesson</a></li>
                                <li class="current-page"><a href="{{route('educator.mylessons')}}">My lessons</a></li>

                            </ul>
                        </li>
                        <li><a><i class="fa fa-book" aria-hidden="true"></i> Test <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu" >
                                <li class="current-page"><a href="{{route('educator.addLessionTest')}}">Add Test</a></li>
                                {{--<li class="current-page"><a href="{{route('educator.mylessons')}}">My lessons</a></li>--}}

                            </ul>
                        </li>
                        <li><a><i class="fa fa-book" aria-hidden="true"></i> Papers <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu" >
                                <li class="current-page"><a href="{{route('childPapersView')}}">Child papers</a></li>
                                {{--<li class="current-page"><a href="{{route('educator.mylessons')}}">My lessons</a></li>--}}

                            </ul>
                        </li>
                        <li><a><i class="fa fa-book" aria-hidden="true"></i> Payments <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu" >
                                <li class="current-page"><a href="{{route('archivePaymentsEdu')}}">Payments Received</a></li>
                                {{--<li class="current-page"><a href="{{route('educator.mylessons')}}">My lessons</a></li>--}}

                            </ul>
                        </li>

                    </ul>

                @endif

                @if(\Illuminate\Support\Facades\Auth::user()->user_regster_type == 'admin')
                    <ul class="nav side-menu" style="">

                        <li><a><i class="fa fa-book" aria-hidden="true"></i> General Question <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu" >
                                <li><a href="{{route('addGeneralQuestion')}}">Add General Question </a>
                                <li><a href="{{route('listGeneralQuestion')}}">List General Question </a>

                            </ul>
                        </li>
                        <li>
                            <a><i class="fa fa-book" aria-hidden="true"></i> Lessons<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu" >
                                <li><a href="{{route('allLessons')}}">All Lessons</a>
                                <li><a href="{{route('pendingLessions')}}">Pending Lessons</a>

                            </ul>
                        </li>
                        <li><a><i class="fa fa-book" aria-hidden="true"></i> List of Educators <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu" >
                                <li><a href="{{route('allChild')}}">All Educators </a>
                                <li><a href="{{route('listChild')}}">List Pending Educators </a>
                                <li><a href="{{route('activeChild')}}">List Active Educators </a>

                            </ul>
                        </li>
                        <li><a><i class="fa fa-book" aria-hidden="true"></i> Games <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu" >
                                <li><a href="{{route('addGames')}}">Add Games </a>
                                <li><a href="{{route('listGames')}}">List List</a>

                            </ul>
                        </li>
                        <li><a><i class="fa fa-book" aria-hidden="true"></i> Payments <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu" >
                                <li><a href="{{route('listPayments')}}">List Payments</a>
                                <li><a href="{{route('archivePayments')}}">Payment History</a>

                            </ul>
                        </li>
                    </ul>
                @endif
            </div>

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
           <!--  <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a> -->
            <a href="{{ route('logout') }}" data-toggle="tooltip" data-placement="top" title="Logout"
               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>