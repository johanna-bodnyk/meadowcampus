@extends('_master')

@section('title')
    Donors
@stop

@section('content')

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
                <tr>
            <td> Johanna Bodnyk </td>
            <td> 10000 </td>
            <td> 
                                    alum 
                                    alum_staff 
                            </td>
            <td>Added by Johanna on 2014-10-16 01:07:46</td>
            <td>
                <a href="/donors/3/edit">Edit</a> | 

                                <form method="POST" action="http://localhost/donors/3" accept-charset="UTF-8"><input name="_method" type="hidden" value="DELETE"><input name="_token" type="hidden" value="XxJGV0pswJphEfHAi0h0gaNPdT4OVrNMeIXMUDfz">
                <a href='javascript:void(0)' onClick='parentNode.submit();return false;'>Delete</a>
                </form>
            </td>
        </tr>
                <tr>
            <td> Connor Tyrrell </td>
            <td> 15000 </td>
            <td> 
                                    alum 
                            </td>
            <td>Added by Johanna on 2014-10-16 01:08:04</td>
            <td>
                <a href="/donors/4/edit">Edit</a> | 

                                <form method="POST" action="http://localhost/donors/4" accept-charset="UTF-8"><input name="_method" type="hidden" value="DELETE"><input name="_token" type="hidden" value="XxJGV0pswJphEfHAi0h0gaNPdT4OVrNMeIXMUDfz">
                <a href='javascript:void(0)' onClick='parentNode.submit();return false;'>Delete</a>
                </form>
            </td>
        </tr>
            </table>
    <a class="btn btn-success" href="/donors/create" role="button">Add a new donor</a>

 




@stop

