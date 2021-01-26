@extends('layouts.master')

@section('menu')
@parent
@endsection

@section('content')

<div class="container w-50 m-auto">

{!!Form::model($user, array('route'=>array('user.update',$user->userid),'method'=>'PUT'))!!}

	<div class='form-group'>
		{!! Form::label('firstname','Edit firstname: ')!!}
		{!! Form::text('firstname', $user->firstname, array('class'=>'form-control'))!!}
	</div>

	<div class='form-group'>
		{!! Form::label('lastname','Edit lastname: ')!!}
		{!! Form::text('lastname', $user->lastname, array('class'=>'form-control'))!!}
	</div>

	<div class='form-group'>
	{!! Form::label('email','Edit email: ')!!}
	{!! Form::text('email', $user->email, array('class'=>'form-control'))!!}
    </div>
    	
    <div class='form-group'>
	{!! Form::label('login','Edit login: ')!!}
	{!! Form::text('login', $user->login, array('class'=>'form-control'))!!}
    </div>

    <div class='form-group'>
	{!! Form::label('password','Edit password: ')!!}
    {!! Form::password('password', array('placeholder'=>'Password', 'class'=>'form-control' ))!!}
    </div>

    {!! Form::submit('Save edit task', array('class'=>'btn btn-primary'))!!}		

{!!Form::close()!!}

</div>

@endsection