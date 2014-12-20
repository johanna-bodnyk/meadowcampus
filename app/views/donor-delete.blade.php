@extends('_master')

@section('title')
    Deletion Confirmation
@stop

@section('content')

    <h2>Delete {{ $donor->first_name }} {{ $donor->last_name }}?</h2>

    <p class="lead">Are you sure you want to delete the donor "{{ $donor->first_name }} {{ $donor->last_name }}"? This action cannot be undone.</p>

    <div class="button-group">

        {{ Form::open(array('url' => '/donors/delete/'.$donor->id)) }}
            {{ Form::submit('Delete', array('class' => 'btn btn-danger', 'id' => 'delete-button')) }}
        {{ Form::close() }}
        
        <a href="/donors/edit/{{ $donor->id }}" class="btn btn-default" id='cancel-button' role="button">Cancel</a>


    </div>

@stop