<?php
/**
 * Created by PhpStorm.
 * User: Salinda
 * Date: 1/2/2019
 * Time: 10:25 PM
 */
?>

@extends('layouts.layout')
@section('site-title','අකුරු මිතුරු')
@section('content')

    <div class="login" style="">
        <div>
            <a class="hiddenanchor" id="signup"></a>
            <a class="hiddenanchor" id="signin"></a>

            <div class="login_wrapper">
                <div class="animate form login_form">
                    <section class="login_content">
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}
                            <h1>Register</h1>
                            <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"
                                       required autofocus placeholder="Name">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" type="email" class="form-control" name="email"
                                       value="{{ old('email') }}" required autofocus placeholder="User Name">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="password" type="password" class="form-control" name="password" required
                                       placeholder="Password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="">
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" required placeholder="Confirm Password">
                            </div>
                            <div>
                                <div class="col-md-3 text-left">
                                    <label for="" class="color-fff">User Type</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="cc-selector">
                                        <div class="col-md-6">
                                            <input id="visa" type="radio" name="user_regster_type" value="parent"
                                                   checked/>
                                            <label class="drinkcard-cc visa" for="visa"></label>
                                            <label for="visa">Perent</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input id="mastercard" type="radio" name="user_regster_type"
                                                   value="educator"/>
                                            <label class="drinkcard-cc mastercard" for="mastercard"></label>
                                            <label for="mastercard">Educator</label>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="educator-content">
                                <br>
                                <div class="col-md-3 text-left">
                                    <label for="" class="color-fff">Gender</label>
                                </div>
                                <div class="col-md-9 text-left">
                                    <input id="male" type="radio" name="gender" value="male" checked/>&nbsp;&nbsp;
                                    <label class="" for="male">Male</label>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <input id="female" type="radio" name="gender" value="male" checked/>&nbsp;&nbsp;
                                    <label class="" for="female">Female</label>
                                </div>
                            </div>
                            <div class="educator-content">
                                <textarea name="education_qualifications" id="education_qualifications"
                                          class="form-control" placeholder="Educational Qualification"></textarea>
                            </div>

                            <div>
                                <br>
                                <button type="submit" class="btn btn-default submit">
                                    Register
                                </button>

                            </div>

                            <div class="clearfix"></div>

                            <div class="separator">
                                <p class="change_link">Already have account?
                                    <a href="/login" class="to_register"> Login Here </a>
                                </p>

                                <div class="clearfix"></div>
                                <br/>

                                <div>
                                    <h1><i class="fa fa-paw"></i></h1>
                                    <p></p>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>


            </div>
        </div>
        <!-- login div close -->
    </div>

@endsection

@section('extra-css')
    <style>

    </style>
@endsection

@section('extra-js')
    <script>

    </script>
@endsection