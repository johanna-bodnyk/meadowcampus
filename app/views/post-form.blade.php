@extends('_master')

@section('title')
    Add an Update
@stop

@section('head')
    <script src="{{ URL::asset('packages/ckeditor-widgetonly/ckeditor.js') }}"></script>
    <script src="{{ URL::asset('packages/malsup/jquery.form.min.js') }}"></script>
    <script> 
        $(document).ready(function() { 
            var options = {
                success: function(responseText) {
                    $('#imagePreview').append('<div class="image-control"><img class="pull-left" src="/images/posts/'+responseText+'" height="75px" width="75px"><p><strong>Image path:</strong> <input type="text" value="/images/posts/'+responseText+'"></p><form method="POST" action="/image-delete" role="form" class="imageDeletionForm"><input name="filename" type="hidden" value="'+responseText+'"><input class="btn btn-danger btn-xs" type="submit" value="Delete"></form><hr class="clear-both"></div>');
                    $('.imageDeletionForm').ajaxForm(deletionOptions);
                    $('#imageInputs').append('<input type="hidden" name="images[]" value="'+responseText+'">');
                },
                clearForm: true
            }
            $('#imageform').ajaxForm(options); 

            var deletionOptions = {
                success: function(responseText, statusText, xhr, $form) {
                    $form.parent().remove();
                    $("input[value='"+responseText+"']").remove();
                }
            }
            $('.imageDeletionForm').ajaxForm(deletionOptions);
        }); 
    </script> 
@stop

@section('content')

    @if(isset($post))
        <h2>Edit "{{ $post->title }}"</h2>
        {{ Form::model($post, array('method' => 'PUT', 'url' => 'updates/'.$post->id, 'role' => 'form')) }}
    @else
        <h2>Add an Update</h2>
        {{ Form::open(array('url' => 'updates', 'role' => 'form')) }}
    @endif

            <div class="form-group">
                {{ Form::label('title', 'Title') }}
                {{ Form::text('title', null, array('class' => 'form-control')) }}        
            </div>

            <div class="form-group">
                {{ Form::label('body', 'Body') }}
                {{ Form::textarea('body', null, array('class' => 'form-control')) }}        
            </div>

            <div class="checkbox">
                <label>
                    <input name="published" type="checkbox"
                    @if(isset($post) && $post->published)
                        checked
                    @endif
                    > <strong>Published?</strong>
                </label>     
            </div>

            <div id="imageInputs"></div>

            {{ Form::submit('Save', array('class' => 'btn btn-success', 'id' => 'save-button')) }}

        {{ Form::close() }}

    <a href="/updates" class="btn btn-default" id='cancel-button' role="button">Cancel</a>

    @if(isset($post))
        <a href="/updates/confirm-delete/{{ $post->id }}" class="btn btn-danger" id='delete-button' role="button">Delete</a>
    @endif

    <h3 class="clear-both">Images</h3>

    <div id="imagePreview"> 
        @if(isset($post) && $post->images->count())
            @foreach($post->images as $image)
                <div class="image-control">
                    <img class="pull-left" src="/images/posts/{{$image->filename}}" height="75px" width="75px">
                    <p><strong>Image path:</strong> <input type="text" value="/images/posts/{{$image->filename}}"></p>
                    <form method="POST" action="/image-delete" role="form" class="imageDeletionForm">
                        <input name="filename" type="hidden" value="{{$image->filename}}">
                        <input class="btn btn-danger btn-xs" type="submit" value="Delete">
                    </form>
                    <hr class="clear-both">
                </div>

            @endforeach
        @endif
    </div>
    
    {{ Form::open(array('url' => 'image-upload', 'role' => 'form', 'files' => true, 'id' => 'imageform')); }}

        <div class="form-group">
            {{ Form::label('file', 'Select an image to upload') }}
            {{ Form::file('file', null, array('class' => 'form-control')) }}        
        </div>

        {{ Form::submit('Upload', array('class' => 'btn btn-success')) }}

    {{ Form::close() }}
   

@stop

@section('body')
    <script>
        CKEDITOR.replace('body');
    </script>
@stop
