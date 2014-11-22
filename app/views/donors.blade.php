@extends('_master')

@section('title')
    Donors
@stop

@section('head')
    <style>
        @include('fragments.thermometer-head', array('percent' => $percent))
    </style>
@stop

@section('bodyclass')
    donors
@stop

@section('content')

    <h2>Campaign Progress</h2>

    <p class="lead">So far, <span class="callout-number">{{ $total['count'] }}</span> generous donors have made pledges totaling <span class="callout-number">${{ $total['amount'] }}</span> (that's <span class="callout-number">${{ $total['monthly']}} </span> per month)!</p>
    
    @include('fragments.thermometer', array('total' => $total['amount']))

    <h3>Thank You to Our Donors!</h3>
    <div class="row donor-lists">
        <div class="col-sm-4">
            <h4>Current Families</h4>
            <ul>
                @foreach($groups['Current Families'] as $donor)
                    @if($donor->display)
                        <li>{{ $donor->first_name }} {{ $donor->last_name }}</li>
                    @endif
                @endforeach
            </ul>
            <h4>Staff</h4>
            <ul>
                @foreach($groups['Staff'] as $donor)
                    @if($donor->display)
                        <li>{{ $donor->first_name }} {{ $donor->last_name }}</li>
                    @endif
                @endforeach
            </ul>           
        </div>
        <div class="col-sm-4">
            <h4>Alumni</h4>
            <ul>
                @foreach($groups['Alumni'] as $donor)
                    @if($donor->display)
                        <li>{{ $donor->first_name }} {{ $donor->last_name }}</li>
                    @endif
                @endforeach
            </ul>
        </div>
        <div class="col-sm-4">
            <h4>Alumni Families</h4>
            <ul>
                @foreach($groups['Alumni Families'] as $donor)
                    @if($donor->display)
                        <li>{{ $donor->first_name }} {{ $donor->last_name }}</li>
                    @endif
                @endforeach
            </ul>
            <h4>Other Friends</h4>
            <ul>
                @foreach($groups['Friends'] as $donor)
                    @if($donor->display)
                        <li>{{ $donor->first_name }} {{ $donor->last_name }}</li>
                    @endif
                @endforeach
            </ul>
        </div>

    </div>
    <p class="small"><em>We hope you'll let us share your name on this list, but if you prefer your pledge be anonymous, just let us know!</em></p>
@stop

