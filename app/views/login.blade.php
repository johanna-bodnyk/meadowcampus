@extends('_master')

@section('title')
    Admin login
@stop

@section('content')


    {{ Form::open(array('url' => 'login', 'role' => 'form')) }}

        <div class="form-group">
            {{ Form::label('email', 'Email address') }}
            {{ Form::text('email', null, array('class' => 'form-control')) }}        
        </div>

        <div class="form-group">
            {{ Form::label('password', 'Password') }}
            {{ Form::password('password', array('class' => 'form-control')) }}
        </div>

        {{ Form::submit('Log In', array('class' => 'btn btn-default')) }}

    {{ Form::close() }}


@stop
