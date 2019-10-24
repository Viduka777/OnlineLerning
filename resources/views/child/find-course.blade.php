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
                            <h2 class="bradcaump-title">Courses</h2>
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="{{asset('')}}">Home</a>
                                <span class="brd-separetor"><img src="{{asset('')}}child/images/icons/brad.png"
                                                                 alt="separator images"></span>
                                <span class="breadcrumb-item active">Courses</span>
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
                                <div class="col-md-4 pull-right">
                                    <div class="form-group">
                                        <select name="" id="filter" class="form-control">
                                            <option value="all" {{($fil == 'all')?'selected':''}}>All Lessons</option>
                                            <option value="free" {{($fil == 'free')?'selected':''}}>Free Lessons
                                            </option>
                                            <option value="paid" {{($fil == 'paid')?'selected':''}}>Paid Lessons
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 pull-right">
                                    <div class="form-group">
                                        <select name="" id="type" class="form-control">
                                            <option value="all" {{($type == 'all')?'selected':''}}>All Types</option>
                                            <option value="img" {{($type == 'img')?'selected':''}}>Image</option>
                                            <option value="doc" {{($type == 'doc')?'selected':''}}>Document</option>
                                            <option value="ppt" {{($type == 'ppt')?'selected':''}}>Presentation</option>
                                            <option value="excel" {{($type == 'excel')?'selected':''}}>MS Excel</option>
                                            <option value="audio" {{($type == 'audio')?'selected':''}}>Audio</option>
                                            <option value="video" {{($type == 'video')?'selected':''}}>Video</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @if(count($courses))
                                    @foreach($courses as $course)
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="dcare__event">
                                                <div class="event__thumb">
                                                    @if($course->price == 0)
                                                        <a href="{{asset('')}}course/view/{{$course->id}}">
                                                            <img src="{{asset('')}}child/images/bg/56.jpg"
                                                                 alt="event images">
                                                        </a>

                                                    @else
                                                        <a href="#">
                                                            <img src="{{asset('')}}child/images/bg/56.jpg"
                                                                 alt="event images">
                                                        </a>
                                                    @endif

                                                </div>
                                                <div class="event__content">
                                                    <div class="event__inner">
                                                        <p><a href="#">{{substr($course->title,0,40)}}</a></p>
                                                        <p>{{substr($course->description,0,40)}}</p>
                                                    </div>
                                                    <div class="event__pub">
                                                        <div class="event__date">
                                                            <span class="date">{{strtoupper($course->lesson_type)}}</span>
                                                        </div>
                                                        <div class="event__time">
                                                            <div class="star-ratings-sprite"
                                                                 title="{{round($course->rate/20 , 1)}} out of 5">
                                                            <span style="width:{{$course->rate}}%"
                                                                  class="star-ratings-sprite-rating"></span>

                                                            </div>
                                                            <small>Star Rating</small>
                                                        </div>

                                                    </div>

                                                    <ul class="event__btn course_btn">
                                                        @if($course->price > 0)
                                                            @if(count($cu->where('course_id',$course->id)))
                                                                <li>
                                                                    <a href="{{asset('')}}course/view/{{$course->id}}"><span
                                                                                class="badge badge-info">Premium</span>
                                                                        Learn This </a></li>
                                                            @else
                                                                <li>
                                                                    <form action="{{route('lessonRequest')}}"
                                                                          method="post">
                                                                        {{csrf_field()}}
                                                                        <input type="hidden" name="amount"
                                                                               value="{{$course->price}}">
                                                                        <input type="hidden" name="course_id"
                                                                               value="{{$course->id}}">
                                                                        @if(\App\Models\RequestedLessions::where('lesson_id',$course->id)->where('child_id',\Illuminate\Support\Facades\Auth::user()->id)->count())
                                                                            <button class="pay_btn"
                                                                                    style="color: #0a762b">
                                                                                Purchase Request Sent
                                                                            </button>
                                                                        @else
                                                                            <button type="submit" class="pay_btn">
                                                                                <span class="badge badge-info">Premium</span>
                                                                                Purchase Request
                                                                                LKR. {{$course->price}}</button>
                                                                        @endif

                                                                    </form>
                                                                </li>
                                                            @endif
                                                        @else
                                                            <li><a href="{{asset('')}}course/view/{{$course->id}}">Learn
                                                                    This</a></li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <br>
                                        <br>
                                        <h2 class="text-center">No lessons available for this combination!</h2>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('extra-js')
    <script>
        $('#filter, #type').change(function (e) {
            var filter = $('#filter').val();
            var type = $('#type').val();
            window.location = "/child/find-courses/" + filter + "/" + type;
        })
    </script>
@endsection