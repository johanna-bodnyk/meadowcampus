@extends('_master')

@section('title')
    Deletion Confirmation
@stop

@section('content')

    <h2>Delete this update?</h2>

    <p class="lead">Are you sure you want to delete the update "{{ $post->title }}"? This action cannot be undone.</p>

    <div class="button-group">

        {{ Form::open(array('method' => 'DELETE', 'url' => '/updates/'.$post->id)) }}
            {{ Form::submit('Delete', array('class' => 'btn btn-danger', 'id' => 'delete-button')) }}
        {{ Form::close() }}
        
        <a href="/updates/{{ $post->id }}/edit" class="btn btn-default" id='cancel-button' role="button">Cancel</a>


    </div>

@stop