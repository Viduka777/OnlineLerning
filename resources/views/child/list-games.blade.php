@extends('layouts.child_layout')
@section('extra-css')
    <style>
        .star-ratings-sprite {
            background: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/2605/star-rating-sprite.png") repeat-x;
            font-size: 0;
            height: 21px;
            line-height: 0;
            overflow: hidden;
            text-indent: -999em;
            width: 110px;
            margin: 0 auto;
        }

        .star-ratings-sprite-rating {
            background: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/2605/star-rating-sprite.png") repeat-x;
            background-position: 0 100%;
            float: left;
            height: 21px;
            display: block;
        }

        .dcare__event .event__content .event__inner {
            border-bottom: 1px solid #eee;
        }

        .dcare__event .event__content .event__pub .event__date {
            width: 150px;
        }

        .dcare__event .event__content .event__pub .event__date::before {
            background: #fff none repeat scroll 0 0;
        }

        .course_btn li {
            flex-basis: 100% !important;
        }

        .pay_btn {
            background: transparent;
            border: 0;
            font-size: 16px;
            font-weight: 600;
            color: #fff;
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
                            <h2 class="bradcaump-title">Games</h2>
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="{{asset('')}}">Home</a>
                                <span class="brd-separetor"><img src="{{asset('')}}child/images/icons/brad.png"
                                                                 alt="separator images"></span>
                                <span class="breadcrumb-item active">Games</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <!-- Start Class Details -->
    <section class="page-event-details bg--white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    @if(session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endif
                    <div class="event-content-wrapper">
                        <div class="event-section">
                            <div class="row">
                                @foreach($games as $game)
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="dcare__event">
                                            <div class="event__thumb" style="background: url({{asset('')}}uploads/game/{{$game->image}});height: 150px;">
                                            </div>
                                            <div class="event__content">
                                                <div class="event__inner">
                                                    <p><a href="#">{{substr($game->title,0,40)}}</a></p>
                                                </div>

                                                <ul class="event__btn course_btn">
                                                    <li><a href="{{asset('')}}game/view/{{$game->id}}">Play This</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('extra-js')
@endsection