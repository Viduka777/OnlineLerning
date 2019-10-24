@extends('layouts.dashboard')
@section('left-nav')
    @include('dashboard.nav.left-nav')
@endsection

@section('content')
    <div class="right_col" role="main">
        <!-- top tiles -->
        <div class="row tile_count">
            <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-book"></i> Total Number of Lessons</span>
                <div class="count blue">{{count($lessons)}}</div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-book"></i> Active Lessons</span>
                <div class="count green">{{count($lessons->where('status', 1))}}</div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-book"></i> Pending Lessons</span>
                <div class="count red">{{count($lessons->where('status', 0))}}</div>
            </div>

        </div>
        <hr>
        <!-- viwers section -->
        <div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="x_panel tile fixed_height_320">
                    <div class="x_title">
                        <h3>Lesson Views</h3>

                        <div class="clearfix"></div>
                    </div>
                    {{--                    {{}}--}}
                    <div class="x_content">
                        <h4>Lesson No of viewers</h4>
                        @foreach($lessons as $l)
                            <div class="widget_summary">
                                <div class="w_left w_25">
                                    <span><b>{{substr($l->title,0,10)}}</b></span>
                                </div>
                                <div class="w_center w_55">
                                    <div class="progress">
                                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60"
                                             aria-valuemin="0" aria-valuemax="100"
                                             style="width: {{($l->views / $lessons->max('views'))*100}}%;">
                                            <span class="sr-only">60% Complete</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="w_right w_20">
                                    <span>{{$l->views}}</span>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>


        </div>
        <!-- viewers section -->

        <!-- graph section -->

        <div class="col-md-8 col-sm-12 col-xs-12">
            <div class="dashboard_graph x_panel">
                <div class="row x_title">
                    <div class="col-md-">
                        <h3>Monthly Income
                            <small></small>
                        </h3>
                    </div>

                </div>
                <div class="x_content">
                    <canvas id="mybarChart"></canvas>
                </div>
            </div>
        </div>
        <!-- graph section -->

    </div>

@endsection
@section('extra-css')
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">--}}
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

    </style>
@endsection


@section('extrs-js')
    @php
        $datas = \App\Models\EducatorPayment::where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->get()->groupBy(function($val) {
            return \Carbon\Carbon::parse($val->created_at)->format('F');
     });
            $data = array();
            $dates = array();
                foreach ($datas as $month => $one){
                $total = 0;
                    foreach ($one as $ss){
                    $total = $total + $ss->payment;
                    }
                    //$data[$month]=$total;
                    array_push($data,$total);

                    array_push($dates,$month);
                }
    @endphp
    {{--    {{dd(json_encode($dates))}}--}}
    <script>
        var info = "{{json_encode($data)}}";


        if ($('#mybarChart').length) {
            var info = "{{json_encode($dates)}}";
            var ctx = document.getElementById("mybarChart");
            var mybarChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: JSON.parse(info.replace(/&quot;/g, '"')),
                    datasets: [{
                        label: 'Monthly Income',
                        backgroundColor: "#26B99A",
                        data: {{json_encode($data)}}
                    }]
                },

                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });

        }
    </script>
@endsection