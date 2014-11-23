@extends('_master')

@section('title')
    TCS Needs Your Help!
@stop

@section('head')
    <link rel="stylesheet" href="{{ URL::asset('packages/blueimp/css/blueimp-gallery.min.css') }}">
@stop

@section('content')

    <div class="ask row">
        <div class="col-xs-1" id="left-arrow"><a href="/help/3"></a></div>
        <div class="col-xs-10">
            @include('fragments.ask-dropdown')
            <h2>Our dream campus</h2>
            <p class="lead">In the summer of 2013, Jim and JD met with the George M. Leader Family Corporation to ask for permanent access across their land, to get to another site.</p>
            <div id="links">
                <a href="/images/help/meadow-campus-site-layout.jpg" title='Site Layout' data-gallery>
                    <figure class="image pull-right">
                        <img class="img-responsive" src="/images/help/meadow-campus-site-layout-400px.jpg" alt="Site Layout">
                        <figcaption>Click to enlarge.</figcaption>
                    </figure>
                </a>
            </div>
            <p>They went us one better and offered to donate their 4.6 acres instead! It's <strong>the meadow visible in this aerial photo,</strong> plus some of the woods.</p>
            <p>Alas, the meadow parcel isn't big enough to satisfy a township ordinance about schools, but the owner of the adjoining parcel (the vertical leg of the "L" in the photo) agreed to sell for a song ($15,000) because it's landlocked and rough terrain. <strong>Perfect!</strong></p>
            <p>And the location? Well...</p>
        </div>
        <div class="col-xs-1" id="right-arrow"><a href="/help/5"></a></div>
    </div>
@stop

@section('foot')
    @include('fragments.blueimp-gallery')
@stop