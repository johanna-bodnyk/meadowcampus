@extends('_master')

@section('title')
    Add an Update
@stop

@section('head')
    <script src="/packages/ckeditor-widgetonly/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script> 
    <script> 
        $(document).ready(function() { 
            var options = {
                target: '#imageDiv',
                success: function() {
                    alert('Great!');
                } 
            }
            $('#imageform').ajaxForm(options); 
        }); 
    </script> 
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

    <div id="imageDiv">
        {{ Form::open(array('url' => 'process-addimage', 'role' => 'form', 'files' => true, 'id' => 'imageform')); }}

            <div class="form-group">
                {{ Form::label('file', 'Select an image to upload') }}
                {{ Form::file('file', null, array('class' => 'form-control')) }}        
            </div>

            {{ Form::submit('Upload', array('class' => 'btn btn-default')) }}

        {{ Form::close() }}
    </div>

@stop

@section('body')
    <script>
        CKEDITOR.replace('body');
    </script>
@stop
