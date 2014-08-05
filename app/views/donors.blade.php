@extends('_master')

@section('title')
    Donors
@stop

@section('content')

    {{ $donors }}

    {{ Auth::user() }}

@stop
