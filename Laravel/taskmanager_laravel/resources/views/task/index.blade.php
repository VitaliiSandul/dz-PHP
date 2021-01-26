@extends('layouts.master')

@section('menu')
@parent
@endsection

@section('content')

<h1 class="text-center">List of Tasks:</h1>

<div class="container">

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>User Id</th>
            <th>Title</th>
            <th>Details</th>
            <th>Creationdate</th>
            <th>Priority</th>
            <th>Status</th>
            <th>Operations</th>
        </tr>
    </thead>
    <tbody>
    @foreach($tasks as $key => $value)
        <tr>
            <td>{{ $value->userid }}</td>
            <td>{{ $value->title }}</td>
            <td>{{ $value->details }}</td>
            <td>{{ date("d-m-Y",strtotime($value->creationdate)) }}</td>
            <td>{{ $value->priority }}</td>
            <td>{{ $value->status == '0' ? 'Continue' : 'Done'}}</td>
            <td>
                <div class="d-flex justify-content-around">
                   
                    <a class="btn btn-small btn-info" href="{{ URL::to('task/' . $value->taskid . '/edit') }}">Edit</a>
                    
                    {{ Form::open(array('url' => 'task/' . $value->taskid, 'class' => 'pull-right')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                    {{ Form::close() }}

                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<a class="btn btn-success w-100" href="{{ URL::to('task/create') }}">Add new task</a>

</div>

@endsection