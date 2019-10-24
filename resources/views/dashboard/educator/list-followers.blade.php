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
                    <h3>My Lessons</h3>
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
                        <div class="x_title">
                            <h2>My Lessons
                            </h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content" class="col-md-4 col-sm-12 col-xs-12" style="position: relative;">
                            <table class="table table-striped projects">
                                <thead>
                                <tr>
                                    <th style="width: 1%">#</th>
                                    <th style="width: 15%">Lesson Title</th>
                                    <th style="width: 15%;">Lesson Description</th>
                                    {{--<th style="width: 10%">Age Group</th>--}}
                                    <th style="width: 10%">Type</th>
                                    <th style="width: 10%">Category</th>
                                    <th style="width: 10%">User Name</th>
                                    <th style="width: 10%">User Level</th>
                                    <th style="width: 20%">Views</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $x = 1; @endphp
                                @foreach($lessons as $lesson)
                                    {{--{{dd($lesson)}}--}}
                                    <tr>
                                        <td>{{$x}}</td>
                                        <td>{{$lesson->title}}</td>
                                        <td>{{$lesson->description}}</td>
                                        {{--<td>{{$lesson->age}} Years</td>--}}
                                        <td>{{$lesson->lesson_type}}</td>
                                        <td>{{ucwords(str_replace("_"," ", $lesson->lesson_category))}}</td>
                                        <td>{{$lesson->name}}</td>
                                        <td>Level {{$lesson->level}}</td>
                                        <td>{{$lesson->views}}</td>
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


    <!-- Modal -->
    <div id="atachment" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <div id="model_content"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    {{--end modal--}}
@endsection


@section('extra-css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
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
                        action: function(){
                            window.location = '/educator/lesson/deactivate/'+id;
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
                        action: function(){
                            window.location = '/educator/lesson/activate/'+id;
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
                        action: function(){
                            window.location = '/educator/lesson/delete/'+id;
                        }
                    }
                }
            });
        }
        function view_attachment(type,id,path) {
            var file_path = path.substring(1, path.length)
            var type_name = '';
            var content = '';
            switch (type){
                case 'img':
                    type_name = "Image";
                    content = '<img src="'+file_path+'" class ="img-responsive">';
                    break;
                case 'pdf':
                    type_name = "PDF";
                    content = '<object data="'+file_path+'" type="application/pdf" width="100%" height="100%">'+
                        '</object>';
                    break;
                case 'video':
                    type_name = "Video";
                    content ='<video width="100%" controls>'+
                                '<source src="'+file_path+'" type="video/mp4">'+
                                'Your browser does not support the video tag.'+
                                '</video>';
                    break;
                case 'audio':
                    type_name = "Audio";
                    content ='<audio width="100%" controls>'+
                        '<source src="'+file_path+'" type="audio/mpeg">'+
                        'Your browser does not support the video tag.'+
                        '</audio >';
                    break;
                default:
                    type_name = "File Download";
                    content = '<a href="'+file_path+' "> <button class = "btn btn-info" >Download '+type+'</button></a>';
                    break;
            }

            $('#atachment').modal('show');
            $('#atachment .modal-title').html(type_name+' Viewer');
            $('#atachment #model_content').html(content);

        }
    </script>
@endsection