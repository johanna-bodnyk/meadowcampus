@extends('_master')

@section('title')
    Welcome!
@stop

<!-- @section('head')
    
@stop -->

@section('bodyclass')
    index
@stop

@section('content')
    <h2>We're building a new school!</h2>
    <div class="row">
        <div class="col-md-8">
            <h3>Meadowcam</h3>
            <small style="font-style: italic">Last updated <span id="updated">GET IMAGE MODIFIED TIME</span></small>
            <img style="width:100%; margin-bottom: 10px" src="http://tunnel.boran.name/meadowcam_latest.jpeg">
            <p>About the Meadowcam: Alumnus Kyle Boran ('05) drove down to Harrisburg from Massachusetts in early September 2016 to erect a camera rig in the meadow so we can bring these images to you. Kyle's setup, over a year in the making, involves a solar-powered cell phone attached to a portable basketball hoop, pointed at the construction area and ready to capture and relay images of the entire project from start to finish. Thanks Kyle!</p>
        </div>
        <div class="col-md-4 sidebar">
            <h3>We Need Your Help!</h3>
            <p>We need YOU to be a part of making The Circle School's dream of a new campus come true...</p>
            <p><a href="/help">&raquo; Learn more</a></p>
            <p><a href="https://secure.jotform.us/form/42086602993157">&raquo; Pledge now</a></p>
            <hr>
            <div id="updates">
                <h3>Updates from the Meadow</h3>
                @foreach ($posts as $post)
                    <h4><a href="{{ $post['link']}}">{{ $post['title'] }}</a></h4>
                    <p class="date">{{ $post['date'] }}</p>
                    <p>
                        @if($post['image'])
                            <a href="{{ $post['link']}}"><img src="{{ $post['image'] }}"></a>
                        @endif
                        {{ $post['teaser'] }}...
                    </p>
                    <p class="link"><a href="{{ $post['link']}}">&raquo; Read more</a></p>
                @endforeach
                <hr>
                <p><a href="/updates">Older posts...</a></p>
            </div>
        </div>
        
    </div>

@stop

<!-- @section('foot')
    <script src="/js/live.js"></script>
@stop -->