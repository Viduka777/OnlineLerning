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
                    <h3>Add Lesson</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <!-- <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                              <button class="btn btn-default" type="button">Go!</button>
                          </span>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                           <!--  <h2>Add lesson
                                <small></small>
                            </h2> -->

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content" class="col-md-4 col-sm-12 col-xs-12" style="position: relative;">
                        <!-- validate the fields -->
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


                            <form class="form-horizontal form-label-left" method="POST"
                                  action="{{ route('lesson.save') }}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <!-- <span class="section">Personal Info</span> -->

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Title <span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="name" class="form-control col-md-7 col-xs-12"
                                               data-validate-length-range="6" data-validate-words="2" name="title"
                                               required="required" type="text" value="{{ old('title') }}">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Description
                                        <span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea name="description" id="description" rows="3"
                                                  class="form-control col-md-7 col-xs-12"
                                                  required="required"></textarea>

                                    </div>
                                </div>

                                {{--<div class="item form-group">--}}
                                    {{--<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Age Group--}}
                                        {{--<span class="required">*</span>--}}
                                    {{--</label>--}}
                                    {{--<div class="col-md-4 col-sm-4 col-xs-12">--}}
                                        {{--<!-- date picker -->--}}

                                        {{--<div class="form-group">--}}
                                            {{--<select name="age" id="age" class="form-control">--}}
                                                {{--<option value="">-- Select Age Group --</option>--}}
                                                {{--@for($x = 5; $x<= 15; $x++)--}}
                                                    {{--<option value="{{$x}}">{{$x}} Years</option>--}}
                                                {{--@endfor--}}
                                            {{--</select>--}}
                                        {{--</div>--}}
                                        {{--<!-- date picker -->--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Lesson Type
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <!-- date picker -->

                                        <div class="form-group">
                                            <select name="lesson_type" id="lesson_type" class="form-control">
                                                <option value="">-- Select Lesson Type --</option>
                                                    <option value="doc">Word Document</option>
                                                    <option value="img">Image File</option>
                                                    <option value="excel">Excel Document</option>
                                                    <option value="pdf">PDF Document</option>
                                                    <option value="audio">Audio File</option>
                                                    <option value="video">Video file</option>
                                                    <option value="other">Other</option>
                                            </select>
                                        </div>
                                        <!-- date picker -->
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Lesson Category
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <!-- date picker -->

                                        <div class="form-group">
                                            <select name="lesson_category" id="lesson_category" class="form-control">
                                                <option value="">-- Select Lesson Type --</option>
                                                <option value="level_1">Level 01</option>
                                                <option value="level_2">Level 02</option>
                                                <option value="level_3">Level 03</option>
                                            </select>
                                        </div>
                                        <!-- date picker -->
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="password" class="control-label col-md-3">File<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="file" type="file" name="file" data-validate-length="6,8"
                                               class="form-control col-md-7 col-xs-12" required="required">
                                        <span class="text-danger">Max file size is 50Mb</span>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="password" class="control-label col-md-3">Price<span class="required">*</span></label>
                                    <div class=" col-md-6 col-sm-6 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">LKR.</span>
                                            <input type="number" name="price" class="form-control col-md-7 col-xs-12" required="required" value="0">
                                        </div>
                                        <span class="text-info">Price 0 = Free Course</span>

                                    </div>


                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        {{--<button type="submit" class="btn btn-primary">Cancel</button>--}}
                                        <button id="send" type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection