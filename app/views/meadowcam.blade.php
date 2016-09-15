@extends('_master')

@section('title')
    Live Feed &amp; Video Archive
@stop

<!-- @section('head')
    
@stop -->

@section('body-class')
    live
@stop

@section('content')
        <h2>Live Meadowcam &amp; Video Archive</h2>
        <h3>Meadowcam</h3>
        <small style="font-style: italic">Last updated <span id="updated">GET IMAGE MODIFIED TIME</span></small>
        <img style="width:100%" src="http://tunnel.boran.name/meadowcam_latest.jpeg">
        <h3>Timelapse Video</h3>
        <video style="width:100%" controls>
            <source src="http://tunnel.boran.name/testtimelapse.mp4" type="video/mp4">
            Your browser does not support HTML5 video. Sorry :(
        </video>

@stop

<!-- @section('foot')
    <script src="/js/live.js"></script>
@stop -->