@extends('_master')

@section('title')
    TCS Needs Your Help!
@stop

@section('content')

    <div class="ask row">
        <div class="col-xs-1" id="left-arrow"><a href="/help/8"></a></div>
        <div class="col-xs-10">
            <h2>Being part of this is more important than the amount you give</h2>
            <p class="lead"><img src="/images/help/sophia-building-fund-400px.jpg" class="pull-right img-responsive">Your gift, at any level, is meaningful.</p>
            <ul>
                <li>100% of staff have already pledged.</li>
                <li>100% of trustees have already pledged.</li>
                <li>Beth is determined that <strong>100% of current students will pledge</strong> something.</li>
            </ul>
            <p>And you? <strong>Plug in where you can:</strong></p>
                <div class="pledge-buttons">
                    <a href="https://secure.jotform.us/form/42086602993157?inThe=161.00" class="btn btn-success" role="button">Pledge $161.00/month ($25,000 value)</a><br>
                    <a href="https://secure.jotform.us/form/42086602993157?inThe=64.40" class="btn btn-success" role="button">Pledge $64.40/month ($10,000 value)</a><br>
                    <a href="https://secure.jotform.us/form/42086602993157?inThe=32.20" class="btn btn-success" role="button">Pledge $32.20/month ($5,000 value)</a><br>
                    <a href="https://secure.jotform.us/form/42086602993157" class="btn btn-success" role="button">Pledge another monthly amount</a>
                </div>

            <p>Want to talk about more options? Click the next arrow to <a href="/scenarios">check out the calculators and make up your own scenario.</a></p>
        </div>
        <div class="col-xs-1" id="right-arrow"><a href="/scenarios"></a></div>
    </div>


@stop
