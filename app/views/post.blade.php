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

    <p class="back"><a href="/updates">&lt; Back to Updates</a></p>
    
    <h2>{{{ $post->title }}}</h2>

    <small class="byline">Posted {{ date('F j, Y',strtotime($post->post_date)); }} by {{ $post->author }} </small>

    {{ $post->body }}

    @if(Auth::check())
        <a href="/updates/{{ $post->id }}/edit">Edit</a>
    @endif

    <hr class="clear-both">

@stop

@section('foot')
    @include('fragments.blueimp-gallery')
@stop
