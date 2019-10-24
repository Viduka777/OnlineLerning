@extends('layouts.dashboard')
@section('left-nav')
    @include('dashboard.nav.left-nav')
@endsection

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>List Educators</h3>
                </div>

                {{--<div class="title_right">--}}
                {{--<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">--}}
                {{--<div class="input-group">--}}
                {{--<input type="text" class="form-control" placeholder="Search for...">--}}
                {{--<span class="input-group-btn">--}}
                {{--<button class="btn btn-default" type="button">Go!</button>--}}
                {{--</span>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
            </div>
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <div class="x_panel">

                        <div class="x_content" class="col-md-4 col-sm-12 col-xs-12" style="position: relative;">
                            <table class="table table-striped projects">
                                <thead>
                                <tr>
                                    <th style="width: 1%">#</th>
                                    <th style="width: 15%">Name</th>
                                    <th style="width: 15%">Email</th>
                                    <th style="width: 30%">Education Qualifications</th>
                                    <th style="width: 10%">Rate</th>
                                    <th style="width: 20%">Rate Now</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $x = 1; @endphp
                                @foreach($users as $que)
                                    {{--{{dd($lesson)}}--}}
                                    <tr>
                                        <td>{{$x}}</td>
                                        <td>{{$que->name}}</td>
                                        <td>{{$que->email}}</td>
                                        <td>{{$que->education_qualifications}}</td>
                                        <td>
                                            <div class="star-ratings-sprite">
                                                <span style="width:{{$que->rate}}%" class="star-ratings-sprite-rating" ></span>
                                            </div>
                                        </td>
                                        <td>
                                            @php
                                                $done_rates = \App\Models\RateEducator::where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->where('educator_id',$que->id)->orderBy('created_at','DESC')->first();

                                            @endphp
                                            <select class="rate_select" data-show-icon="true"
                                                    data-educator="{{$que->id}}"
                                                    data-user="{{\Illuminate\Support\Facades\Auth::user()->id}}" {{($done_rates)?'disable':''}}>
                                                <option value="20" {{($done_rates)?($done_rates->rate == 20)?'selected':'':''}} data-content="<i class='fa fa-star strs'></i>">.
                                                </option>
                                                <option value="40"{{($done_rates)?($done_rates->rate == 40)?'selected':'':''}}
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
                                        </td>

                                    </tr>
                                    @php $x++; @endphp
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection


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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.10/js/bootstrap-select.min.js"></script>
    <script>

        $('.rate_select').selectpicker();

        $('.rate_select').on('change', function (e) {
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
                        if (res){
                            alert('Rate Success')
                            setTimeout(function () {
                                location.reload();
                            },1500);
                        }
                    }
                });
            }
        });
    </script>
@endsection