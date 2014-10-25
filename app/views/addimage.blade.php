@extends('_master')

@section('title')
    Add an Image
@stop


@section('content')

    <h2>Add an Image</h2>

    {{ Form::open(array('url' => 'process-addimage', 'role' => 'form', 'files' => true)); }}

        <div class="form-group">
            {{ Form::label('file', 'Select an image to upload') }}
            {{ Form::file('file', null, array('class' => 'form-control')) }}        
        </div>

        {{ Form::submit('Submit', array('class' => 'btn btn-default')) }}

    {{ Form::close() }}

@stop
