@extends('layouts.child_layout')
@section('extra-css')
    <style>
        .event__pub {
            border-bottom: 1px solid #eee;
        }

        .dcare__event .event__content .event__pub .event__date {
            width: 50%;
        }

        .dcare__event .event__content .event__pub .event__date::before {
            background: #fff none repeat scroll 0 0;
        }

        .btn-ul li {
            flex-basis: 100% !important;
        }

        .service .service__details h6 a {
            color: #ffffff;
            display: block;
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 21px;
        }

        .service .service__details p {
            color: #ffffff;
            display: block;
            font-size: 15px;
            font-weight: 600;
        }
    </style>
@endsection

@section('content')
    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area">
        <div class="ht__bradcaump__container">
            <img src="{{asset('')}}child/images/bg-png/6.jfif" alt="bradcaump images">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                            <h2 class="bradcaump-title text-center">
                                Welcome {{\Illuminate\Support\Facades\Auth::user()->name}}</h2>
                            {{--<nav class="bradcaump-inner">--}}
                            {{--<a class="breadcrumb-item" href="{{asset('')}}">Home</a>--}}
                            {{--<span class="brd-separetor"><img src="{{asset('')}}child/images/icons/brad.png"--}}
                            {{--alt="separator images"></span>--}}
                            {{--<span class="breadcrumb-item active">Questions</span>--}}
                            {{--</nav>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->

    <section class="page-event-details bg--white">
        <div class="container">
            <div class="row">
                @if(! \Illuminate\Support\Facades\Auth::user()->is_completed)
                    <div class="col-lg-12">
                        <div class="event-content-wrapper">
                            <div class="event-section">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="dcare__event">
                                            <div class="event__thumb">
                                                <a href="{{asset('')}}child/questions">
                                                    <img src="{{asset('')}}child/images/bg/2311.jpg" alt="event images">
                                                </a>
                                            </div>
                                            <div class="event__content">
                                                {{--<div class="event__pub">--}}
                                                {{--<div class="event__date">--}}
                                                {{--<span class="date">14</span><span>th</span>--}}
                                                {{--</div>--}}
                                                {{--<ul class="event__time">--}}
                                                {{--<li>December, <i class="fa fa-clock-o"></i>5.00 am to 9.00 pm</li>--}}
                                                {{--<li><i class="fa fa-home"></i>Childrens Club, Uttara, Dhaka</li>--}}
                                                {{--</ul>--}}
                                                {{--</div>--}}
                                                <div class="event__inner">
                                                    <p><a href="{{asset('')}}child/questions">Complete questionnaire to
                                                            enter course...</a></p>
                                                </div>
                                                <ul class="event__btn">
                                                    <li></li>
                                                    <li><a href="{{asset('')}}child/questions">Complete
                                                            questionnaire</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="dcare__event">
                            <div class="event__thumb">
                                <a href="event-details.html">
                                    <img src="{{asset('')}}child/images/event/mid-img-2/4.jpg" alt="event images">
                                </a>
                            </div>
                            <div class="event__content">
                                <div class="event__pub">
                                    <div class="event__date">
                                        <span class="date">{{\Illuminate\Support\Facades\Auth::user()->score}}</span><span> Score</span>
                                    </div>
                                    <div class="event__date">
                                        <span class="date">{{\Illuminate\Support\Facades\Auth::user()->level}}</span><span> Level</span>
                                    </div>
                                </div>
                                <ul class="event__btn btn-ul">
                                    {{--<li><a href="#">Book Now</a></li>--}}
                                    <li><a href="#" class="minicart-trigger">View Profile</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="dcare__event">
                            <div class="event__thumb">
                                <a href="event-details.html">
                                    <img src="{{asset('')}}child/images/event/mid-img-2/4-1.jpg" alt="event images">
                                </a>
                            </div>
                            <div class="event__content">
                                <div class="event__pub">
                                    <div class="event__date" style="width: 100%">
                                        <span class="date">{{count($lessons)}}</span><span> Available Courses</span>
                                    </div>
                                </div>
                                <ul class="event__btn btn-ul">
                                    {{--<li><a href="#">Book Now</a></li>--}}
                                    <li><a href="{{asset('')}}child/find-course">Find Courses</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </section>

    <!-- Cartbox -->
    <div class="cartbox-wrap">
        <div class="cartbox text-right">
            <button class="cartbox-close"><i class="zmdi zmdi-close"></i></button>
            <div class="cartbox__inner text-left">
                <div class="col-lg-12 col-md-12 col-sm-12 md-mt-60 col-12 sm-mt-60">
                    <div class="service border__color border__color--8 bg__cat--7">
                        <div class="service__icon">
                            <img src="{{asset('')}}child/images/shape/sm-icon/4.png" alt="icon images">
                        </div>
                        <div class="service__details">
                            <h6><a href="#">{{\Illuminate\Support\Facades\Auth::user()->name}}</a></h6>
                            <p>{{\Illuminate\Support\Facades\Auth::user()->email}}</p>
                            <p>{{ucwords(\Illuminate\Support\Facades\Auth::user()->user_regster_type)}}</p>
                            <p>{{\Illuminate\Support\Facades\Auth::user()->dob}}</p>

                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="dcare__kidezone__wrapper d-flex justify-content-between">
                        <!-- Start Single Kidz -->
                        <div class="kidz__zone">
                            <div class="kidz__thumb">
                                <img src="{{asset('')}}child/images/funfact/5.png" alt="kidz images">
                            </div>
                            <div class="kidz__details">
                                <h6>{{\Illuminate\Support\Facades\Auth::user()->score}} <span><small> Score</small></span>
                                </h6>
                                <p>Score</p>
                            </div>
                        </div>
                        <!-- End Single Kidz -->
                        <!-- Start Single Kidz -->
                        <div class="kidz__zone">
                            <div class="kidz__thumb">
                                <img src="{{asset('')}}child/images/funfact/6.png" alt="kidz images">
                            </div>
                            <div class="kidz__details">
                                <h6>{{\Illuminate\Support\Facades\Auth::user()->level}} <span><small> Level</small></span>
                                </h6>
                                <p>Level</p>
                            </div>
                        </div>
                        <!-- End Single Kidz -->

                    </div>
                </div>

                <div class="cartbox__buttons">
                    <a class="dcare__btn" href="{{asset('')}}child/my-courses"><span>My Courses</span></a>
                </div>
                <div class="cartbox__buttons">
                    <a class="dcare__btn" href="{{asset('')}}child/find-course"><span>Find Courses</span></a>
                </div>
            </div>
        </div>
    </div>
    <!-- //Cartbox -->
@endsection

@section('extra-js')

@endsection