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
                    <h3>Add General Question</h3>
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
                    <div class="x_panel">

                        <div class="x_content" class="col-md-4 col-sm-12 col-xs-12" style="position: relative;">
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
                                  action="{{ route('saveGeneralQuestion') }}" enctype="multipart/form-data">
                                {{csrf_field()}}

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Title <span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="name" class="form-control col-md-7 col-xs-12"
                                               data-validate-length-range="6" data-validate-words="2"
                                               name="question_title"
                                               required="required" type="text" value="{{ old('title') }}">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Description
                                        <span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea name="questions_description" id="description" rows="3"
                                                  class="form-control col-md-7 col-xs-12"
                                                  required="required"></textarea>

                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Answer 1<span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="" class="form-control col-md-5 col-xs-12"
                                               data-validate-length-range="6" data-validate-words="2"
                                               name="answer_1"
                                               required="required" type="text" value="{{ old('title') }}">
                                        <input type="radio" name="correct_answer" value="answer_1" checked> Correct Answer
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Answer 2 <span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="" class="form-control col-md-7 col-xs-12"
                                               data-validate-length-range="6" data-validate-words="2"
                                               name="answer_2"
                                               required="required" type="text" value="{{ old('title') }}">
                                        <input type="radio" name="correct_answer" value="answer_2"> Correct Answer

                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Answer 3 <span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="" class="form-control col-md-7 col-xs-12"
                                               data-validate-length-range="6" data-validate-words="2"
                                               name="answer_3"
                                               required="required" type="text" value="{{ old('title') }}">
                                        <input type="radio" name="correct_answer" value="answer_3"> Correct Answer

                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Answer 4 <span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="" class="form-control col-md-7 col-xs-12"
                                               data-validate-length-range="6" data-validate-words="2"
                                               name="answer_4"
                                               required="required" type="text" value="{{ old('title') }}">
                                        <input type="radio" name="correct_answer" value="answer_4"> Correct Answer

                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="password" class="control-label col-md-3">File<span></span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="file" type="file" name="file" data-validate-length="6,8"
                                               class="form-control col-md-7 col-xs-12" >
                                        <span class="text-danger">Max file size is 50Mb</span>
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