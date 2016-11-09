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

    <div class="row">
        <div class="col-sm-3 col-sm-push-9 archive-menu">
            <h3>Archive</h3>
            <ul>
            @foreach ($posts as $post)
                <li><a href="{{$post['link']}}">{{ $post['date'] }} &mdash; {{ $post['title'] }} </a></li>
            @endforeach
            </ul>
        </div>

        <div class="col-sm-9 col-sm-pull-3">       
            @for ($i = 0; $i < $limit; $i++)
                <h3>{{ $posts[$i]['title'] }}</h3>
                <small class="byline">By {{ $posts[$i]['author'] }} on {{ $posts[$i]['date'] }} </small>
                <div>{{ $posts[$i]['content'] }}</div>
                @if ($i+1 < $limit)
                    <hr class="clear-both">
                @endif
            @endfor
        </div>
    </div>

@stop

@section('foot')
    @include('fragments.blueimp-gallery-2')
@stop