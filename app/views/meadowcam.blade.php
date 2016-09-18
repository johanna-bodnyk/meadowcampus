@extends('_master')

@section('title')
    Live Meadowcam &amp; Video Archive
@stop

@section('head')
    <link rel="stylesheet" href="{{ URL::asset('packages/blueimp/css/blueimp-gallery.min.css') }}">
@stop

@section('bodyclass')
    meadowcam
@stop

@section('content')
    <div class="row">
        <h2>Live Meadowcam &amp; Video Archive</h2>
        <div class="col-sm-8">
            <h3>Meadowcam</h3>
            <small style="font-style: italic">Last updated <span id="updated">GET IMAGE MODIFIED TIME</span></small>
            <img style="width:100%" src="{{$latest}}">
            <h3>Timelapse Video</h3>
            <video style="width:100%" controls>
                <source src="{{$video}}" type="video/mp4">
                Your browser does not support HTML5 video. Sorry :(
            </video>
        </div>
        <div class="col-sm-4 gallery">
            <h3>Gallery</h3>
            <small>Click any thumbnail to enlarge.</small>
            <div id="links">
                @foreach ($gallery as $image)
                    <a href="{{$image['image']}}" title="{{$image['title']}}" data-gallery>
                        <img src="{{$image['thumbnail']}}">
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@stop

@section('foot')
    @include('fragments.blueimp-gallery')
@stop