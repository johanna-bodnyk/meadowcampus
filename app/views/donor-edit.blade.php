@extends('_master')

@section('title')
    Add a Donor
@stop

@section('content')

    <h2>Editing Donor ID: {{ $donor->id }}</h2>

    {{ Form::model($donor, array('url' => 'donor-edit/'.$donor->id, 'role' => 'form')) }}

        <div class="form-group">
            {{ Form::label('first_name', 'First Name') }}
            {{ Form::text('first_name', null, array('class' => 'form-control')) }}          
        </div>

        <div class="form-group">
            {{ Form::label('last_name', 'Last Name') }}
            {{ Form::text('last_name', null, array('class' => 'form-control')) }}        
        </div>

        <div class="form-group">
            {{ Form::label('donor_group', 'Donor Group') }}
            {{ Form::text('donor_group', null, array('class' => 'form-control')) }}        
        </div>

        <div class="form-group">
            {{ Form::label('target_donation', 'Target Donation') }}
            {{ Form::text('target_donation', null, array('class' => 'form-control')) }}        
        </div>

        <div class="form-group">
            {{ Form::label('pledge_amount', 'Pledge Amount') }}
            {{ Form::text('pledge_amount', null, array('class' => 'form-control')) }}        
        </div>

        <div class="form-group">
            {{ Form::label('pledge_made_flag', 'Pledge Made?') }}
            {{ Form::text('pledge_made_flag', null, array('class' => 'form-control')) }}        
        </div>

        <div class="form-group">
            {{ Form::label('pledge_date', 'Pledge Date') }}
            {{ Form::text('pledge_date', null, array('class' => 'form-control')) }}        
        </div>

        <div class="form-group">
            {{ Form::label('display', 'Okay to List?') }}
            {{ Form::text('display', null, array('class' => 'form-control')) }}        
        </div>

        {{ Form::submit('Submit', array('class' => 'btn btn-default')) }}

    {{ Form::close() }}


@stop
