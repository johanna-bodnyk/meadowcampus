@extends('_master')

@section('title')
    TCS Needs Your Help!
@stop

@section('content')

    <div class="ask row">
        <div class="col-sm-1" id="left-arrow"><a href="/help/9"></a></div>
        <div class="col-sm-10">
            @include('fragments.ask-dropdown')
            <h2>Where will you plug in?</h2>
                <div class="pledge-buttons">
                    <a href="https://secure.jotform.us/form/42086602993157?inThe=161.00" target="_blank" class="btn btn-lg btn-success" role="button">Pledge $161.00/month ($25,000 value)</a><br>
                    <a href="https://secure.jotform.us/form/42086602993157?inThe=64.40" target="_blank" class="btn btn-lg btn-success" role="button">Pledge $64.40/month ($10,000 value)</a><br>
                    <a href="https://secure.jotform.us/form/42086602993157?inThe=32.20" target="_blank" class="btn btn-lg btn-success" role="button">Pledge $32.20/month ($5,000 value)</a><br>
                    <a href="https://secure.jotform.us/form/42086602993157" target="_blank" class="btn btn-lg btn-success" role="button">Pledge another monthly amount</a>
                </div>
                <div class="pledge-buttons-small">
                    <a href="https://secure.jotform.us/form/42086602993157?inThe=161.00" target="_blank" class="btn btn-sm btn-success" role="button">Pledge $161.00/month ($25,000 value)</a><br>
                    <a href="https://secure.jotform.us/form/42086602993157?inThe=64.40" target="_blank" class="btn btn-sm btn-success" role="button">Pledge $64.40/month ($10,000 value)</a><br>
                    <a href="https://secure.jotform.us/form/42086602993157?inThe=32.20" target="_blank" class="btn btn-sm btn-success" role="button">Pledge $32.20/month ($5,000 value)</a><br>
                    <a href="https://secure.jotform.us/form/42086602993157" target="_blank" class="btn btn-sm btn-success" role="button">Pledge another monthly amount</a>
                </div>

            <p><strong>Want to see more options?</strong> Click the next arrow to <a href="/scenarios" target="_blank">check out the calculators and make up your own scenario.</a></p>
        </div>
        <div class="col-sm-1" id="right-arrow"><a href="/scenarios" target="_blank"></a></div>
    </div>
    <div class="small-ask-pager row">
        <div class="col-xs-6">
            <a href="/help/9" class="btn btn-sm btn-success" role="button">&lt; Previous</a>
        </div>
        <div class="col-xs-6">
            <a href="/scenarios" target="_blank" class="btn btn-sm btn-success next-btn" role="button">Next &gt;</a>
        </div>
    </div>


@stop
