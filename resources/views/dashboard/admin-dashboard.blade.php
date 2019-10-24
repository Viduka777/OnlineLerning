@extends('layouts.dashboard')
@section('left-nav')
    @include('dashboard.nav.left-nav')
@endsection

@section('content')
    <div class="right_col" role="main">
        <!-- top tiles -->
        {{--<div class="row tile_count">--}}
        {{--<div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">--}}
        {{--<span class="count_top"><i class="fa fa-book"></i> Total Number of Lessons</span>--}}
        {{--<div class="count blue">{{count($lessons)}}</div>--}}
        {{--</div>--}}
        {{--<div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">--}}
        {{--<span class="count_top"><i class="fa fa-book"></i> Active Lessons</span>--}}
        {{--<div class="count green">{{count($lessons->where('status', 1))}}</div>--}}
        {{--</div>--}}
        {{--<div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">--}}
        {{--<span class="count_top"><i class="fa fa-book"></i> Deactivated Lessons</span>--}}
        {{--<div class="count red">{{count($lessons->where('status', 0))}}</div>--}}
        {{--</div>--}}

        {{--</div>--}}
        <hr>

        <!-- sales summary graph -->
        <div class="col-md-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Sales Summary
                        <small>Monthly sales</small>
                    </h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <canvas id="mybarChart"    style= "width: 1013px;
    height: 416px;
    padding-left: 100px;
    padding-right: 272px;"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-6 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Sales Summary
                        <small>Educator wise Sales</small>
                    </h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <canvas id="educwise"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Sales Summary
                        <small>Lesson wise Sales</small>
                    </h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <canvas id="lessonwise"></canvas>
                </div>
            </div>
        </div>
        <!-- sales summary graph -->
        <div class="clearfix"></div>

    </div>


@endsection
@section('extra-css')

@endsection

@section('extrs-js')
    @php
    //main chart
        $datas = \App\Models\Payment::get()->groupBy(function($val) {
            return \Carbon\Carbon::parse($val->created_at)->format('F');
     });
            $data = array();
            $dates = array();
                foreach ($datas as $month => $one){
                $total = 0;
                    foreach ($one as $ss){
                    $total = $total + $ss->total_amount;
                    }
                    array_push($data,$total);

                    array_push($dates,$month);
                }
    //lesson vise
    $datas1 = \App\Models\Payment::get()->groupBy('bill_id');
            $data1 = array();
            $dates1 = array();
                foreach ($datas1 as $month1 => $one1){
                $total1 = 0;
                    foreach ($one1 as $ss1){
                    $total1 = $total1 + $ss1->total_amount;
                    }

                    array_push($data1,$total1);

                    array_push($dates1,\App\lesson::where('id',$month1)->first()->title);
                }

    //educator vise
    $datas2 = \App\Models\Payment::get()->groupBy(function($val) {
            return \App\Models\Lesson::where('id',$val->bill_id)->first()->user_id;
     });
            $data2 = array();
            $dates2 = array();
                foreach ($datas2 as $month2 => $one2){
                $total2 = 0;
                    foreach ($one2 as $ss2){
                    $total2 = $total2 + $ss2->total_amount;
                    }

                    array_push($data2,$total2);

                    array_push($dates2,\App\User::where('id',\App\lesson::where('id',$month2)->first()->user_id)->first()->name);
                }
    @endphp
    {{--    {{dd(json_encode($dates))}}--}}
    <script>
        if ($('#mybarChart').length) {
            var info = "{{json_encode($dates)}}";
            var ctx = document.getElementById("mybarChart");
            var mybarChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: JSON.parse(info.replace(/&quot;/g, '"')),
                    datasets: [{
                        label: 'Number of Sales',
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
        if ($('#educwise').length) {
            var info = "{{json_encode($dates2)}}";
            var ctx = document.getElementById("educwise");
            var mybarChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: JSON.parse(info.replace(/&quot;/g, '"')),
                    datasets: [{
                        label: 'Educator Wise Sales',
                        backgroundColor: "#6176c6",
                        data: {{json_encode($data2)}}
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

        if ($('#lessonwise').length) {
            var info = "{{json_encode($dates1)}}";
            var ctx = document.getElementById("lessonwise");
            var mybarChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: JSON.parse(info.replace(/&quot;/g, '"')),
                    datasets: [{
                        label: 'Lesson Wise Sales',
                        backgroundColor: "#c68b61",
                        data: {{json_encode($data1)}}
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