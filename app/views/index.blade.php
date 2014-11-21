@extends('_master')

@section('title')
    Welcome!
@stop

@section('head')
    <style>
        @include('fragments.thermometer-head', array('percent' => $percent))
    </style>
@stop

@section('content')

    <h2><a class="no-link-style" href="/help">The Circle School needs your help!</a></h2>
    <div class="row">
        <div class="col-xs-11">
            <p class="lead">We need <em>yourss</em> help to make a once-in-a-lifetime dream come true: a campus with meadow, woods, and creek, and a brand new building&mdash;nearly 8 acres and only a mile away. <strong>Click to learn more...</strong></p>
        </div>

        <div class="col-xs-1" id="right-arrow"><a href="/help1"></a></div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <a id="therm-link" href="/help">
            @include('fragments.thermometer', array('total' => $total))
            </a>
        </div>
    </div>
    <div class="row homepage-subfeatures">
        <div class="col-md-6">
            <h3>The Circle School Needs Your Help</h3>
            <div class="row">
                <div class="col-sm-5">
                    <img class="img-responsive" src="images/rendering-2-604px.png">
                </div>
                <div class="col-sm-7 neg-left">
                    <p>We need <em>your</em> help to turn The Circle School's dream home into a reality.</p>
                    <p><a class="more-link" href="help">Learn more...</a></p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h3 class="clear-both">Updates from The Meadow</h3>
            <div class="row">
                <div class="col-sm-5">
                    <img class="img-responsive" src="images/posts/PROGRAMMING-STUDIES-4.jpg">
                </div>
                <div class="col-sm-7 neg-left">
                    <h4>The Evolution of Our Design</h4>
                    <p>Wondering how you go from an idea of a new school to making it a reality?</p>
                    <p><a class="more-link" href="updates">Read more...</a></p>
                </div>
            </div>
        </div>
    </div>

<!--     <h2><a class="no-link-style" href="/help">Join the Meadow Campus Fundraising Campaign!</a></h2>
    <div class="row">
        <div class="col-md-12">
            <a id="therm-link" href="/help">
            @include('fragments.thermometer', array('total' => $total))
            </a>
        </div>
    </div>
    <div class="row homepage-subfeatures">
        <div class="col-md-6">
            <h3>The Circle School Needs Your Help</h3>
            <div class="row">
                <div class="col-sm-5">
                    <img class="img-responsive" src="images/rendering-2-604px.png">
                </div>
                <div class="col-sm-7 neg-left">
                    <p>We need <em>your</em> help to turn The Circle School's dream home into a reality.</p>
                    <p><a class="more-link" href="help">Learn more...</a></p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h3 class="clear-both">Updates from The Meadow</h3>
            <div class="row">
                <div class="col-sm-5">
                    <img class="img-responsive" src="images/posts/PROGRAMMING-STUDIES-4.jpg">
                </div>
                <div class="col-sm-7 neg-left">
                    <h4>The Evolution of Our Design</h4>
                    <p>Wondering how you go from an idea of a new school to making it a reality?</p>
                    <p><a class="more-link" href="updates">Read more...</a></p>
                </div>
            </div>
        </div>
    </div> -->
@stop
