@extends('_master')

@section('title')
    TCS Needs Your Help!
@stop

@section('head')
    <style>
        @include('fragments.thermometer-head', array('percent' => $percent))
    </style>
@stop

@section('content')

    <div class="ask row">
        <div class="col-sm-1" id="left-arrow"><a href="/help/6"></a></div>
        <div class="col-sm-10">
            @include('fragments.ask-dropdown')
            <h2>What's the budget?</h2>
            <p class="lead">I'm so glad you asked! The budget is $2.6 million. Can you cover that?</p>
            <p>Just kidding (or half kidding). Most of the budget is covered by a generous alumni family and the George M. Leader Family Corporation's gift of the land, leaving <strong>$750,000 to be raised by The Circle School community.</strong> That's you and me.</p>
            <p>Here's what we've got so far:</p>
            @include('fragments.thermometer', array('total' => $total))
            <p>The alumni, staff, and trustees who built this website have all pledged. <a href="/donors" target="_blank">Now we have many generous donors</a> who have together pledged <strong>${{$total}} to be paid over 10 years,</strong> leaving <strong>${{$remainder}}</strong> yet to raise in about the next month.
            <p>Wait! <strong>How can our community do that?</strong> Well...</p>
        </div>
        <div class="col-sm-1" id="right-arrow"><a href="/help/8"></a></div>
    </div>
    <div class="small-ask-pager row">
        <div class="col-xs-6">
            <a href="/help/6" class="btn btn-sm btn-success" role="button">&lt; Previous</a>
        </div>
        <div class="col-xs-6">
            <a href="/help/8" class="btn btn-sm btn-success next-btn" role="button">Next &gt;</a>
        </div>
    </div>


@stop
