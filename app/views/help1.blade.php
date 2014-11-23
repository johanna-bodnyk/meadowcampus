@extends('_master')

@section('title')
    TCS Needs Your Help!
@stop

@section('head')
    <link rel="stylesheet" href="{{ URL::asset('packages/blueimp/css/blueimp-gallery.min.css') }}">
@stop

@section('content')

    <div class="ask row">
        <div class="col-xs-1"></div>
        <div class="col-xs-10">
            @include('fragments.ask-dropdown')
            <h2>The Circle School needs your help</h2>
            <p class="lead">The Circle School needs <em>your</em> help to make a once-in-a-lifetime dream come true.</p>
            <div id="links">
                    <a href="/images/help/rendering-2.png" title='Schematic design rendering &mdash; "View at Front Entry" &mdash; 10/17/2014' data-gallery>
                        <figure class="image pull-right">
                            <img class="img-responsive" src="/images/help/rendering-2-500px.png" alt="Design Rendering">
                            <figcaption>Click to enlarge and view additional rendering.</figcaption>
                        </figure>
                    </a>

                <a href="/images/help/rendering-1.png" title='Schematic design rendering &mdash; "Front Elevation" &mdash; 10/17/2014' data-gallery class="hide">
                </a>
            </div>
            <p>The dream is a campus with <strong>meadow, woods, and creek,</strong> and a building that truly fits the school's self-directed democratic program.</p>
            <p>The dream is nearly <strong>8 acres and only a mile away.</strong> The property owner will donate the land as soon as the school community raises the funds to build.</p>
            <p>Alumni are leading the charge, inviting you and all to join in, aiming for a hundred percent participation. Read on to hear the story, see the plans, and find out how <strong>everybody, even our youngest students at school, will be part of it.</strong></p>
            <p class="next">Click the green arrow at the right to continue.</p>
        </div>
        <div class="col-xs-1" id="right-arrow"><a href="/help/2"></a></div>
    </div>

@stop

@section('foot')
    @include('fragments.blueimp-gallery')
@stop