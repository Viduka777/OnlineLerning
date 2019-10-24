@extends('layouts.child_layout')
@section('extra-css')
    <style>
        /*.error_answer {*/
        /*cursor: not-allowed;*/
        /*opacity: 0.5;*/
        /*background: #eb6d6d;*/
        /*pointer-events: none;*/
        /*}*/

        /*.success_answer {*/
        /*cursor: not-allowed;*/
        /*opacity: 0.5;*/
        /*background: #6feb6d;*/
        /*pointer-events: none;*/
        /*}*/
        .icon_success {
            position: absolute;
            top: 0;
            right: 0px;
            padding: 10px 17px;
            font-size: 18px;
        }

        .answered {
            cursor: not-allowed;
            opacity: 0.5;
            background: #eee;
            pointer-events: none;
        }

        #continue_btn {
            display: none;
        }
    </style>
@endsection
@section('content')
    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area">
        <div class="ht__bradcaump__container">
            <img src="{{asset('')}}child/images/bg-png/6.jfif" alt="bradcaump images">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                            <h2 class="bradcaump-title">Questions</h2>
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="{{asset('')}}">Home</a>
                                <span class="brd-separetor"><img src="{{asset('')}}child/images/icons/brad.png"
                                                                 alt="separator images"></span>
                                <span class="breadcrumb-item active">Questions</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <!-- Start Class Details -->
    <section class="page-event-details bg--white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="event-content-wrapper">
                        <div class="event-section">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="junior__header__top bg-image--5 sticky__header  ">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-8 col-lg-6 col-sm-9 col-12">
                                                    <div class="jun__header__top__left">

                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-lg-6 col-sm-3 col-12">
                                                    <div class="jun__header__top__right">
                                                        {{--<span>03</span>--}}
                                                        <div class="text-right"
                                                             style=" color: #fff;font-weight: 600;font-size: 25px;">
                                                            <span id="score">Submit form to view results</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @foreach($questions as $question)
                                    <!-- Start Event -->
                                        <div class="single__event d-flex" id="question_div_{{$question->id}}">
                                            <div class="event__inner">
                                                @if($question->image)
                                                    <img src="{{asset('')}}uploads/questions/{{$question->image}}"
                                                         alt="" style="width: 50%">
                                                @endif
                                                <h6>{{$question->question_title}}</h6>
                                                <p>{{$question->questions_description}}</p>
                                                @if(!is_null($question->image))
                                                    <img src="{{asset('').ltrim($question->image, './')}}" alt="event images"
                                                         class="img-responsive">
                                                @endif

                                                <ul class="event__time__location">
                                                    <li>
                                                        <input type="radio" name="answer_{{$question->id}}"
                                                               value="answer_1" id="answer_1_{{$question->id}}"
                                                               data-question-id="{{$question->id}}"> <label
                                                                for="answer_1_{{$question->id}}"> {{$question->answer_1}}</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" name="answer_{{$question->id}}"
                                                               value="answer_2" id="answer_2_{{$question->id}}"
                                                               data-question-id="{{$question->id}}"> <label
                                                                for="answer_2_{{$question->id}}"> {{$question->answer_2}}</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" name="answer_{{$question->id}}"
                                                               value="answer_3" id="answer_3_{{$question->id}}"
                                                               data-question-id="{{$question->id}}"> <label
                                                                for="answer_3_{{$question->id}}"> {{$question->answer_3}}</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" name="answer_{{$question->id}}"
                                                               value="answer_4" id="answer_4_{{$question->id}}"
                                                               data-question-id="{{$question->id}}"> <label
                                                                for="answer_4_{{$question->id}}"> {{$question->answer_4}}</label>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div id="icon_{{$question->id}}" class="icon_success">

                                            </div>
                                        </div>
                                        <!-- End Event -->
                                    @endforeach

                                </div>
                                <div class="col-md-12">
                                    <br>
                                    <a href="/home" id="continue_btn">
                                        <button class="btn btn-info pull-right btn-lg">Continue</button>
                                    </a>
                                    <button class="btn btn-success pull-right btn-lg" id="submit_btn">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <input type="hidden" id="score_in" value="0">
    <input type="hidden" id="number_of_que" value="0">
    <!-- End Class Details -->




@endsection
@section('extra-js')
    <script>
        var que_nos = {{count($questions)}};
        var number_of_que = 0;
        var score = 0;
        var user_id = {{\Illuminate\Support\Facades\Auth::user()->id}}
    </script>

    @foreach($questions as $question)
        <script>
            $('input[name=answer_{{$question->id}}]').click(function () {
                var question_id = $(this).attr('data-question-id');
                var answer = $(this).val();

                $.ajax({
                    url: "/child/question/answer/check",
                    type: 'POST',
                    data: {'question_id': question_id, 'answer': answer},
                    success: function (res) {
                        $('#score').html('Submit form to view results');
                        if (res == 1) {
                            score = score + 1;
                        }
                        $('#question_div_{{$question->id}}').addClass("answered");
                        $('#icon_{{$question->id}}').html('<p>Answered</p>');

                        number_of_que = number_of_que + 1;
                        $('#number_of_que').val(number_of_que);
                        $('#score_in').val(score);

                    }
                });
            });
        </script>
    @endforeach

    <script>
        $('#submit_btn').click(function () {
            var number_of_que = $('#number_of_que').val();
            var score_final = $('#score_in').val();

            if (number_of_que > 0) {
                if (que_nos == number_of_que) {
                    $.ajax({
                        url: "/child/question/answer/save",
                        type: 'POST',
                        data: {'score_final': score_final, 'user_id': user_id},
                        success: function (res) {
                            if (res == 'success') {
                                var level = 1;
                                if(score_final >14){
                                    level = 3
                                }else if(score_final >6){
                                    level =2
                                }
                                $('#score').html('Your Score ' + score_final);
                                $('#submit_btn').hide();
                                $('#continue_btn').show();
                                $.confirm({
                                    icon: 'ion-checkmark-circled',
                                    title: 'Level '+ level,
                                    content: 'Your level is '+level+' accroding to the score',
                                    theme: 'modern',
                                    closeIcon: true,
                                    animation: 'scale',
                                    type: 'green',
                                    buttons: {
                                        cancel: {
                                            text: 'Continue',
                                            btnClass: 'btn-success',
                                            action:function () {
                                                window.location = '/home';
                                            }

                                        }
                                    }
                                });
                            } else {
                                $.confirm({
                                    icon: 'ion-ios-minus-outline',
                                    title: 'Error',
                                    content: 'Results not saved. Please try again.',
                                    theme: 'modern',
                                    closeIcon: true,
                                    animation: 'scale',
                                    type: 'red',
                                    buttons: {
                                        cancel: {
                                            text: 'Ok',
                                            btnClass: 'btn-danger',

                                        }
                                    }
                                });
                            }
                        }
                    });
                } else {
                    $.confirm({
                        icon: 'ion-ios-minus-outline',
                        title: 'Error',
                        content: 'Please answer all the questions to continue.',
                        theme: 'modern',
                        closeIcon: true,
                        animation: 'scale',
                        type: 'red',
                        buttons: {
                            cancel: {
                                text: 'Ok',
                                btnClass: 'btn-danger',

                            }
                        }
                    });
                }

            } else {
                $.confirm({
                    icon: 'ion-minus-circled',
                    title: 'Error',
                    content: 'Please answer the questions to continue.',
                    theme: 'modern',
                    closeIcon: true,
                    animation: 'scale',
                    type: 'red',
                    buttons: {
                        cancel: {
                            text: 'Ok',
                            btnClass: 'btn-danger',

                        }
                    }
                });
            }


        });
    </script>
@endsection
