@extends('_master')

@section('title')
    TCS Needs Your Help!
@stop

@section('content')

    <div class="ask row">
        <div class="col-sm-1" id="left-arrow"><a href="/help/8"></a></div>
        <div class="col-sm-10">
            @include('fragments.ask-dropdown')
            <h2>Being part of this is more important than the amount you give</h2>
            <p class="lead">Your gift, at any level, is meaningful.</p>
            <ul>
                <li><img src="/images/help/sophia-building-fund-400px_revised.jpg" class="pull-left img-responsive" style="margin-left:-40px"><a href="/donors" target="_blank">{{ $number }} donors have pledged so far (click to view a list).</a></li>
                <li>100% of trustees have already pledged.</li>
                <li>In a campaign at school, <strong>100% of staff and students (including the youngest) pledged or contributed.</strong></li>
            </ul>
            <p>And you? <strong>Where will you plug in?</strong></p>
            <p class="slide-number">9 of 10</p>
        </div>
        <div class="col-sm-1" id="right-arrow"><a href="/help/10"></a></div>
    </div>
    <div class="small-ask-pager row">
        <div class="col-xs-6">
            <a href="/help/8" class="btn btn-sm btn-success" role="button">&lt; Previous</a>
        </div>
        <div class="col-xs-6">
            <a href="/help/10" class="btn btn-sm btn-success next-btn" role="button">Next &gt;</a>
        </div>
    </div>


@stop
