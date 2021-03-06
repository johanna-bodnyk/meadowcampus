@extends('_master')

@section('title')
    Add a Donor
@stop

@section('content')


    {{ Form::open(array('url' => 'donors', 'role' => 'form')) }}

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
        @foreach ($types as $index => $type)
            <div class="checkbox">
                <label>
                  {{ Form::checkbox('type[]', $type->id) }}
                  {{ $type->display_name }}
                  {{ $index+1 }}
                </label>
            </div>
        @endforeach

        {{ Form::submit('Submit', array('class' => 'btn btn-default')) }}

    {{ Form::close() }}


@stop
