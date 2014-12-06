@extends('_master')

@section('title')
    TCS Needs Your Help!
@stop

@section('content')

    <div class="ask row">
        <div class="col-sm-1" id="left-arrow"><a href="/help/7"></a></div>
        <div class="col-sm-10">
            @include('fragments.ask-dropdown')
            <h2>Raising the money</h2>
            <p class="lead">We still need ${{$remainder}}. Can you pledge $161 per month? Yes? Great! If that's a stretch, then how about $64.40 per month? Still a stretch? Would $32.20 fit into your budget?</p>
            <p>Money's really tight? You are still and always a Circle Schooler, and we want every one of us to own the place. If you can chip in just $6.44 a month, you can secure <strong>a thousand dollars</strong> for the new campus. Here's how:</p>
            <p>If you make a monthly pledge, the school can borrow money (at low or no interest from an angel lender) and use your monthly gift to pay back the loan. <strong>If you give $64.40 per month, and if you continue for 10 years (compounded at 5%), the school will gain $10,000.</strong></p>
            <p>You should know...</p>
        </div>
        <div class="col-sm-1" id="right-arrow"><a href="/help/9"></a></div>
    </div>
    <div class="small-ask-pager row">
        <div class="col-xs-6">
            <a href="/help/7" class="btn btn-sm btn-success" role="button">&lt; Previous</a>
        </div>
        <div class="col-xs-6">
            <a href="/help/9" class="btn btn-sm btn-success next-btn" role="button">Next &gt;</a>
        </div>
    </div>


@stop
