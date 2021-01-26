@extends('layouts.master')

@section('menu')
@parent
@endsection

@section('content')

<h1 class="text-center">User info:</h1>

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
{!! Form::model($user, array('action'=>'UserController@store')) !!}
<div class='form-group'>
	{!! Form::label('firstname','Firstname: ')!!}
	{!! Form::text('firstname', '', array('class'=>'form-control'))!!}
</div>
<div class='form-group'>
	{!! Form::label('lastname','Lastname: ')!!}
	{!! Form::text('lastname', '', array('class'=>'form-control'))!!}
</div>
<div class='form-group'>
	{!! Form::label('email','Email: ')!!}
	{!! Form::text('email', '', array('class'=>'form-control'))!!}
</div>
<div class='form-group'>
	{!! Form::label('login','Login: ')!!}
	{!! Form::text('login', '', array('class'=>'form-control'))!!}
</div>
<div class='form-group'>
    {!! Form::label('password','Password: ')!!}
    {!! Form::password('password', array('placeholder'=>'Password', 'class'=>'form-control' ))!!}	
</div>

<button class="btn btn-success w-100" type="submit">Add User</button>
{!! Form::close() !!}

</div>

@endsection