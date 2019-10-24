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
                    <h3>General Question</h3>
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
                                    <th style="width: 15%">Image</th>
                                    <th style="width: 15%">Question Title</th>
                                    <th style="width: 15%;">Question Description</th>
                                    <th style="width: 10%">Answer 01</th>
                                    <th style="width: 10%">Answer 02</th>
                                    <th style="width: 10%">Answer 03</th>
                                    <th style="width: 10%">Answer 04</th>
                                    <th style="width: 10%">Correct Answer</th>
                                    <th style="width: 20%">Status</th>
                                    <th style="width: 20%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $x = 1; @endphp
                                @foreach($ques as $que)
                                    {{--{{dd($lesson)}}--}}
                                    <tr>
                                        <td>{{$x}}</td>
                                        <td><img src="{{asset('')}}uploads/questions/{{$que->image}}" alt="" width="100px;"></td>
                                        <td>{{$que->question_title}}</td>
                                        <td>{{$que->questions_description}}</td>
                                        <td>{{$que->answer_1}}</td>
                                        <td>{{$que->answer_2}}</td>
                                        <td>{{$que->answer_3}}</td>
                                        <td>{{$que->answer_4}}</td>
                                        <td>{{$que->correct_answer}}</td>
                                        <td>
                                            @if($que->status)
                                                <button type="button" class="btn btn-success btn-xs" onclick="activate({{$que->id}})">Active</button>
                                            @else
                                                <button type="button" class="btn btn-danger btn-xs" onclick="deactivate({{$que->id}})">Deactivated</button>
                                            @endif
                                        </td>
                                        <td>
                                            @if($que->status)
                                                <button type="button" class="btn btn-warning btn-xs" onclick="deactivate({{$que->id}})">Deactivate</button>
                                            @else
                                                <button type="button" class="btn btn-success btn-xs" onclick="activate({{$que->id}})">Activate</button>
                                            @endif

                                            <a href="#" class="btn btn-danger btn-xs"
                                               onclick="delete_less({{$que->id}})"><i class="fa fa-trash-o"></i>
                                                Delete </a>
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
                        action: function(){
                            window.location = '/admin/question/general/deactive/'+id;
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
                        text: 'Active',
                        btnClass: 'btn-blue',
                        keys: ['enter', 'shift'],
                        action: function(){
                            window.location = '/admin/question/general/active/'+id;
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
                        text: 'Delete',
                        btnClass: 'btn-blue',
                        keys: ['enter', 'shift'],
                        action: function(){
                            window.location = '/admin/question/general/delete/'+id;
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