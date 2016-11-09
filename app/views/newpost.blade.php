@extends('_master')

@section('title')
    Building Updates
@stop

@section('head')
@stop

@section('bodyclass')
    updates
@stop

@section('content')

        <p class="back"><a href="/updates">&lt; Back to Updates</a></p>

    @if($post_found)
        
        <h2>{{{ $post['title'] }}}</h2>

        <small class="byline">By {{ $post['author'] }} on {{ $post['date'] }} </small>

        <div>{{ $post['content'] }}</div>

    @else
        <p>Sorry, we couldn't find the the post you're looking for. Visit the main <a href="/updates">Updates</a> page to read other posts.</p>
    @endif

@stop

@section('foot')

@stop
