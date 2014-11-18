@extends('_master')

@section('title')
    Building Updates
@stop

@section('body-class')
    updates
@stop

@section('content')
    
    <h2>Updates from the Meadow</h2>

    <h3><a href="/updates/{{ $post->id }}">{{ $post->title }}</a></h3>
    <small>Posted {{ date('F j, Y',strtotime($post->created_at)); }} by {{ $post->user->first_name }} {{ $post->user->last_name }} </small>
    {{ $post->body }}

    @if(Auth::check())
        <a href="/updates/{{ $post->id }}/edit">Edit</a>
    @endif

    <hr class="clear-both">

@stop
