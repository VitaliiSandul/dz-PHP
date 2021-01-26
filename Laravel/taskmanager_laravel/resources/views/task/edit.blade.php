@extends('layouts.master')

@section('menu')
@parent
@endsection

@section('content')

<div class="container w-50 m-auto">

{!!Form::model($task, array('route'=>array('task.update',$task->taskid),'method'=>'PUT'))!!}

	<div class='form-group'>
		{!! Form::label('login','Select User')!!}
		{!! Form::select('userid', $users, $task->userid, array('class'=>'form-control'))!!}	
	</div>

	<div class='form-group'>
		{!! Form::label('title','Edit title')!!}
		{!! Form::text('title', $task->title, array('class'=>'form-control'))!!}
	</div>

	<div class='form-group'>
		{!! Form::label('details','Edit Details')!!}
		{!! Form::text('details', $task->details, array('class'=>'form-control'))!!}
	</div>

	<div class='form-group'>
	{!! Form::label('creationdate','Task creation date: ')!!}
	{!! Form::text('creationdate', $task->creationdate, array('class'=>'form-control'))!!}
    </div>
    <div class='form-group'>
        {!! Form::label('priority','Task priority: ')!!}
        {!! Form::select('priority', array('Low' => 'Low', 'Medium' => 'Medium', 'High' => 'High'), $task->priority, array('class'=>'form-control') ); !!}    
    </div>
    <div class='form-group'>
        {!! Form::label('status','Task status: ')!!}
        <!-- {!! Form::checkbox('status', '0'); !!} -->
        {!! Form::select('status', array('0' => 'Continue', '1' => 'Done'), $task->status, array('class'=>'form-control')); !!}
    </div>		
        {!! Form::submit('Save edit task', array('class'=>'btn btn-primary'))!!}		

{!!Form::close()!!}

</div>

@endsection