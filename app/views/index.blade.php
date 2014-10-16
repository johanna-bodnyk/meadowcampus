@extends('_master')

@section('title')
    Welcome!
@stop

@section('content')
    <h2>Welcome! <small>This is the online home of The Circle School's Meadow Campus Fundraising Campaign!</small></h2>

    <div class="row">
        <div class="col-md-6">
            <h2>Our Progress So Far</h2>
            <img src="images/thermometer-placeholder.jpg" class="pull-left">
        </div>
        <div class="col-md-6">
            <h2>Join the Campaign</h2>
            <br>
            <a class="btn btn-lg btn-success" href="pledge" role="button">Pledge Now!</a>
            <a class="btn btn-lg btn-default" href="scenarios" role="button">Learn More</a>
        </div>
    </div>
@stop
