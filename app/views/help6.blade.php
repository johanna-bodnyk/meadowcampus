@extends('_master')

@section('title')
    TCS Needs Your Help!
@stop

@section('head')
    <link rel="stylesheet" href="{{ URL::asset('packages/blueimp/css/blueimp-gallery.min.css') }}">
@stop

@section('content')

    <div class="ask row">
        <div class="col-sm-1" id="left-arrow"><a href="/help/5"></a></div>
        <div class="col-sm-10">
            @include('fragments.ask-dropdown')
            <h2>The building</h2>
            <p class="lead">In summer 2014 the school engaged architect Rich Gribble of By Design Consultants Inc.</p>
            <div id="links">
                <a href="/images/help/floor-plan.png" title='Schematic design rendering &mdash; "Floor Plan" &mdash; 10/17/2014' data-gallery>
                    <figure class="pull-right image">
                        <img class="img-responsive" src="/images/help/floor-plan-400px.png" alt="Floor plan">
                        <figcaption>Click to enlarge and view architect's renderings.</figcaption>
                    </figure>
                </a>
                <a href="/images/help/rendering-2.png" title='Schematic design rendering &mdash; "View at Front Entry" &mdash; 10/17/2014' data-gallery class="hide"></a>
                <a href="/images/help/rendering-1.png" title='Schematic design rendering &mdash; "Front Elevation" &mdash; 10/17/2014' data-gallery class="hide"></a>
                <a href="/images/help/commons-2.png" title='Schematic design rendering &mdash; "Interior View of Commons Area" &mdash; 2/19/2014' data-gallery class="hide"></a>
            </div>
            <p>As of November 2014, an informal Meadow Campus design team has completed the "Schematic Design Phase", resulting in this tentative floor plan that calls for <strong>8,000 square feet of program space,</strong> including a large activity room suitable for <strong>community-wide potlucks, student performances, the Holiday Bazaar, the Spring Gala,</strong> and other grand events.</p>
            <p>That's awesome, you say, but...</p>
            <p class="slide-number">6 of 10</p>
        </div>
        <div class="col-sm-1" id="right-arrow"><a href="/help/7"></a></div>
    </div>
    <div class="small-ask-pager row">
        <div class="col-xs-6">
            <a href="/help/5" class="btn btn-sm btn-success" role="button">&lt; Previous</a>
        </div>
        <div class="col-xs-6">
            <a href="/help/7" class="btn btn-sm btn-success next-btn" role="button">Next &gt;</a>
        </div>
    </div>
@stop

@section('foot')
    @include('fragments.blueimp-gallery')
@stop