@extends('_master')

@section('title')
    TCS Needs Your Help!
@stop

@section('content')

    <div class="ask row">
        <div class="col-xs-1" id="left-arrow"><a href="/help/1"></a></div>
        <div class="col-xs-10">
            @include('fragments.ask-dropdown')
            <h2>Why build a school?</h2>
            <p class="lead"><img src="/images/help/circle-school-front-400px.jpg" class="pull-left img-responsive">We love our "cottage" at 210 Oakleigh Avenue, where we've been nestled for 21 of our 30 years, with its 5,000 square feet of student space and 1.5 acres of yard.</p>

            <p>But especially <strong>after tripling enrollment</strong> in the last 15 years, we have longed for more woods and a creek and a room large enough for potluck suppers. <strong>So, years ago, we started a search...</strong></p>
        </div>
        <div class="col-xs-1" id="right-arrow"><a href="/help/3"></a></div>
    </div>


@stop
