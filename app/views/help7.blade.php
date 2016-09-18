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
            <p>With decades of School Meeting's thrifty savings, and a very generous donation from alumni parents Richard &amp; Barbara Schiffrin, the school has $1.1 million to put towards construction. Fulton Bank is financing the rest with a mortgage loan of $1.5 million at 4% interest.</p>
            <p>How will the school meet its new monthly mortgage payments? We expect increased enrollment enabled by the new campus to cover roughly half. The rest? That's you and me! <strong>Together we will pledge and meet the need of $750,000 over 10 years.</strong></p>
            <p>Here's what we've got so far:</p>
            @include('fragments.thermometer', array('total' => $total))
            <p><a href="/donors" target="_blank">Over 100 generous donors,</a> including students, staff, alumni, and trustees, have together pledged <strong>${{$total}} to be paid over 10 years,</strong> leaving <strong>${{$remainder}}</strong> yet to raise.
            <p>Wait! <strong>How can our community do that?</strong> Well...</p>
            <p class="slide-number">7 of 10</p>
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
