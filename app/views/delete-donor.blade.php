@extends('_master')

@section('title')
    Add a Donor
@stop

@section('content')

    {{ Form::model($donor, array('url' => 'donors/delete', 'role' => 'form')) }}
        
        <p>Are you sure you want to delete {{ $donor->first_name }} {{ $donor->last_name }}?</p>
        {{ Form::hidden('id') }}

        {{ Form::submit('Delete', array('class' => 'btn btn-default')) }}
        <a href='/donors'>Cancel</a>

    {{ Form::close() }}


@stop
