@extends('_master')

@section('title')
    Add an Update
@stop

@section('head')
    <script src="/packages/ckeditor/ckeditor.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script> 
    <script src="http://malsup.github.com/jquery.form.js"></script> 
@stop

@section('content')

    <h2>Add an Update</h2>

    {{ Form::open(array('url' => 'updates', 'role' => 'form')) }}

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

    <h3>Add an Image</h3>

    {{ Form::open(array('url' => 'process-addimage', 'role' => 'form', 'files' => true, 'id' => 'imageform')); }}

        <div class="form-group">
            {{ Form::label('file', 'Select an image to upload') }}
            {{ Form::file('file', null, array('class' => 'form-control')) }}        
        </div>

        {{ Form::submit('Upload', array('class' => 'btn btn-default')) }}

    {{ Form::close() }}

    <script>
        CKEDITOR.replace('body');

        // Malsup jQuery Form Plugin http://malsup.com/jquery/form/
        $(document).ready(function() { 
            // bind 'myForm' and provide a simple callback function 
            $('#imageform').ajaxForm(function() { 
                alert("Your image has been uploaded!"); 
            }); 
        }); 

    </script> 
@stop
