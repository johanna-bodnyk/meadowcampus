@extends('_master')

@section('title')
    Donors
@stop

@section('content')

    <h2>Thank You to Our Donors!</h2>

    <p class="lead">So far, <span class="callout-number">{{ $total['count'] }}</span> generous donors have made pledges totaling <span class="callout-number">${{ $total['amount'] }}</span> (that's <span class="callout-number">${{ $total['monthly']}} </span> per month)!</p>
    


    <div class="row donor-lists">
        <div class="col-sm-4">
            <h3>Current Families</h3>
            <ul>
                @foreach($groups['Current Families'] as $donor)
                    <li>{{ $donor->first_name }} {{ $donor->last_name }}</li>
                @endforeach
            </ul>
            <h3>Staff</h3>
            <ul>
                @foreach($groups['Staff'] as $donor)
                    <li>{{ $donor->first_name }} {{ $donor->last_name }}</li>
                @endforeach
            </ul>           
        </div>
        <div class="col-sm-4">
            <h3>Alumni</h3>
            <ul>
                @foreach($groups['Alumni'] as $donor)
                    <li>{{ $donor->first_name }} {{ $donor->last_name }}</li>
                @endforeach
            </ul>
        </div>
        <div class="col-sm-4">
            <h3>Alumni Families</h3>
            <ul>
                @foreach($groups['Alumni Families'] as $donor)
                    <li>{{ $donor->first_name }} {{ $donor->last_name }}</li>
                @endforeach
            </ul>
            <h3>Other Friends</h3>
            <ul>
                @foreach($groups['Friends'] as $donor)
                    <li>{{ $donor->first_name }} {{ $donor->last_name }}</li>
                @endforeach
            </ul>
        </div>

    </div>
@stop

