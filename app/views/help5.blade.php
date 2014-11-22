@extends('_master')

@section('title')
    TCS Needs Your Help!
@stop

@section('head')
    <link rel="stylesheet" href="{{ URL::asset('packages/blueimp/css/blueimp-gallery.min.css') }}">
@stop

@section('content')

    <div class="ask row">
        <div class="col-xs-1" id="left-arrow"><a href="/help/4"></a></div>
        <div class="col-xs-10">
            @include('fragments.ask-dropdown')
            <h2>The location</h2>
            <p class="lead">The new location is a crow's mile from the current campus, tucked beside a retirement community.</p>
            <div id="links">
                <a href="/images/help/map-between-tcs-and-meadow.jpg" title='Map Between Oakleigh Avenue and Meadow Campus' data-gallery>
                    <img class="pull-left img-responsive" src="/images/help/map-between-tcs-and-meadow-400px.jpg" alt="Map Between Oakleigh Avenue and Meadow Campus">
                </a>
            </div>
            <p>It's the first site we saw, in eight years of looking, that meets <strong>all the criteria on the dream checklist.</strong> And it's the first site whose owner offered to donate the land!</p>
            <p><strong>And the building?</strong> Well...</p>
        </div>
        <div class="col-xs-1" id="right-arrow"><a href="/help/6"></a></div>
    </div>
@stop

@section('foot')
    @include('fragments.blueimp-gallery')
@stop