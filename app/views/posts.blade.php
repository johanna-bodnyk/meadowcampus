@extends('_master')

@section('title')
    Building Updates
@stop

@section('head')
    <link rel="stylesheet" href="{{ URL::asset('packages/blueimp/css/blueimp-gallery.min.css') }}">
@stop

@section('bodyclass')
    updates
@stop

@section('content')
    
    <h2>Updates from the Meadow</h2>

    @foreach ($posts as $post)

        <h3><a href="/updates/{{ $post->id }}">
            {{ $post->title }} 
            @if($post->published == false) [UNPUBLISHED] @endif 
        </a></h3>
        <small class="byline">Posted {{ date('F j, Y',strtotime($post->post_date)); }} by {{ $post->author }} </small>
        {{ $post->body }}

        @if(Auth::check())
            <a href="/updates/{{ $post->id }}/edit">Edit</a>
        @endif

        <hr class="clear-both">
    @endforeach

    @if(Auth::check())
        <a class="btn btn-success" href="/updates/create" role="button">Add a new update</a>
    @endif

@stop

@section('foot')
    @include('fragments.blueimp-gallery')
@stop