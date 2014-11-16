@extends('_master')

@section('title')
    Donors
@stop

@section('content')

<h2>Donors</h2>

<table class="table table-condensed table-bordered" id="donor-table">
    <tr>
        <th>ID</th>
        <th>Group</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Target</th>
        <th>Pledge</th>
        <th>Pledge Made?</th>
        <th class="date-col">Pledge Date</th>
        <th>Display Permission</th>
        <th>Edit</th>
    </tr>
    @foreach($donors as $donor)
    <tr>
        <td>{{ $donor->id }}</td>
        <td>{{ $donor->donor_group }}</td>
        <td>{{ $donor->first_name }}</td>
        <td>{{ $donor->last_name }}</td>
        <td>${{ number_format($donor->target_donation) }}</td>
        <td>${{ number_format($donor->pledge_amount) }}</td>
        <td>{{ $donor->pledge_made_flag }}</td>
        <td>@if($donor->pledge_made_flag){{ date("Y-m-d",strtotime($donor->pledge_date)) }}@endif</td>
        <td>@if($donor->pledge_made_flag){{ $donor->display }}@endif</td>
        <td><a href="donor-admin/edit/{{$donor->id}}">Edit</a>
    </tr>
    @endforeach
</table>
@stop

