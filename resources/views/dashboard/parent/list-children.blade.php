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
                    <h3>Child Accounts</h3>
                </div>

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
                            <div class="alert alert-info">
                                <ul>
                                   <li>Level 01 => Marks 0 - Marks 06</li>
                                   <li>Level 02 => Marks 07 - Marks 14</li>
                                   <li>Level 03 => Marks 15 - Marks 20</li>
                                </ul>
                            </div>
                        </div>
                        <div class="x_content" class="col-md-4 col-sm-12 col-xs-12" style="position: relative;">
                            <table class="table table-striped projects">
                                <thead>
                                <tr>
                                    <th style="width: 1%">#</th>
                                    <th style="width: 20%">Child Name</th>
                                    {{--<th>Team Members</th>--}}
                                    <th>Level</th>
                                    <th style="width: 10%">Quiz Completed</th>
                                    <th style="width: 10%">Status</th>
                                    {{--<th style="width: 20%">#Edit</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @php $x=1 @endphp
                                @foreach($children as $child)
                                    <tr>
                                        <td>{{$x}}</td>
                                        <td>
                                            <a>{{$child->name}}</a>
                                            <br>
                                            <small>Date of Birth
                                                <b>{{\Carbon\Carbon::parse($child->dob)->format('Y-M-d')}}</b></small>
                                        </td>

                                        @php
                                            if($child->level == 1){
                                                $width = 'style="width: 33.3%;"';
                                                $pre = 33.3;
                                            }elseif($child->level == 2){
                                                $width = 'style="width: 66.6%;"';
                                                $pre = 66.6;
                                            }elseif ($child->level == 3){
                                                $width = 'style="width: 100%;"';
                                                $pre = 100;
                                            }else{
                                                $width = 'style="width: 0%;"';
                                                $pre = 0;
                                            }

                                        @endphp
                                        <td class="project_progress">
                                            <div class="progress progress_sm">
                                                <div class="progress-bar bg-green" role="progressbar"
                                                     data-transitiongoal="{{$pre}}" aria-valuenow="56"
                                                        {{$width}}></div>
                                            </div>
                                            <small>{{$child->level . ' Level'}}</small>
                                        </td>
                                        <td>
                                            @if($child->is_completed)
                                                <button type="button" class="btn btn-info btn-xs">Completed</button>
                                            @else
                                                <button type="button" class="btn btn-warning btn-xs">Not Completed
                                                </button>
                                            @endif
                                        </td>
                                        <td>
                                            @if($child->status)
                                                <button type="button" class="btn btn-success btn-xs">Active</button>
                                            @else
                                                <button type="button" class="btn btn-danger btn-xs">Deactivated</button>
                                            @endif
                                        </td>

                                        {{--<td>--}}
                                            {{--<a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View--}}
                                            {{--</a>--}}
                                            {{--<a href="#" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit--}}
                                            {{--</a>--}}
                                            {{--<a href="#" class="btn btn-danger btn-xs"--}}
                                               {{--onclick="delete_child({{$child->id}})"><i class="fa fa-trash-o"></i>--}}
                                                {{--Delete </a>--}}
                                        {{--</td>--}}
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

@endsection

@section('extrs-js')
    <script>
        function delete_child(id) {
            var x = confirm("Are you sure want to delete?");

            if (x){
                window.location = '/child/delete/'+id;
            }
        }
    </script>
@endsection