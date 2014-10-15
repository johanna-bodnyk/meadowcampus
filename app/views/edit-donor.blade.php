@extends('_master')

@section('title')
    Add a Donor
@stop

@section('content')

    {{ Form::model($donor, array('method' => 'PUT', 'url' => 'donors/'.$donor->id, 'role' => 'form')) }}
        
        {{ Form::hidden('id') }}

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
                    @if (in_array($type->id, $set_types))
                        {{ Form::checkbox('type[]', $type->id, array('checked' => 'checked')) }}
                    @else
                        {{ Form::checkbox('type[]', $type->id) }}
                    @endif
                    {{ $type->display_name }}
                </label>
            </div>
        @endforeach


        {{ Form::submit('Submit', array('class' => 'btn btn-default')) }}

    {{ Form::close() }}


@stop
