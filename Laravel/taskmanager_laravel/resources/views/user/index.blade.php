@extends('layouts.master')

@section('menu')
@parent
@endsection

@section('content')

<h1 class="text-center">List of Users:</h1>

<div class="container">

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Login</th>
            <th>Operations</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $key => $value)
        <tr>
            <td>{{ $value->firstname }}</td>
            <td>{{ $value->lastname }}</td>
            <td>{{ $value->email }}</td>
            <td>{{ $value->login }}</td>
            <td>

                <div class="d-flex justify-content-around">
                    
                    <a class="btn btn-small btn-info" href="{{ URL::to('user/' . $value->userid . '/edit') }}">Edit</a>
                    
                    {{ Form::open(array('url' => 'user/' . $value->userid, 'class' => 'pull-right')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                    {{ Form::close() }}

                </div>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<a class="btn btn-success w-100" href="{{ URL::to('user/create') }}">Add new user</a>

</div>

@endsection