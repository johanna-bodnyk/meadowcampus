@extends('_master')

@section('title')
    TCS Needs Your Help!
@stop

@section('head')
    <link rel="stylesheet" href="{{ URL::asset('packages/blueimp/css/blueimp-gallery.min.css') }}">
@stop

@section('content')

    <div class="ask row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            @include('fragments.ask-dropdown')
            <h2>The Circle School needs your help</h2>
            <p class="lead">The Circle School needs <em>your</em> help to make a once-in-a-lifetime dream come true.</p>
            <p>The dream is a campus with <strong>meadow, woods, and creek</strong>&mdash;nearly <strong>8 acres and only a mile away</strong>&mdash;and a building that truly fits the school's self-directed democratic program. The property owner will <strong>donate the land</strong> as soon as the school community raises the funds to build. Check out the video below to find out more and learn how you can help, or click the <span class="next">green arrow at the right</span><span class="next-small">"Next" button at the bottom of the page</span> to explore on your own.</p>
            <div class="video-container">
                <iframe width="640" height="390" src="https://www.youtube.com/embed/vxNoFpg_J2c" frameborder="0" allowfullscreen></iframe>
            </div>
            <p class="slide-number">1 of 10</p>
        </div>
        <div class="col-sm-1" id="right-arrow"><a href="/help/2"></a></div>
    </div>
    <div class="small-ask-pager row">
        <div class="col-xs-6">
        </div>
        <div class="col-xs-6">
            <a href="/help/2" class="btn btn-sm btn-success next-btn" role="button">Next &gt;</a>
        </div>
    </div>

@stop

@section('foot')
    @include('fragments.blueimp-gallery')
@stop
