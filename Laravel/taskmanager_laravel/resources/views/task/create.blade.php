@extends('layouts.master')

@section('menu')
@parent
@endsection

@section('content')

<h1 class="text-center">Task info:</h1>

@if(count(session('errors')) > 0)
	<div class="alert alert-danger" > 
		
		@foreach(session('errors')->all() as $er)
			{{$er}}<br/>
		@endforeach
	</div>
@endif

@if(session('message'))
<div class="alert alert-success" > 
	{{session('message')}}
</div>
@endif

<div class="container w-50 m-auto">

{!! Form::model($task, array('action'=>'TaskController@store')) !!}

<div class='form-group'>
	{!! Form::label('userid','User id: ')!!}
	{!! Form::select('userid', $users, '', array('class'=>'form-control'))!!}	
</div>

<div class='form-group'>
	{!! Form::label('title','Task title: ')!!}
	{!! Form::text('title', '', array('class'=>'form-control'))!!}
</div>
<div class='form-group'>
	{!! Form::label('details','Task details: ')!!}
	{!! Form::text('details', '', array('class'=>'form-control'))!!}
</div>
<div class='form-group'>
	{!! Form::label('creationdate','Task creation date: ')!!}
	{!! Form::text('creationdate', '', array('class'=>'form-control'))!!}
</div>
<div class='form-group'>
    {!! Form::label('priority','Task priority: ')!!}
    {!! Form::select('priority', array('Low' => 'Low', 'Medium' => 'Medium', 'High' => 'High'), 'Low', array('class'=>'form-control')); !!}
	
</div>
<div class='form-group'>
    {!! Form::label('status','Task status: ')!!}
	{!! Form::select('status', array('0' => 'Continue', '1' => 'Done'), '0', array('class'=>'form-control')); !!}
</div>

<button class="btn btn-success w-100" type="submit">Add Task</button>
{!! Form::close() !!}

</div>

@endsection