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
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <h1>Login</h1>
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
                                <input id="password" type="password" class="form-control" name="password" required placeholder="Password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div>
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"
                                                   name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-default submit">
                                    Login
                                </button>
                                <a class="reset_pass" href="{{ route('password.request') }}">
                                    Lost Your Password?
                                </a>
                            </div>

                            <div class="clearfix"></div>

                            <div class="separator">
                                <p class="change_link">New to site?
                                    <a href="/register" class="to_register"> Create Account </a>
                                </p>

                                <div class="clearfix"></div>
                                <br />

                                <div>
                                    <h1><i class="fa fa-paw"></i> </h1>
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