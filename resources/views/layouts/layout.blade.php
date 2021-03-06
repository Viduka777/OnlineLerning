<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('site-title')</title>
    <!-- Styles -->
    <link href="{{ asset('assets/app.css') }}" rel="stylesheet">
    <link href="{{asset('')}}assets/custom.css" rel="stylesheet">
    @yield('extra-css')
</head>
<body>
<div id="app">
    {{--<nav class="navbar navbar-default navbar-static-top">--}}
    {{--<div class="container">--}}
    {{--<div class="navbar-header">--}}

    {{--<!-- Collapsed Hamburger -->--}}
    {{--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">--}}
    {{--<span class="sr-only">Toggle Navigation</span>--}}
    {{--<span class="icon-bar"></span>--}}
    {{--<span class="icon-bar"></span>--}}
    {{--<span class="icon-bar"></span>--}}
    {{--</button>--}}

    {{--<!-- Branding Image -->--}}
    {{--<a class="navbar-brand" href="{{ url('/') }}">--}}
    {{--{{ config('app.name', 'Laravel') }}--}}
    {{--</a>--}}
    {{--</div>--}}

    {{--<div class="collapse navbar-collapse" id="app-navbar-collapse">--}}
    {{--<!-- Left Side Of Navbar -->--}}
    {{--<ul class="nav navbar-nav">--}}
    {{--&nbsp;--}}
    {{--</ul>--}}

    {{--<!-- Right Side Of Navbar -->--}}
    {{--<ul class="nav navbar-nav navbar-right">--}}
    {{--<!-- Authentication Links -->--}}
    {{--@guest--}}
    {{--<li><a href="{{ route('login') }}">Login</a></li>--}}
    {{--<li><a href="{{ route('register') }}">Register</a></li>--}}
    {{--@else--}}
    {{--<li class="dropdown">--}}
    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>--}}
    {{--{{ Auth::user()->name }} <span class="caret"></span>--}}
    {{--</a>--}}

    {{--<ul class="dropdown-menu">--}}
    {{--<li>--}}
    {{--<a href="{{ route('logout') }}"--}}
    {{--onclick="event.preventDefault();--}}
    {{--document.getElementById('logout-form').submit();">--}}
    {{--Logout--}}
    {{--</a>--}}

    {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
    {{--{{ csrf_field() }}--}}
    {{--</form>--}}
    {{--</li>--}}
    {{--</ul>--}}
    {{--</li>--}}
    {{--@endguest--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</nav>--}}

    @yield('content')
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
<script src="{{ asset('js/app.js') }}"></script>
@yield('extra-js')
</body>
</html>
