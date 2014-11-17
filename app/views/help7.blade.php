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
        <div class="col-xs-1" id="left-arrow"><a href="/help/6"></a></div>
        <div class="col-xs-10">
            <h2>What's the budget?</h2>
            <p class="lead">I'm so glad you asked! The budget is $2.6 million. Can you cover that?</p>
            <p>Just kidding (or half kidding). <strong>Here's what we've got so far:</strong></p><br>
            @include('fragments.thermometer', array('total' => $total))
            <p>The total budget breaks down as follows:</p>
            <ul>
                <li>$400,000 &mdash; Value of the land donated by the George M. Leader Family Corporation</li>
                <li>$1,500,000 &mdash; Commitment from a generous alumni family to donate, raise, and lend</li>
                <li><strong>$750,000 &mdash; To be raised by The Circle School community</strong></li>
            </ul>
            <p>The alumni, staff, and trustees who have launched this fundraising campaign and built this website (about a dozen of us) have already pledged ${{$total}} to be paid over 10 years, leaving <strong>${{$remainder}} yet to raise in the next couple of months.</strong>
            <p>Wait! How can our young alumni do that? Well...</p>
        </div>
        <div class="col-xs-1" id="right-arrow"><a href="/help/8"></a></div>
    </div>


@stop
