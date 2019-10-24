@extends('layouts.child_layout')
@section('extra-css')
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.10/css/bootstrap-select.min.css"/>
    <style>
        .strs {
            color: #f3e20c;
            font-size: 25px;

        }

        .star-ratings-sprite {
            background: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/2605/star-rating-sprite.png") repeat-x;
            font-size: 0;
            height: 21px;
            line-height: 0;
            overflow: hidden;
            text-indent: -999em;
            width: 110px;
            /*margin: 0 auto;*/
        }

        .star-ratings-sprite-rating {
            background: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/2605/star-rating-sprite.png") repeat-x;
            background-position: 0 100%;
            float: left;
            height: 21px;
            display: block;
        }

        #overlay {
            position: fixed; /* Sit on top of the page content */
            display: block; /* Hidden by default */
            width: 100%; /* Full width (cover the whole page) */
            height: 100%; /* Full height (cover the whole page) */
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(50, 50, 50, 0.65); /* Black background with opacity */
            z-index: 2; /* Specify a stack order in case you're using a different order for other elements */
            cursor: pointer; /* Add a pointer on hover */
            padding-top: 25%;
            /*background;*/
        }
        #overlay h2{
            color: #fff;
            font-size: 25px;
            color: #fff;
            text-align: center;
        }
    </style>
@endsection
@section('content')
    <!-- Start Class Details -->
    @if($overlay)
    <div id="overlay">
        <h2>
            You need to Purchase this lesson
        </h2>
    </div>
    @endif

    <br>
    <section class="bg--white page-class-details bg--white ">
        <div class="container">
            <div class="row">
                @if(!$overlay)
                    <div class="col-lg-12">
                        <div class="event-content-wrapper">
                            <div class="event-section">
                                <div class="row">
                                    <div class="col-lg-12">
                                        @if(session()->has('error'))
                                            <div class="alert alert-warning">
                                                {{ session()->get('error') }}
                                            </div>
                                        @endif
                                        <div class="class__quality__desc">
                                            <div class="class__thumb">
                                                <div class="courses__type d-flex justify-content-between">
                                                    <ul class="d-flex">
                                                        {{--{{dd($data)}}--}}
                                                        <li>Material Type :
                                                            <span>{{strtoupper($data->lesson_type)}}</span>
                                                        </li>
                                                        <li>Lesson Level :
                                                            <span>{{str_replace('_',' ', ucwords($data->lesson_category))}}</span>
                                                        </li>
                                                        <li><i class="fa fa-eye"></i> {{$data->views}}</li>
                                                        <li>Created :
                                                            <span>{{\Carbon\Carbon::createFromTimeStamp(strtotime($data->created_at))->diffForHumans()}}</span>
                                                        </li>
                                                    </ul>
                                                    <div class="star-ratings-sprite rating d-flex"
                                                         title="{{(round($data->rate)/20)}} out of 5">
                                                            <span style="width:{{$data->rate}}%"
                                                                  class="star-ratings-sprite-rating"></span>
                                                    </div>
                                                </div>
                                                <div class="courses__images">
                                                    <img src="{{asset('')}}child/images/class/big-img/2.jpg"
                                                         alt="class images">
                                                </div>
                                                {{--<ul class="courses__meta d-flex">--}}
                                                {{--<li class="prize">$50</li>--}}
                                                {{--<li></li>--}}
                                                {{--<li><i class="fa fa-user"></i>50</li>--}}
                                                {{--</ul>--}}
                                            </div>
                                            <div class="class-details-inner">
                                                <div class="courses__inner">
                                                    <h2 style="padding: 0px;">{{ucwords($data->title)}}
                                                        @if($lessonMarks)
                                                            <div class=" pull-right col-md-3 text-center">
                                                                <span style="font-size: 14px;display: block;line-height: 0"
                                                                      class="">Marks for this Test : {{$lessonMarks->mark}}</span>
                                                                <a class="btn btn-warning"
                                                                   href="{{asset('')}}course/view/test/{{$data->id}}/retake">Retake
                                                                    Test</a>
                                                            </div>

                                                        @else
                                                            @if(count($tests))
                                                                <a class="btn btn-info pull-right"
                                                                   href="{{asset('')}}course/view/test/{{$data->id}}">Get
                                                                    Test</a>
                                                            @endif
                                                        @endif
                                                    </h2>
                                                    <p>{{ucfirst($data->description)}}</p>
                                                    <br>
                                                    @if($data->lesson_type == 'img')
                                                        <img src="{{ltrim($data->file_path, '.')}}" alt=""
                                                             class="img-responsive">
                                                    @elseif($data->lesson_type =='pdf')
                                                        <object data="{{ltrim($data->file_path, '.')}}"
                                                                type="application/pdf" width="100%"
                                                                height="750px"></object>
                                                    @elseif($data->lesson_type =='video')
                                                        <video width="100%" controls>
                                                            <source src="{{ltrim($data->file_path, '.')}}"
                                                                    type="video/mp4">
                                                            Your browser does not support the video tag.
                                                        </video>
                                                    @elseif($data->lesson_type =='audio')
                                                        <audio width="100%" controls>
                                                            <source src="{{ltrim($data->file_path, '.')}}"
                                                                    type="audio/mpeg">
                                                            Your browser does not support the audio tag.
                                                        </audio>
                                                    @else
                                                        <a href="{{ltrim($data->file_path, '.')}}">
                                                            <button class="btn btn-info">
                                                                Download {{strtoupper($data->lesson_type)}}</button>
                                                        </a>
                                                    @endif
                                                </div>

                                            </div>


                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="col-lg-6">
                        <div style="border: 1px solid #eee; margin-top: 40px; padding: 10px 10px 35px 10px; ">
                            @php
                                $done_rates = \App\Models\RateLesson::where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->where('lesson_id',$data->id)->orderBy('created_at','DESC')->first();
                            @endphp
                            <h2>Rate Lesson </h2>
                            <br>
                            <select class="rate_select_lesson" data-show-icon="true"
                                    data-lesson="{{$data->id}}"
                                    data-user="{{\Illuminate\Support\Facades\Auth::user()->id}}" {{($done_rates)?'disable':''}}>
                                <option value="20"
                                        {{($done_rates)?($done_rates->rate == 20)?'selected':'':''}} data-content="<i class='fa fa-star strs'></i>">
                                    .
                                </option>
                                <option value="40" {{($done_rates)?($done_rates->rate == 40)?'selected':'':''}}
                                data-content="<i class='fa fa-star strs'></i> <i class='fa fa-star strs'></i>">
                                    .
                                </option>
                                <option value="60" {{($done_rates)?($done_rates->rate == 60)?'selected':'':''}}
                                data-content="<i class='fa fa-star strs'></i> <i class='fa fa-star strs'></i> <i class='fa fa-star strs'></i>">
                                    .
                                </option>
                                <option value="80" {{($done_rates)?($done_rates->rate == 80)?'selected':'':''}}
                                data-content="<i class='fa fa-star strs'></i> <i class='fa fa-star strs'></i> <i class='fa fa-star strs'></i> <i class='fa fa-star strs'></i>">
                                    .
                                </option>
                                <option value="100" {{($done_rates)?($done_rates->rate == 100)?'selected':'':''}}
                                data-content="<i class='fa fa-star strs'></i> <i class='fa fa-star strs'></i> <i class='fa fa-star strs'></i> <i class='fa fa-star strs'></i> <i class='fa fa-star strs'></i>">
                                    .
                                </option>
                            </select>
                            <br>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div style="border: 1px solid #eee; margin-top: 40px; padding: 10px 10px 35px 10px; ">
                            @php
                                $done_rates = \App\Models\RateEducator::where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->where('educator_id',$data->user_id)->orderBy('created_at','DESC')->first();
                            @endphp
                            <h2>Rate Educator</h2>
                            <br>
                            <select class="rate_select_educator" data-show-icon="true"
                                    data-educator="{{$data->user_id}}"
                                    data-user="{{\Illuminate\Support\Facades\Auth::user()->id}}" {{($done_rates)?'disable':''}}>
                                <option value="20"
                                        {{($done_rates)?($done_rates->rate == 20)?'selected':'':''}} data-content="<i class='fa fa-star strs'></i>">
                                    .
                                </option>
                                <option value="40" {{($done_rates)?($done_rates->rate == 40)?'selected':'':''}}
                                data-content="<i class='fa fa-star strs'></i> <i class='fa fa-star strs'></i>">
                                    .
                                </option>
                                <option value="60" {{($done_rates)?($done_rates->rate == 60)?'selected':'':''}}
                                data-content="<i class='fa fa-star strs'></i> <i class='fa fa-star strs'></i> <i class='fa fa-star strs'></i>">
                                    .
                                </option>
                                <option value="80" {{($done_rates)?($done_rates->rate == 80)?'selected':'':''}}
                                data-content="<i class='fa fa-star strs'></i> <i class='fa fa-star strs'></i> <i class='fa fa-star strs'></i> <i class='fa fa-star strs'></i>">
                                    .
                                </option>
                                <option value="100" {{($done_rates)?($done_rates->rate == 100)?'selected':'':''}}
                                data-content="<i class='fa fa-star strs'></i> <i class='fa fa-star strs'></i> <i class='fa fa-star strs'></i> <i class='fa fa-star strs'></i> <i class='fa fa-star strs'></i>">
                                    .
                                </option>
                            </select>
                            <br>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
@section('extra-js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.10/js/bootstrap-select.min.js"></script>
    <script>
        $('.rate_select_lesson').selectpicker();
        $('.rate_select_educator').selectpicker();

        $('.rate_select_educator').on('change', function (e) {
            var edu = $(this).data('educator');
            if (edu != undefined) {
                var rate = $(this).val();
                var user = $(this).data('user');
                $.ajax({
                    url: "/parent/rate",
                    type: 'POST',
                    data: {'educator_id': edu, 'rate': rate, 'user': user},
                    dataType: "JSON",
                    success: function (res) {
                        if (res) {
                            alert('Rate Success')
                            setTimeout(function () {
                                location.reload();
                            }, 1500);
                        }
                    }
                });
            }
        });

        $('.rate_select_lesson').on('change', function (e) {
            var edu = $(this).data('lesson');
            if (edu != undefined) {
                var rate = $(this).val();
                var user = $(this).data('user');
                $.ajax({
                    url: "/child/rate",
                    type: 'POST',
                    data: {'lesson': edu, 'rate': rate, 'user': user},
                    dataType: "JSON",
                    success: function (res) {
                        if (res) {
                            alert('Rate Success')
                            setTimeout(function () {
                                location.reload();
                            }, 1500);
                        }
                    }
                });
            }
        });
    </script>
@endsection