<!-- 

    <h2>Donors</h2>

    <p class="lead">This page will be simpler, just names and "types" (student, parent, alum) -- this is more of the "admin" view.</p>
    
    <table class="table">
        <tr>
            <th>Name</th>
            <th>Amount</th>
            <th>Type</th>
            <th>Added</th>
            <th>Manage</th>
        </tr>
        @foreach($donors as $donor)
        <tr>
            <td> {{ $donor->first_name }} {{ $donor->last_name }} </td>
            <td> {{ $donor->amount }} </td>
            <td> 
                @foreach ($donor->types as $type )
                    {{ $type->type." " }}
                @endforeach
            </td>
            <td>Added by {{ $donor->user->first_name }} on {{ $donor->created_at }}</td>
            <td>
                <a href="/donors/{{ $donor->id }}/edit">Edit</a> | 

                {{-- TODO: Move JS to footer, add delete confirmation page into process --}}
                {{ Form::open(['method' => 'DELETE', 'url' => 'donors/'.$donor->id]) }}
                <a href='javascript:void(0)' onClick='parentNode.submit();return false;'>Delete</a>
                {{ Form::close() }}
            </td>
        </tr>
        @endforeach
    </table>
    <a class="btn btn-success" href="/donors/create" role="button">Add a new donor</a> -->