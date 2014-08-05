@extends('_master')

@section('title')
    Add a Donor
@stop

@section('content')


    {{ Form::open(array('url' => 'donors/add', 'role' => 'form')) }}

        <div class="form-group">
            {{ Form::label('first_name', 'First Name') }}
            {{ Form::text('first_name', null, array('class' => 'form-control')) }}        
        </div>

        <div class="form-group">
            {{ Form::label('last_name', 'Last Name') }}
            {{ Form::text('last_name', null, array('class' => 'form-control')) }}        
        </div>

        <div class="form-group">
            {{ Form::label('amount', 'Donation Amount') }}
            {{ Form::text('amount', null, array('class' => 'form-control')) }}        
        </div>

        <label>Type</label>
        @foreach ($types as $type)
            <div class="checkbox">
                <label>
                  {{ Form::checkbox('type', $type->type) }}
                  {{ $type->type }}
                </label>
            </div>
        @endforeach

        {{ Form::submit('Submit', array('class' => 'btn btn-default')) }}

    {{ Form::close() }}


@stop
