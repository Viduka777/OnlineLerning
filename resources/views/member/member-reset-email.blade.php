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
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="token" value="{{ $token }}">

                            <h1>Reset Password</h1>
                            <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div>
                                <button type="submit" class="btn btn-default submit">
                                    Reset Password
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

@endsection

@section('extra-js')

@endsection