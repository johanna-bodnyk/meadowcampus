@extends('_master')

@section('title')
    Building Updates
@stop

@section('bodyclass')
    updates
@stop

@section('content')
    
    <h2>Updates from the Meadow</h2>

    <h3><a href="/updates/{{ $post->id }}">{{{ $post->title }}}</a></h3>
    <small class="byline">Posted {{ date('F j, Y',strtotime($post->post_date)); }} by {{ $post->author }} </small>
    {{ $post->body }}

    @if(Auth::check())
        <a href="/updates/{{ $post->id }}/edit">Edit</a>
    @endif

    <hr class="clear-both">

@stop
