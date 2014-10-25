@extends('_master')

@section('title')
    Editing an Update
@stop

@section('head')
    <script src="/packages/ckeditor-widgetonly/ckeditor.js"></script>
@stop

@section('content')

    {{ Form::model($post, array('method' => 'PUT', 'url' => 'updates/'.$post->id, 'role' => 'form')) }}
        
        <div class="form-group">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', null, array('class' => 'form-control')) }}          
        </div>

        <div class="form-group">
            {{ Form::label('body', 'Body') }}
            {{ Form::textarea('body', null, array('class' => 'form-control')) }}        
        </div>

        {{ Form::submit('Save', array('class' => 'btn btn-default')) }}

    {{ Form::close() }}

    {{ Form::open(['method' => 'DELETE', 'url' => 'updates/'.$post->id]) }}
    <a href='javascript:void(0)' onClick='parentNode.submit();return false;'>Delete</a>
    {{ Form::close() }}

    <script>
        CKEDITOR.replace('body');
    </script>

@stop
