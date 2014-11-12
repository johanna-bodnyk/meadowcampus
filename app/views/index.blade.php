@extends('_master')

@section('title')
    Welcome!
@stop

@section('content')
    <h2>Fundraising Campaign Progress</h2>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div id="therm-img">
                <img src="images/thermometer-mockup-imgonly.png">
            </div>
            <div id="therm">
                <div id="therm-fill"></div>
                <div id="therm-values">
                    <span id="start-value">$0</span>
                    <span id="end-value">$750,000</span>
                    <span id="current-value">$176,156</span>
                </div>
            </div>
        </div>
        <br>
        <div class="col-md-6">
            <h3>Let's Build a School!</h3>
            <p>We need <em>your</em> help to turn The Circle School's dream home into a reality.</p>
            <p><a href="build">How can I help?</a></p>
        </div>
        <div class="col-md-6">
            <h3>Updates from The Meadow</h3>
            <h4>The Evolution of Our Design</h4>
            <p><img class="pull-left" style="margin-right:15px"width="150px" src="images/posts/PROGRAMMING-STUDIES-4.jpg">Wondering how you go from an idea of a new school to making it a reality?  Here's everything you ever wanted to know about our design process.</p>
            <p><a href="updates">Read more...</a></p>
        </div>
    </div>
@stop
