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
                            <h2 class="bradcaump-title">Suggested Courses</h2>
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="{{asset('')}}">Home</a>
                                <span class="brd-separetor"><img src="{{asset('')}}child/images/icons/brad.png"
                                                                 alt="separator images"></span>
                                <span class="breadcrumb-item active">Suggested Courses</span>
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
                                <div class="col-md-12">
                                    <br>
                                    <table>
                                        <tr>
                                            <th>#</th>
                                            <th>Lesson Title</th>
                                            <th>Lesson Description</th>
                                            <th>Lesson Category</th>
                                            <th>Lesson Type</th>
                                            <th>view</th>
                                        </tr>
                                        @php $x=1; @endphp
                                        @foreach($courses as $c)
                                            @if($c->price == 0)
                                                <tr>
                                                    <td>{{$x}}</td>
                                                    <td>{{$c->title}}</td>
                                                    <td>{{$c->description}}</td>
                                                    <td>{{str_replace('_',' ',$c->lesson_category)}}</td>
                                                    <td>{{$c->lesson_type}}</td>
                                                    <td>
                                                        <a href="{{asset('')}}course/suggest/view/{{$c->lesson_id}}">View</a>
                                                    </td>
                                                </tr>
                                                @php $x=1; @endphp
                                            @else
                                                @if(\App\Models\CourseUser::where('course_id',$c->lesson_id)->where('user_id',$c->child_id)->count())
                                                    <tr>
                                                        <td>{{$x}}</td>
                                                        <td>{{$c->title}}</td>
                                                        <td>{{$c->description}}</td>
                                                        <td>{{str_replace('_',' ',$c->lesson_category)}}</td>
                                                        <td>{{$c->lesson_type}}</td>
                                                        <td>
                                                            <a href="{{asset('')}}course/suggest/view/{{$c->lesson_id}}">View</a>
                                                        </td>
                                                    </tr>
                                                @endif
                                                @php $x=1; @endphp
                                            @endif
                                        @endforeach
                                    </table>
                                </div>
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