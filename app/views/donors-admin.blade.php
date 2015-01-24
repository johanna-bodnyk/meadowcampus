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

<p class='small'>Hold SHIFT to sort by multiple columns.</p>

<table class="table table-condensed table-bordered tablesorter" id="donor-table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Group</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Target</th>
        <th>Pledge</th>
        <th class="text-center">Pledge<br>Made?</th>
        <th class="date-col">Pledge Date</th>
        <th class="text-center">Okay to<br>Display?</th>
        <th>Display Name</th>
        <th class="text-center">Inaugural?</th>
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
        <td class="text-center">
            @if($donor->pledge_made_flag)
                yes
            @else
                no
            @endif
        </td>
        <td>
            @if($donor->pledge_made_flag)
                {{ date("Y-m-d",strtotime($donor->pledge_date)) }}
            @else
                &mdash;
            @endif
        </td>
        <td class="text-center">
            @if($donor->pledge_made_flag)
                @if($donor->display)
                    yes
                @else
                    no
                @endif
            @else
                &mdash;
            @endif
        </td>
        <td>{{ $donor->display_name }}</td>
        <td class="text-center">
            @if($donor->pledge_made_flag)
                @if($donor->inaugural)
                    yes
                @else
                    no
                @endif
            @else
                &mdash;
            @endif
        </td>        
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
                $("#donor-table").tablesorter( {
                    sortList:[[5,1]] // Initial sort: pledge amount, descending
                }); 
            } 
        ); 
    </script>
@stop
