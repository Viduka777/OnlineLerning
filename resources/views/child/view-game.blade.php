@extends('layouts.child_layout')
@section('extra-css')
    <style>

    </style>
@endsection
@section('content')
    <!-- Start Class Details -->
    <br>
    <section class="bg--white page-class-details bg--white ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="event-content-wrapper">
                        <div class="event-section">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="class__quality__desc">
                                        <iframe src="{{$game->url}}" frameborder="0" width="100%" height="500px"></iframe>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('extra-js')
@endsection