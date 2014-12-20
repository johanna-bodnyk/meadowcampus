@extends('_master')

@section('title')
    Donors
@stop

@section('head')
        <script type="text/javascript" src="{{ URL::asset('packages/tablesorter/jquery.tablesorter.min.js') }}"></script>
@stop

@section('content')

<a href="/donors/add" class="btn btn-success btn-sm" role="button" id="new-donor">Add a Donor</a>

<h2>Donors</h2>

<table class="table table-condensed table-bordered tablesorter" id="donor-table">
    <thead>
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
    </thead>
    <tbody>
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
        <td><a href="/donors/edit/{{$donor->id}}">Edit</a>
    </tr>
    @endforeach
    </tbody>
</table>
@stop

@section('foot')
    <!--http://tablesorter.com/-->
    <script type="text/javascript">
        $(document).ready(function() 
            { 
                $("#donor-table").tablesorter(); 
            } 
        ); 
    </script>
@stop
