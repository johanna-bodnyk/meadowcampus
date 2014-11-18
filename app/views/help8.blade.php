@extends('_master')

@section('title')
    TCS Needs Your Help!
@stop

@section('content')

    <div class="ask row">
        <div class="col-xs-1" id="left-arrow"><a href="/help/7"></a></div>
        <div class="col-xs-10">
            @include('fragments.ask-dropdown')
            <h2>Ramen noodles, parents, and half a million dollars</h2>
            <p class="lead">We still need ${{$remainder}}. Can you pledge $64.40 per month? Yes? Okay, then, how about $161.00 per month? Neither one? How about $32.20?</p>
            <p>Still no? Still eating ramen noodles for dinner every night? No matter. <strong>You are a Circle Schooler and we want you to be part of this,</strong> so how about $6.44 per month? Parent of a Circle Schooler? You, too, are Circle School! How many noodles can you pledge?</p>
            <p>Consider this: If you make a monthly pledge, the school can borrow money (at low or no interest from a sympathetic lender) and use your monthly gift to pay back the loan. <strong>If you give $64.40 per month, and if you continue for 10 years (compounded at 5%), the school will gain $10,000.</strong></p>
            <p>You should know...</p>
        </div>
        <div class="col-xs-1" id="right-arrow"><a href="/help/9"></a></div>
    </div>


@stop
