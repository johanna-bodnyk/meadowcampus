@extends('_master')

@section('title')
    TCS Needs Your Help!
@stop

@section('head')
    <link rel="stylesheet" href="{{ URL::asset('packages/blueimp/css/blueimp-gallery.min.css') }}">
@stop

@section('content')

    <div class="ask row">
        <div class="col-xs-1" id="left-arrow"><a href="/help/2"></a></div>
        <div class="col-xs-10">
            @include('fragments.ask-dropdown')
            <h2>Searching for a new home</h2>
            <div id="links">
                <a href="/images/help/relocation-target-area.jpg" title='Relocation Target Area' data-gallery>
                    <figure class="image pull-left">
                        <img class="img-responsive" src="/images/help/relocation-target-area-400px.jpg" alt="Relocation Target Area">
                        <figcaption>Click to enlarge.</figcaption>
                    </figure>
                </a>
            </div>
            <p class="lead">In classic Circle School style, School Meeting appointed two committees: one to search for a location, and another to design a building.</p>
            <p>"Flying over" every inch of a target location area in Google Earth, the Property Search Committee found sites of five acres or more. And then, talking with real estate agents and traipsing through woods, found that <strong>many present insurmountable development challenges or price tags.</strong></p>
            <p>Until...</p>
        </div>
        <div class="col-xs-1" id="right-arrow"><a href="/help/4"></a></div>
    </div>


@stop

@section('foot')
    @include('fragments.blueimp-gallery')
@stop