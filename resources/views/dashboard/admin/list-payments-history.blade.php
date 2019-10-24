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
                    <h3>List Payments - History</h3>
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
                            <table class="table projects">
                                <thead>
                                <tr>
                                    <th style="width: 1%">#</th>
                                    <th style="width: 25%">Name</th>
                                    <th style="width: 25%">Email</th>
                                    <th style="width: 15%">Paid Amount</th>
                                    <th style="width: 15%">Paid By</th>
                                    <th style="width: 15%">Paid on</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $x = 1; @endphp
                                @foreach($payments as $key => $payment)
                                    {{--{{dd($payment)}}--}}
                                    <tr style="border-top: 3px solid #222; background: rgba(238, 238, 238, 0.45);">
                                        @php $u = \App\User::where('id',$key)->first(); @endphp

                                        <td>{{$x}}</td>
                                        <td colspan="">
                                            Name: {{$payment->name}}
                                        </td>
                                        <td colspan="">
                                            Email : {{$payment->email}}
                                        </td>
                                        <td>
                                            LKR. {{$payment->payment}}
                                        </td>
                                        <td>
                                            {{\App\User::where('id',$payment->paid_by)->first()->name}}
                                        </td>
                                        <td>
                                            {{\Carbon\Carbon::parse($payment->created_at)->diffForHumans()}}
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
    <!-- /page content -->

@endsection


@section('extra-css')
    <style>

    </style>
@endsection

@section('extrs-js')
    <script>

        function deactivate(id) {
            $.confirm({
                title: 'Are You Sure?',
                content: 'Are you Sure Deactivate?',
                icon: 'fa fa-question-circle',
                theme: 'modern',
                closeIcon: true,
                animation: 'scale',
                type: 'orange',
                buttons: {
                    cancel: function () {
                    },
                    somethingElse: {
                        text: 'Deactive',
                        btnClass: 'btn-blue',
                        keys: ['enter', 'shift'],
                        action: function () {
                            window.location = '/admin/children/deactive/' + id;
                        }
                    }
                }
            });
        }

        function reject(id) {
            $.confirm({
                title: 'Are You Sure?',
                content: 'Are you Sure to Reject?',
                icon: 'fa fa-question-circle',
                theme: 'modern',
                closeIcon: true,
                animation: 'scale',
                type: 'orange',
                buttons: {
                    cancel: function () {
                    },
                    somethingElse: {
                        text: 'Reject',
                        btnClass: 'btn-blue',
                        keys: ['enter', 'shift'],
                        action: function () {
                            window.location = '/admin/children/reject/' + id;
                        }
                    }
                }
            });
        }

        function activate(id) {
            $.confirm({
                title: 'Are You Sure?',
                content: 'Are you Sure Activate?',
                icon: 'fa fa-question-circle',
                theme: 'modern',
                closeIcon: true,
                animation: 'scale',
                type: 'orange',
                buttons: {
                    cancel: function () {
                    },
                    somethingElse: {
                        text: 'Deactive',
                        btnClass: 'btn-blue',
                        keys: ['enter', 'shift'],
                        action: function () {
                            window.location = '/admin/children/active/' + id;
                        }
                    }
                }
            });
        }

        function delete_less(id) {
            $.confirm({
                title: 'Are You Sure?',
                content: 'Are you Sure Delete?',
                icon: 'fa fa-question-circle',
                theme: 'modern',
                closeIcon: true,
                animation: 'scale',
                type: 'orange',
                buttons: {
                    cancel: function () {
                    },
                    somethingElse: {
                        text: 'Deactive',
                        btnClass: 'btn-blue',
                        keys: ['enter', 'shift'],
                        action: function () {
                            window.location = '/admin/children/delete/' + id;
                        }
                    }
                }
            });
        }

        function view_attachment(type, id, path) {
            var file_path = path.substring(1, path.length)
            var type_name = '';
            var content = '';
            switch (type) {
                case 'img':
                    type_name = "Image";
                    content = '<img src="' + file_path + '" class ="img-responsive">';
                    break;
                case 'pdf':
                    type_name = "PDF";
                    content = '<object data="' + file_path + '" type="application/pdf" width="100%" height="100%">' +
                        '</object>';
                    break;
                case 'video':
                    type_name = "Video";
                    content = '<video width="100%" controls>' +
                        '<source src="' + file_path + '" type="video/mp4">' +
                        'Your browser does not support the video tag.' +
                        '</video>';
                    break;
                case 'audio':
                    type_name = "Audio";
                    content = '<audio width="100%" controls>' +
                        '<source src="' + file_path + '" type="audio/mpeg">' +
                        'Your browser does not support the video tag.' +
                        '</audio >';
                    break;
                default:
                    type_name = "File Download";
                    content = '<a href="' + file_path + ' "> <button class = "btn btn-info" >Download ' + type + '</button></a>';
                    break;
            }

            $('#atachment').modal('show');
            $('#atachment .modal-title').html(type_name + ' Viewer');
            $('#atachment #model_content').html(content);

        }
    </script>
@endsection