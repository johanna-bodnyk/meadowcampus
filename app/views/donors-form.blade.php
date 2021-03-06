@extends('_master')

@section('title')
    Add or Edit a Donor
@stop

@section('content')

    @if(isset($donor))
        <h2>Editing Donor ID: {{ $donor->id }}</h2>
        {{ Form::model($donor, array('url' => '/donors/edit/'.$donor->id, 'role' => 'form', 'class' => 'form-horizontal')) }}    
        @else
        <h2>Add a Donor</h2>
        {{ Form::open(array('url' => '/donors/add', 'role' => 'form', 'class' => 'form-horizontal')) }}
    @endif

        <div class="form-group">
            {{ Form::label('first_name', 'First Name', array('class' => 'col-sm-2')) }}
            <div class='col-sm-10'>
                {{ Form::text('first_name', null, array('class' => 'form-control')) }}  
            </div>       
        </div>

        <div class="form-group">
            {{ Form::label('last_name', 'Last Name', array('class' => 'col-sm-2')) }}
            <div class='col-sm-10'>
                {{ Form::text('last_name', null, array('class' => 'form-control')) }}        
            </div>       
        </div>

        <div class="form-group">
            {{ Form::label('donor_group', 'Donor Group', array('class' => 'col-sm-2')) }}
            <div class='col-sm-10'>
                {{ Form::select('donor_group', Donor::getGroupNames()) }}
            </div>       
        </div>

        <div class="form-group">
            {{ Form::label('target_donation', 'Target', array('class' => 'col-sm-2')) }}
            <div class='col-sm-10'>
                {{ Form::text('target_donation', null, array('class' => 'form-control')) }}        
            </div>       
        </div>


        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                    <label>
                        <input name="pledge_made_flag" type="checkbox" value=1
                        @if(isset($donor) && $donor->pledge_made_flag)
                            checked
                        @endif
                        > <strong>Pledge Made?</strong>
                    </label>     
                </div>
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('pledge_amount', 'Pledge Amount', array('class' => 'col-sm-2')) }}
            <div class='col-sm-10'>
                {{ Form::text('pledge_amount', null, array('class' => 'form-control')) }}        
            </div>       
        </div>

        <div class="form-group">
            {{ Form::label('pledge_date', 'Pledge Date', array('class' => 'col-sm-2')) }}
            <div class='col-sm-10'>
                {{ Form::text('pledge_date', null, array('class' => 'form-control', 'aria-describedBy' => 'pledge_date_help')) }}
                <span id="pledge_date_help" class="help-block">YYYY-MM-DD HH:MM:SS</span>
            </div>       
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                    <label>
                        <input name="display" type="checkbox" value=1
                            @if(isset($donor) && $donor->display)
                                checked
                            @endif
                        > <strong>Okay to List?</strong>
                    </label>     
                </div>
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('display_name', 'Display Name', array('class' => 'col-sm-2')) }}
            <div class='col-sm-10'>
                {{ Form::text('display_name', null, array('class' => 'form-control')) }}        
            </div>       
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                    <label>
                        <input name="inaugural" type="checkbox" value=1
                            @if(isset($donor) && $donor->inaugural)
                                checked
                            @endif
                        > <strong>Inaugural Donor?</strong>
                    </label>     
                </div>
            </div>
        </div>

        {{ Form::submit('Save', array('class' => 'btn btn-success', 'id' => 'save-button')) }}

    {{ Form::close() }}

    <a href="/donors/admin" class="btn btn-default" id='cancel-button' role="button">Cancel</a>

    @if(isset($donor))
        <a href="/donors/confirm-delete/{{ $donor->id }}" class="btn btn-danger" id='delete-button' role="button">Delete</a>
    @endif


@stop
